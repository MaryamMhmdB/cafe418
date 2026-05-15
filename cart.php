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

<form method="POST">
    <div class="cart-section">
        <h3>📍 Location</h3>
        <label>Street *</label>
        <select name="street" required >
            <option value="">Select street</option>
            <option>Al Shati</option>
            <option>Al Faisaliyah</option>
            <option>Al Muhammadiyah</option>
            <option>Al Rakah</option>
            <option>Al Aziziyah</option>
        </select>
    </div>

    <div class="cart-section">
        <h3 >💳 Payment</h3>
        <label>Card Name *</label>
        <input type="text" name="card_name" required >
        <label>Card Number *</label>
        <input type="text" name="card_number" maxlength="16" pattern="\d{16}" required >
        <div >
           <div>
    <label>Expiry *</label>
    <input type="month" name="expiry" id="expiry" required>
    <span id="error" style="color:red;"></span>
</div>
            <div ><label>CVV *</label><input type="text" name="cvv" maxlength="3" pattern="\d{3}" required ></div>
        </div>
    </div>

    <div class="cart-section" >
        <button class="btn" type="submit" name="buy_now" >Buy Now</button>
    </div>
</form>
<script>
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');

    document.getElementById("expiry").min = `${year}-${month}`;
</script>


</body>
</html>
