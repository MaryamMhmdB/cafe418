<?php
require_once('config.inc.php');
require_once('fetch.php');

session_start();

$coldDrinks = fetchProductsByCategory($pdo, "Cold Drinks");
$hotDrinks = fetchProductsByCategory($pdo, "Hot Drinks");
$bakery = fetchProductsByCategory($pdo, "Bakery & Pastries");
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

<?php include "navbar.php"; ?>

<section class="menu-section">
    <h2 class="title">The Menu</h2>

    <div class="menu-category">
        <h3 class="category-title">Cold Drinks</h3>
        <div class="slider-wrapper">
            <div class="menu-grid iced-slider" id="icedSlider">
                <?php foreach ($coldDrinks as $product): ?>
                    <div class="card">
                        <img src="<?= ltrim(htmlspecialchars($product->PImg), '/') ?>" 
                             onclick="window.location.href='Product_details.php?id=<?= $product->productID ?>'">
                        <div class="card-info">
                            <h3><?= htmlspecialchars($product->PName) ?></h3>
                            <p class="desc"><?= htmlspecialchars($product->PDesc) ?></p>
                            <p class="ingredients"><?= htmlspecialchars($product->ingredients) ?></p>
                            <?php if (!empty($product->Allergens)): ?>
                                <p class="allergy-info">Contains: <?= htmlspecialchars($product->Allergens) ?></p>
                            <?php endif; ?>
                            <div class="card-bottom">
                                <span><?= number_format($product->Price, 2) ?> SAR</span>
                                <button class="add-btn" onclick="addToCart(<?= $product->productID ?>)">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="menu-category">
        <h3 class="category-title">Hot Drinks</h3>
        <div class="slider-wrapper">
            <div class="menu-grid iced-slider" id="hotSlider">
                <?php foreach ($hotDrinks as $product): ?>
                    <div class="card">
                        <img src="<?= ltrim(htmlspecialchars($product->PImg), '/') ?>" 
                             onclick="window.location.href='Product_details.php?id=<?= $product->productID ?>'">
                        <div class="card-info">
                            <h3><?= htmlspecialchars($product->PName) ?></h3>
                            <p class="desc"><?= htmlspecialchars($product->PDesc) ?></p>
                            <p class="ingredients"><?= htmlspecialchars($product->ingredients) ?></p>
                            <?php if (!empty($product->Allergens)): ?>
                                <p class="allergy-info">Contains: <?= htmlspecialchars($product->Allergens) ?></p>
                            <?php endif; ?>
                            <div class="card-bottom">
                                <span><?= number_format($product->Price, 2) ?> SAR</span>
                                <button class="add-btn" onclick="addToCart(<?= $product->productID ?>)">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="menu-category">
        <h3 class="category-title">Bakery & Pastries</h3>
        <div class="slider-wrapper">
            <div class="menu-grid iced-slider" id="bakerySlider">
                <?php foreach ($bakery as $product): ?>
                    <div class="card">
                        <img src="<?= ltrim(htmlspecialchars($product->PImg), '/') ?>" 
                             onclick="window.location.href='Product_details.php?id=<?= $product->productID ?>'">
                        <div class="card-info">
                            <h3><?= htmlspecialchars($product->PName) ?></h3>
                            <p class="desc"><?= htmlspecialchars($product->PDesc) ?></p>
                            <p class="ingredients"><?= htmlspecialchars($product->ingredients) ?></p>
                            <?php if (!empty($product->Allergens)): ?>
                                <p class="allergy-info">Contains: <?= htmlspecialchars($product->Allergens) ?></p>
                            <?php endif; ?>
                            <div class="card-bottom">
                                <span><?= number_format($product->Price, 2) ?> SAR</span>
                                <button class="add-btn" onclick="addToCart(<?= $product->productID ?>)">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<script>
  function addToCart(productId) {
      var formData = new FormData();
      formData.append('product_id', productId);

    
      fetch('add-to-cart.php', {
          method: 'POST',
          body: formData
      })
      .then(function(response) {
          return response.text(); 
      })
      .then(function(data) {
          // Check if the response is an error message
          if (data.indexOf("Error") !== -1) {
              alert(data);
          } else {
              // Update the cart count using DOM Manipulation (Week 10)
              var cartCountSpan = document.getElementById('cart-count');
              if (cartCountSpan) {
                  cartCountSpan.textContent = data; // 'data' is the new total number
                  cartCountSpan.style.display = 'inline-block';
              }
          }
      })
      .catch(function(error) {
          console.error('Error:', error);
          alert('System error. Please try again.');
      });
  }
</script>

</body>
</html>