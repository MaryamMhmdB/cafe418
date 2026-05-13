<?php
require_once('config.inc.php');
require_once('fetch.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en" class="mm">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu - Café 418</title>
  <link rel="stylesheet" href="styles.css">

</head>

<body>
  
  <?php include "navbar.php" ?>
  
  <section class="menu-section">

    <h2 class="title">The Menu</h2>

    <div class="menu-category" >

      <h3 class="category-title">Cold Drinks</h3>

      <div class="slider-wrapper">

        <div class="menu-grid iced-slider" id="icedSlider">

          <div class="card">
            <img src="./images/iced-latte.png">
            <div class="card-info">
              <h3>Iced Latte</h3>
              <p class="desc">Chilled espresso with cold milk</p>
              <p class="ingredients">espresso • cold milk • ice</p>
              <div class="card-bottom">
                <span>21.40 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/Iced-Caramel-Macchiato.png">
            <div class="card-info">
              <h3>Iced Caramel Macchiato</h3>
              <p class="desc">Sweet espresso with caramel drizzle</p>
              <p class="ingredients">espresso • milk • caramel • ice</p>
              <div class="card-bottom">
                <span>16.90 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/iced-americano.png">
            <div class="card-info">
              <h3>Iced Americano</h3>
              <p class="desc">Refreshing bold espresso over ice</p>
              <p class="ingredients">espresso • cool water • ice</p>
              <div class="card-bottom">
                <span>16.10 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/strawberry-matcha.png" alt="Strawberry Matcha">
            <div class="card-info">
              <h3>Strawberry Matcha Latte</h3>
              <p class="desc">Layered earthy matcha with fresh strawberry puree</p>
              <p class="ingredients">matcha • strawberry • cold milk • ice</p>
              <div class="card-bottom">
                <span>24.40 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/iced-mocha.png">
            <div class="card-info">
              <h3>Iced Mocha</h3>
              <p class="desc">Rich chocolate, espresso and ice</p>
              <p class="ingredients">espresso • chocolate • milk • ice</p>
              <div class="card-bottom">
                <span>19.50 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>



    <div class="menu-category">

      <h3 class="category-title">Hot Drinks</h3>

      <div class="slider-wrapper">

        <div class="menu-grid iced-slider" id="hotSlider">

          <div class="card">
            <img src="./images/espresso.png">
            <div class="card-info">
              <h3>Espresso</h3>
              <p class="desc">pure strong coffee</p>
              <p class="ingredients">coffee • water</p>
              <div class="card-bottom">
                <span>13.10 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/cortado.png">
            <div class="card-info">
              <h3>Cortado</h3>
              <p class="desc">equal espresso & milk</p>
              <p class="ingredients">espresso • milk</p>
              <div class="card-bottom">
                <span>15.80 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/flat-white.png">
            <div class="card-info">
              <h3>Flat White</h3>
              <p class="desc">smooth velvety coffee</p>
              <p class="ingredients">espresso • milk</p>
              <div class="card-bottom">
                <span>18.00 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/cappuccino.png">
            <div class="card-info">
              <h3>Cappuccino</h3>
              <p class="desc">rich foam & espresso</p>
              <p class="ingredients">espresso • milk • foam</p>
              <div class="card-bottom">
                <span>17.30 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/matcha-latte.png" alt="Matcha Latte">
            <div class="card-info">
              <h3>Matcha Latte</h3>
              <p class="desc">Premium grade matcha with steamed velvety milk</p>
              <p class="ingredients">matcha • hot milk • water</p>
              <div class="card-bottom">
                <span>21.80 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="menu-category">

      <h3 class="category-title">Bakery & Pastries</h3>

      <div class="slider-wrapper">

        <div class="menu-grid iced-slider" id="bakerySlider">

          <div class="card">
            <img src="./images/almond_croissant.png" alt="Almond Croissant">
            <div class="card-info">
              <h3>Almond Croissant</h3>
              <p class="desc">Classic, golden-brown flaky croissant</p>
              <p class="ingredients">flour • butter • egg • almonds</p>
              <p class="allergy-info">Contains: Gluten, Dairy, Eggs, Nuts</p>
              <div class="card-bottom">
                <span>16.90 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/brownie.png" alt="Brownie">
            <div class="card-info">
              <h3>Chocolate Brownie</h3>
              <p class="desc">Rich, fudgy chocolate brownie</p>
              <p class="ingredients">dark chocolate • cocoa • butter • sugar</p>
              <p class="allergy-info">Contains: Gluten, Dairy, Eggs</p>
              <div class="card-bottom">
                <span>15.00 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/cookies.png" alt="Cookies">
            <div class="card-info">
              <h3>Chocolate Chip Cookies</h3>
              <p class="desc">Soft and chewy with chocolate chunks</p>
              <p class="ingredients">flour • butter • chocolate chips • vanilla</p>
              <p class="allergy-info">Contains: Gluten, Dairy, Eggs</p>
              <div class="card-bottom">
                <span>13.10 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/carrot-cake.png" alt="Carrot Cake">
            <div class="card-info">
              <h3>Carrot Cake</h3>
              <p class="desc">Spiced cake with cream cheese frosting</p>
              <p class="ingredients">carrots • walnuts • cinnamon • cream cheese</p>
              <p class="allergy-info">Contains: Gluten, Dairy, Eggs, Nuts</p>
              <div class="card-bottom">
                <span>20.60 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

          <div class="card">
            <img src="./images/blueberry-tart.png" alt="Blueberry Tart">
            <div class="card-info">
              <h3>Blueberry Tart</h3>
              <p class="desc">Freshly baked tart with juicy blueberries</p>
              <p class="ingredients">flour • butter • egg • blueberries</p>
              <p class="allergy-info">Contains: Gluten, Dairy, Eggs</p>
              <div class="card-bottom">
                <span>14.60 SAR</span>
                <button class="add-btn" onclick="window.location.href='Product_details.php'">Add to cart</button>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </section>

</body>

</html>