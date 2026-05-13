<?php 
  require_once('config.inc.php');
  require_once('fetch.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en" class="bushra">
<head>
<meta charset="UTF-8">
<title>Product Management</title>

<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bushra">

<div class="navbar">

    <div class="nav-left">
        <img src="./images/theLogo.png" class="logo">

        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="about.php">About us</a>
            <a href="contact-us.php">Contact us</a>
        </div>
    </div>

    <div class="nav-icons">
        <input type="text" class="search" placeholder="Search...">

        <button class="logout" onclick="window.location.href='index.php'">
            Logout
        </button>
    </div>

</div>

<div class="container">

  <div class="form-card">

    <h2>➕ Add New Product</h2>

    <div class="products">
      <input type="text" placeholder="Product Name">
      <input type="number" placeholder="Price">
    </div>

    <select>
      <option>Select Category</option>
      <option>Cold Drinks</option>
      <option>Hot Drinks</option>
      <option>Bakery</option>
    </select>

    <input type="file" accept="image/*" class="file">

    <div>
      <button class="add-btn">+ Add Product</button>
    </div>
  </div>


  <div class="table-card">
    <table>
      <thead>
        <tr>
          <th>☕ Product</th>
          <th>💲 Price</th>
          <th>📂 Category</th>
          <th>✏️ Edit</th>
          <th>🗑 Delete</th>
        </tr>
      </thead>

      <tbody>

        <tr>
          <td>Strawberry Matcha Latte</td>
          <td>24.40</td>
          <td>Cold Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Iced Latte</td>
          <td>21.40</td>
          <td>Cold Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Iced Caramel Macchiato</td>
          <td>16.90</td>
          <td>Cold Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Iced Americano</td>
          <td>16.10</td>
          <td>Cold Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Iced Mocha</td>
          <td>19.50</td>
          <td>Cold Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Espresso</td>
          <td>13.10</td>
          <td>Hot Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Cortado</td>
          <td>15.80</td>
          <td>Hot Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Flat White</td>
          <td>18.00</td>
          <td>Hot Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Cappuccino</td>
          <td>17.30</td>
          <td>Hot Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Matcha Latte</td>
          <td>21.80</td>
          <td>Hot Drinks</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Almond Croissant</td>
          <td>16.90</td>
          <td>Bakery</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Chocolate Brownie</td>
          <td>15.00</td>
          <td>Bakery</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Chocolate Chip Cookies</td>
          <td>13.10</td>
          <td>Bakery</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Carrot Cake</td>
          <td>20.60</td>
          <td>Bakery</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

        <tr>
          <td>Blueberry Tart</td>
          <td>14.60</td>
          <td>Bakery</td>
          <td><a href="edit.php" class="edit-btn"><i class="fa fa-pen"></i></a></td>
          <td><label for="delete-popup" class="delete-btn"><i class="fa fa-trash"></i></label></td>
        </tr>

      </tbody>
    </table>
  </div>

</div>


<input type="checkbox" id="delete-popup">


<div class="popup-overlay">
  <div class="popup-box">

    <h3>Are you sure you want to delete this product?</h3>

    <div class="popup-buttons">
      <a href="#" class="yes-btn">Yes</a>
      <label for="delete-popup" class="no-btn">No</label>
    </div>

  </div>
</div>

</body>
</html>