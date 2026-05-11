<!DOCTYPE html>
<html lang="en" class="mb">
<head>
<meta charset="UTF-8">
<title>Product Page</title>
<link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include "navbar.php" ?>


<div class="container">

    <div class="product-img">
        <img src="./images/strawberry-matcha.png">
    </div>

    <div class="product-info">

<div class="product-name">
    <h1>Strawberry Matcha Latte</h1>

    <p class="help-icon" onclick="alert('If you have any issue regarding our software please take a screenshot and report it through cafe418@gmail.com.')">
        Help !
    </p>

</div>
        <div class="price">
            16.10 SAR <span class="old-price">22 SAR</span>
        </div>

        <p> Strawberry matcha is a vibrant, layered iced drink combining fresh strawberry puree and syrup, milk, and premium matcha tea.</p>
        <p> ⚠️Allergy Information: contains traces of milk, strawberry.</p>
        <details>
            <summary>Product ingredients</summary>
            <ul>    
                <li>Matcha tea</li>
                <li>Strawberry</li>
                <li>Ice</li>
                <li>Milk</li>
            </ul>
        </details><br></br>

        <label>Size</label>
        <select>
            <option>Small</option>
            <option>Medium</option>
            <option>Large</option>
        </select><br></br>


        <label for="3">Quantity</label><br/>
        <input type="number" value="1" min="1" max="10" class="number" id="3"><br></br>

                <label>Comments: </label>
        <textarea placeholder="Add special instructions..."></textarea><br></br>

<a href="menu.php">
        <button class="btn">Add to Cart</button>
</a>
<a href="menu.php">
    <button class="back">Back to Menu</button>
</a>

    </div>

</div>

</body>
</html>