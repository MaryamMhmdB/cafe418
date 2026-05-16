<?php
session_start();

include 'config.inc.php'; 

if(isset($_GET['delete'])){
    $index = $_GET['delete'];
    if(isset($_SESSION['cart'][$index])){
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    header("Location: cart.php");
    exit();
}

if(isset($_GET['clear'])){
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

if(isset($_POST['buy_now'])){

    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
        echo "<script>alert('Your cart is empty'); window.location.href='cart.php';</script>";
        exit();
    }

    try {
        $can_proceed = true;
        $error_items = [];

        foreach ($_SESSION['cart'] as $item) {
            $check_sql = "SELECT stockQuantity FROM products WHERE PName = :pname";
            $check_stmt = $pdo->prepare($check_sql);
            $check_stmt->bindValue(':pname', $item['name']);
            $check_stmt->execute();
            $product = $check_stmt->fetch();

            if ($product) {
                if ($item['quantity'] > $product['stockQuantity']) {
                    $can_proceed = false;
                    $error_items[] = $item['name'] . " (Available: " . $product['stockQuantity'] . ")";
                }
            } else {
                $can_proceed = false;
                $error_items[] = $item['name'] . " (Not found in database)";
            }
        }

        if ($can_proceed) {
            $update_sql = "UPDATE products SET stockQuantity = stockQuantity - :qty WHERE PName = :pname AND (stockQuantity - :qty) >= 0";
            $update_stmt = $pdo->prepare($update_sql);

            foreach ($_SESSION['cart'] as $item) {
                $update_stmt->bindValue(':qty', $item['quantity']);
                $update_stmt->bindValue(':pname', $item['name']);
                $update_stmt->execute();
            }

if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}

$order_total = 0;

foreach ($_SESSION['cart'] as $item) {
    $order_total += $item['price'] * $item['quantity'];
}

$vat = $order_total * 0.15;

$_SESSION['orders'][] = [
    "id" => rand(1000, 9999),
    "date" => date("Y-m-d"),
    "items" => $_SESSION['cart'],
    "total" => $order_total + $vat
];
unset($_SESSION['cart']);

echo "<script>alert('Payment completed successfully!'); window.location.href='index.php';</script>";
exit();

        } else {
$message = "Sorry, some items are not available:\n";

foreach ($error_items as $item) {
    $message .= $item . "\n";
}
            echo "<script>alert('$message');</script>";
        }

    } catch (PDOException $e) {
        echo "<script>alert('Database error. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="mb">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="cart-section">
    <h3 >🛒 Your Cart</h3>

    <?php
    $subtotal = 0;
    $vatRate = 0.15;

    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
        foreach($_SESSION['cart'] as $index => $item){
       $name = $item['name'];
        $size = $item['size'];
        $qty  = $item['quantity'];
        $price = $item['price'];

        $itemTotal = $price * $qty;
        $subtotal += $itemTotal;
    ?>
    <div class="cart-item">
        <span><strong><?php echo ($name); ?></strong> (<?php echo ($size); ?>) x<?php echo $qty; ?></span>
        <div class="actions">
            <?php echo number_format($itemTotal, 2); ?> SAR
            <button class="edit-btn"><a href="Product_details.php?id=<?php echo $item['id']; ?>">✏️</a></button>
            <button class="delete-btn" onclick="window.location.href='cart.php?delete=<?php echo $index; ?>'">🗑️</button>
        </div>
    </div>
    <?php } 

    $vat = $subtotal * $vatRate;
    $total = $subtotal + $vat;
    ?>
    <div >
        <div class="total">Subtotal: <?php echo number_format($subtotal, 2); ?> SAR</div>
        <div class="total">VAT (15%): <?php echo number_format($vat, 2); ?> SAR</div>
        <div class="total" >Total: <?php echo number_format($total, 2); ?> SAR</div>
        <br>
        <button class="deleteall-btn" onclick="if(confirm('Are you sure?')) window.location.href='cart.php?clear=1'">Delete all 🗑️</button>
    </div>
    <?php } else { ?>
        <p >Your cart is empty.</p>
    <?php } ?>
</div>


<form method="POST" id="paymentForm">


    <div class="cart-section">

        <h3>📍 Location</h3>

        <label>Street *</label>

        <select name="street" required>

            <option value="">Select street</option>

            <option>Al Shati</option>

            <option>Al Faisaliyah</option>

            <option>Al Muhammadiyah</option>

            <option>Al Rakah</option>

            <option>Al Aziziyah</option>

        </select>

    </div>

    <div class="cart-section">

        <h3>💳 Payment</h3>

        <label>Card Name *</label>

        <input type="text"
               name="card_name"
               id="card_name"
               required>

        <span id="nameError"
              style="color:red;"></span>

        <label>Card Number *</label>

        <input type="text"
               name="card_number"
               id="card_number"
               maxlength="16"
               required>

        <span id="cardError"
              style="color:red;"></span>


        <div>

            <div>

                <label>Expiry *</label>

                <input type="month"
                       name="expiry"
                       id="expiry"
                       required>

                <span id="expiryError"
                      style="color:red;"></span>

            </div>


            <div>

                <label>CVV *</label>

                <input type="text"
                       name="cvv"
                       id="cvv"
                       maxlength="3"
                       required>

                <span id="cvvError"
                      style="color:red;"></span>

            </div>

        </div>

    </div>


    <div class="cart-section">

        <button class="btn"
                type="submit"
                name="buy_now">

            Buy Now

        </button>

    </div>

</form>



<script>

const form = document.getElementById("paymentForm");

const cardName = document.getElementById("card_name");
const cardNumber = document.getElementById("card_number");
const expiry = document.getElementById("expiry");
const cvv = document.getElementById("cvv");

const nameError = document.getElementById("nameError");
const cardError = document.getElementById("cardError");
const expiryError = document.getElementById("expiryError");
const cvvError = document.getElementById("cvvError");


const today = new Date();

const year = today.getFullYear();

const month =
String(today.getMonth() + 1).padStart(2, '0');

expiry.min = `${year}-${month}`;



form.addEventListener("submit", function(e){

    let valid = true;



    nameError.innerHTML = "";
    cardError.innerHTML = "";
    expiryError.innerHTML = "";
    cvvError.innerHTML = "";

    cardName.style.border = "";
    cardNumber.style.border = "";
    expiry.style.border = "";
    cvv.style.border = "";


    if(cardName.value.trim() === ""){

        cardName.style.border =
        "2px solid red";

        nameError.innerHTML =
        "⚠ Card name is required.";

        valid = false;
    }


    // Card Number
    if(!/^\d{16}$/.test(cardNumber.value)){

        cardNumber.style.border =
        "2px solid red";

        cardError.innerHTML =
        "⚠ Card number must contain exactly 16 digits.";

        valid = false;
    }


    // CVV
    if(!/^\d{3}$/.test(cvv.value)){

        cvv.style.border =
        "2px solid red";

        cvvError.innerHTML =
        "⚠ CVV must contain exactly 3 digits.";

        valid = false;
    }


    // Expiry
    const selectedDate =
    new Date(expiry.value + "-01");

    const currentDate =
    new Date(year, today.getMonth(), 1);


    if(expiry.value === "" ||
       selectedDate < currentDate){

        expiry.style.border =
        "2px solid red";

        expiryError.innerHTML =
        "⚠ Please select a valid future expiry month.";

        valid = false;
    }


    // Prevent submit
    if(!valid){
        e.preventDefault();
    }

});

</script>

</body>
</html>