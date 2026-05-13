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

  <div class="orders-container">

    <div class="orders-header">
      <h2>📦 Previous Orders</h2>
    </div>

    <details class="order-card">
      <summary>
        <div class="order-header">
          <span>Order #1004</span>
        </div>
      </summary>

      <div class="order-details">
        <span class="header-date"> 📅 17th April 2026 </span> 
        <div class="item"><span>☕ Iced Latte</span><span>21.40 SAR</span></div>
        <div class="item"><span>☕ Cappuccino</span><span>17.30 SAR</span></div>
        <div class="item"><span>🍫 Chocolate Brownie</span><span>15.60 SAR</span></div>
        <div class="total">💰 Total: 54.30 SAR</div>
      </div>
    </details>

    <details class="order-card">
      <summary>
        <div class="order-header">
          <span>Order #1003</span>
        </div>
      </summary>

      <div class="order-details">
        <span class="header-date"> 📅 14th April 2026 </span> 
        <div class="item"><span>☕ Iced Americano</span><span>16.10 SAR</span></div>
        <div class="item"><span>☕ Flat White</span><span>18.00 SAR</span></div>
        <div class="item"><span>🍪 Cookies</span><span>8.10 SAR</span></div>
        <div class="total">💰 Total: 42.20 SAR</div>
      </div>
    </details>

    <details class="order-card">
      <summary>
        <div class="order-header">
          <span>Order #1002</span>
        </div>
      </summary>

      <div class="order-details">
        <span class="header-date"> 📅 10th April 2026 </span> 
        <div class="item"><span>🍵 Matcha Latte</span><span>21.80 SAR</span></div>
        <div class="item"><span>☕ Iced Mocha</span><span>19.50 SAR</span></div>
        <div class="item"><span>🥐 Almond Croissant</span><span>19.70 SAR</span></div>
        <div class="total">💰 Total: 61.00 SAR</div>
      </div>
    </details>

    <details class="order-card">
      <summary>
        <div class="order-header">
          <span>Order #1001</span>
        </div>
      </summary>

      <div class="order-details">
        <span class="header-date"> 📅 1st April 2026 </span> 
        <div class="item"><span>☕ Espresso</span><span>13.10 SAR</span></div>
        <div class="item"><span>☕ Cortado</span><span>15.80 SAR</span></div>
        <div class="item"><span>🍪 Cookies</span><span>9.50 SAR</span></div>
        <div class="total">💰 Total: 38.40 SAR</div>
      </div>
    </details>

  </div>

</div>

<button class="logout">Log Out</button>

</body>
</html>