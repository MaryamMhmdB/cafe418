<?php
session_start();

include "fetch.php";
$orders = getUserOrders();
?>
<!DOCTYPE html>
<html lang="en" class="bushra">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>

<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bushra">

    <?php include "navbar.php" ?>

  
<div class="container">

  <div class="card">
    <h2>👤 Bushra</h2>
    <p>bushra@email.com</p>

    <div class="input-group">
      <input type="text" placeholder="Enter Name">
      <input type="email" placeholder="Enter Email">
    </div>

    <button>Update Profile</button>
  </div>

<?php if(empty($orders)): ?>

<p >No previous orders yet.</p>

<?php else: ?>

<?php foreach($orders as $order): ?>

<details class="order-card">
  <summary>
    <div class="order-header">
      Order #<?= $order['id'] ?>
    </div>
  </summary>

  <div class="order-details">

    <span class="header-date">
      📅 <?= $order['date'] ?>
    </span>

    <?php foreach($order['items'] as $item): ?>
        <div class="item">
            <span><?= $item['name'] ?></span>
            <span><?= number_format($item['price'] * $item['quantity'],2) ?> SAR</span>
        </div>
    <?php endforeach; ?>

    <div class="total">
        💰 Total: <?= number_format($order['total'],2) ?> SAR
    </div>

  </div>
</details>

<?php endforeach; ?>

<?php endif; ?>

</div>

<button class="logout">Log Out</button>

</body>
</html>