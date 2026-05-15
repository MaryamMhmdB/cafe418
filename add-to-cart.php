<?php
session_start();
require_once('config.inc.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $totalInCart = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalInCart += $item['quantity'];
    }

    if ($totalInCart >= 10) {
        echo "Error: Your Cart is full: you can't put more than 10";
        exit;
    }

    $productId = intval($_POST['product_id']);
    
    $stmt = $pdo->prepare("SELECT productID, PName, Price, stockQuantity FROM products WHERE productID = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $currentQty = isset($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId]['quantity'] : 0;

        if ($currentQty < $product['stockQuantity']) {
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] += 1;
            } else {
                $_SESSION['cart'][$productId] = array(
                    'id' => $product['productID'],
                    'name' => $product['PName'],
                    'price' => $product['Price'],
                    'quantity' => 1
                );
            }

            $newTotal = 0;
            foreach ($_SESSION['cart'] as $item) {
                $newTotal += $item['quantity'];
            }
            echo $newTotal;
        } else {
            echo "Error: Out of stock";
        }
    } else {
        echo "Error: Product not found";
    }
}
exit;