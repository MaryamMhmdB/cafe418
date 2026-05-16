<?php
session_start();
include 'config.inc.php'; 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_GET['id'])) {
    echo "<script>
        alert('Product not found');
        window.location.href='menu.php';
    </script>";
    exit();
}

$target_product_id = $_GET['id'];
$sql = "SELECT * FROM Products WHERE productID = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $target_product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_OBJ);

if (!$product) {
    echo "<script>
        alert('Product not found');
        window.location.href='menu.php';
    </script>";
    exit();
}

$product_name = $product->PName;
$base_price = $product->Price;
$product_image = ltrim($product->PImg,'/');
$product_description = $product->PDesc;
$product_ingredients = $product->ingredients;
$product_allergens = $product->Allergens;


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {

    $size = $_POST['size'];
    $quantity = (int)$_POST['quantity'];

    $current_total_qty = 0;
    foreach ($_SESSION['cart'] as $item) {
        $current_total_qty += $item['quantity'];
    }

    if (($current_total_qty + $quantity) > 10) {
        echo "<script>
            alert('Your cart is full: you can\'t put more than 10 items in total.');
            window.location.href='Product_details.php?id=$target_product_id';
        </script>";
        exit();
    }

    try {
        $sql = "SELECT stockQuantity FROM Products WHERE productID = :pid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':pid', $target_product_id);
        $stmt->execute();
        $product_data = $stmt->fetch();

        if ($product_data) {

            $available_stock = (int)$product_data['stockQuantity'];

            if ($quantity > $available_stock) {
                echo "<script>
                    alert('Sorry! Only $available_stock left in stock.');
                    window.location.href='Product_details.php?id=$target_product_id';
                </script>";
                exit();
            }

            $extra = ($size == "Medium") ? 2 : (($size == "Large") ? 4 : 0);
            $final_price = $base_price + $extra;

            $_SESSION['cart'][] = [
                "id" => $target_product_id,
                "name" => $product_name,
                "image" => $product_image,
                "size" => $size,
                "quantity" => $quantity,
                "price" => $final_price
            ];

            echo "<script>
                alert('Product added successfully to your cart!');
                window.location.href='Product_details.php?id=$target_product_id';
            </script>";

            exit();
        }

    } catch (PDOException $e) {
        echo "<script>
            alert('Database error occurred.');
            window.location.href='Product_details.php?id=$target_product_id';
        </script>";
        exit();
    }
}


$subtotal = 0;
foreach ($_SESSION['cart'] as $cart_item) {
    $subtotal += $cart_item['price'] * $cart_item['quantity'];
}
$vat = $subtotal * 0.15;
$total = $subtotal + $vat;
?>

<!DOCTYPE html>
<html lang="en" class="new">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="styles.css">
    <?php include 'navbar.php'; ?>
</head>

<body>

<div class="page">
    <div class="product-layout">

        <div>
            <div class="product-gallery">
<img src="<?= $product_image ?>" class="main-image" alt="<?= $product_name ?>">
            </div>

            <div class="extra-info">
                <h2>Product Details</h2>
                <ul>
                    <li><?= $product_ingredients ?></li>
                    <?php if (!empty($product_allergens)): ?>
                        <li>Contains: <?= $product_allergens ?></li>
                    <?php endif; ?>
                </ul>
                <button class="help-btn" onclick="alert('For help contact us:\nEmail: cafe418@gmail.com')">
                    Help
                </button>
            </div>
        </div>

        <div class="product-info">
            <div class="product-card">

                <span class="badge">Best Seller</span>

                <h1 class="product-title">
                    <?= $product_name ?>
                </h1>

                <div class="rating">★★★★</div>

                <div class="price-box">
                    <div class="price" id="live-price">
                        <?= number_format($base_price,2) ?> SAR
                    </div>
                    <div class="old-price">28 SAR</div>
                </div>

                <p class="description">
                    <?= $product_description ?>
                </p>

                <form method="POST" id="productForm">
                    <div class="option-group">
                        <h3>Select Size</h3>
                        <div class="sizes">
                            <label>
                                <input type="radio" name="size" value="Small" checked hidden>
                                <button type="button" class="size-btn" >Small</button>
                            </label>
                            <label>
                                <input type="radio" name="size" value="Medium" hidden>
                                <button type="button" class="size-btn">Medium</button>
                            </label>
                            <label>
                                <input type="radio" name="size" value="Large" hidden>
                                <button type="button" class="size-btn">Large</button>
                            </label>
                        </div>
                    </div>

                    <div class="option-group">
                        <h3>Quantity</h3>
                        <div class="quantity">
                            <input type="number" name="quantity" id="quantityInput" value="1" min="1" max="10">
                        </div>
                    </div>

                    <div class="option-group">
                        <h3>Special Instructions</h3>
                        <textarea placeholder="Add your notes here..."></textarea>
                    </div>

                    <button class="add-cart-btn" type="submit" name="add_to_cart">
                        Add to Cart
                    </button>
                </form>
            </div>

            <div class="cart-box">
                <h2>Your Cart Preview</h2>
                <?php if (empty($_SESSION['cart'])): ?>
                    <p>Your cart is empty.</p>
                <?php else: ?>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <div class="cart-item">
                            <div class="cart-info">
                                <h4><?= $item['name'] ?></h4>
                                <p><?= $item['size'] ?> × <?= $item['quantity'] ?></p>
                            </div>
                            <div class="cart-price">
                                <?= number_format($item['price'] * $item['quantity'], 2) ?> SAR
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="summary-box">
                <h2>Order Summary</h2>
                <div class="summary-item">
                    Subtotal
                    <?= number_format($subtotal,2) ?> SAR
                </div>
                <div class="summary-item">
                    VAT (15%)
                    <?= number_format($vat,2) ?> SAR
                </div>
                <div class="summary-item total">
                    Total
                    <?= number_format($total,2) ?> SAR
                </div>

                <button class="checkout-btn" onclick="window.location.href='cart.php'">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let basePrice = <?= $base_price ?>;
const sizeButtons = document.querySelectorAll(".size-btn");
const priceElement = document.getElementById("live-price");
const productForm = document.getElementById("productForm");

sizeButtons.forEach(button => {
    button.addEventListener("click", () => {
        sizeButtons.forEach(btn => {
            btn.style.background = "#f1f1f1";
            btn.style.color = "#000";
        });
        button.style.background = "#8b5e3c";
        button.style.color = "white";
        button.previousElementSibling.checked = true;

        let size = button.previousElementSibling.value;
        let extra = 0;
        if (size === "Medium") extra = 2;
        else if (size === "Large") extra = 4;

        let finalPrice = basePrice + extra;
        priceElement.innerText = finalPrice.toFixed(2) + " SAR";
    });
});


productForm.addEventListener("submit", function(e) {
    var cartCountSpan = document.getElementById('cart-count');
    var currentCount = 0;
    var inputQuantity = parseInt(document.getElementById('quantityInput').value);

    if (cartCountSpan && cartCountSpan.textContent.trim() != "") {
        currentCount = parseInt(cartCountSpan.textContent);
    }

    if (currentCount >= 10 || (currentCount + inputQuantity) > 10) {
        alert("Your cart is full: you can't put more than 10 items in total.");
        e.preventDefault();
        return false;
    }
});
</script>

</body>
</html>