<!DOCTYPE html>
<html lang="en" class="mm">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Café 418</title>

  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body>

  <section class="home" id="home">
    <div class="container">

    <?php include "navbar.php" ?>

      <div class="home-content">
        <div class="left">
          <h1>Start your day<br>with perfect coffee</h1>
          <p>Your daily comfort in a cup.</p>

          <div class="buttons">
            <a href="login.html">
              <button class="btn-primary">Order Now</button>
            </a>

            <a href="menu.php">
              <button class="btn-secondary">Explore Menu</button>
            </a>
          </div>

          <div class="stats">
            <div>
              <h2>20+</h2>
              <p>Coffee Variants</p>
            </div>

            <div>
              <h2>10K+</h2>
              <p>Happy Customers</p>
            </div>

            <div>
              <h2>100%</h2>
              <p>Arabica Beans</p>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section>
  <section class="best-sellers">
    <h2 class="title">our signature collection</h2>

    <div class="coffee-container">
      <div class="coffee-item">
        <img src="./images/iced-latte.png" alt="Iced Latte">
        <span class="coffee-name">Iced Latte</span>
      </div>

      <div class="coffee-item">
        <img src="./images/Iced-Caramel-Macchiato.png" alt="Caramel Macchiato">
        <span class="coffee-name">Caramel Macchiato</span>
      </div>

      <div class="coffee-item">
        <img src="./images/iced-americano.png" alt="Iced Coffee">
        <span class="coffee-name">Iced Americano</span>
      </div>

      <div class="coffee-item">
        <img src="./images/iced-mocha.png" alt="Iced Mocha">
        <span class="coffee-name">Iced Mocha</span>
      </div>

    </div>
    </div>
  </section>


  <section class="new-drink">
    <div class="new-drink-content">

      <div class="text">
        <h2>NEW DRINK</h2>
        <h1>Strawberry Matcha Latte</h1>
        <p>
          A perfect blend of creamy matcha and fresh strawberry sweetness.<br> Refreshing, smooth, and made to elevate your day.
        </p>
        <a href="Product_details.php" class="btn">Try It Now</a>
      </div>

    </div>
  </section>


</body>

</html>