<?php
require_once('config.inc.php');
require_once('fetch.php');

session_start();

$searchQuery = "";
if (isset($_GET['query']) && !empty(trim($_GET['query']))) {
    $searchQuery = trim($_GET['query']);
    
    $sql = "SELECT * FROM Products WHERE category = :cat AND (PName LIKE :search OR PDesc LIKE :search)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':search', '%' . $searchQuery . '%');
    
    $stmt->bindValue(':cat', 'Cold Drinks');
    $stmt->execute();
    $coldDrinks = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    $stmt->bindValue(':cat', 'Hot Drinks');
    $stmt->execute();
    $hotDrinks = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    $stmt->bindValue(':cat', 'Bakery & Pastries');
    $stmt->execute();
    $bakery = $stmt->fetchAll(PDO::FETCH_OBJ);
} else {
    $coldDrinks = fetchProductsByCategory($pdo, "Cold Drinks");
    $hotDrinks = fetchProductsByCategory($pdo, "Hot Drinks");
    $bakery = fetchProductsByCategory($pdo, "Bakery & Pastries");
}

$totalFound = count($coldDrinks) + count($hotDrinks) + count($bakery);
?>

<!DOCTYPE html>
<html lang="en" class="mm">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Café 418</title>
    <link rel="stylesheet" href="styles.css">
    <?php include 'navbar.php'; ?>
</head>

<body>

<section class="menu-section">
    <?php if (!empty($searchQuery)): ?>
        <h2 class="title" style="margin-bottom: 10px;">Search Results</h2>
        <p style="text-align: center; color: #666; margin-bottom: 30px;">Found <?= $totalFound ?> items matching "<?= htmlspecialchars($searchQuery) ?>"</p>
    <?php else: ?>
        <h2 class="title">The Menu</h2>
 
        <div class="menu-search-box">
            <form action="menu.php" method="GET" class="search-container" id="searchContainerPage">
                <input type="text" name="query" class="search-input" id="searchInputPage" placeholder="Search for coffee, sweets...">
                <button type="button" class="search-btn" id="searchTriggerPage">
                    <img src="./images/icons/search.png" class="icon-img" alt="Search" style="width: 20px; height: 20px;">
                </button>
            </form>
        </div>
    <?php endif; ?>

    <?php if ($totalFound === 0 && !empty($searchQuery)): ?>
        <div style="text-align: center; padding: 60px 20px; color: #777;">
            <h3>No items found matching your search.</h3>
            <a href="menu.php" style="color: #8b5e3c; text-decoration: underline; display: inline-block; margin-top: 15px;">View Full Menu</a>
        </div>
    <?php endif; ?>

    <?php if (count($coldDrinks) > 0): ?>
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
    <?php endif; ?>

    <?php if (count($hotDrinks) > 0): ?>
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
    <?php endif; ?>
    
    <?php if (count($bakery) > 0): ?>
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
    <?php endif; ?>
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
        if (data.indexOf("Error") !== -1) {
            alert(data);
        } else {
            var cartCountSpan = document.getElementById('cart-count');
            if (cartCountSpan) {
                cartCountSpan.textContent = data; 
                cartCountSpan.style.display = 'inline-block';
            }
        }
    })
    .catch(function(error) {
        console.error('Error:', error);
        alert('System error. Please try again.');
    });
}

function setupSearch(triggerId, containerId, inputId) {
    const trigger = document.getElementById(triggerId);
    const container = document.getElementById(containerId);
    const input = document.getElementById(inputId);

    if(!trigger || !container || !input) return;

    trigger.addEventListener('click', function(e) {
        if (input.value.trim() !== '') {
            container.submit();
        } else {
            input.focus();
        }
    });

    input.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            if (this.value.trim() === '') {
                e.preventDefault();
            }
        }
    });
}

setupSearch('searchTriggerNav', 'searchContainerNav', 'searchInputNav');
setupSearch('searchTriggerPage', 'searchContainerPage', 'searchInputPage');
</script>
</body>
</html>
