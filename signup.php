<?php 
  require_once('config.inc.php');
  require_once('fetch.php');
  session_start();
  $_SESSION['role']="customer";
?>

<!DOCTYPE html>
<html lang="en" class="mnna">

<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body class="signup-page">
  <div class="cardform">
    <form class="form" action="menu.php" method="get">
      <h2>Create Account</h2>
      <input name="usrName" type="text" placeholder="Name">
      <input name="usrEmail" type="email" placeholder="Email">
      <input name="usrPass" type="password" placeholder="Password">
      <input name="usrTel" type="tel" placeholder="Phone Number">

      <div class="gender">
        <span class="gender-title">Gender:</span>

        <label class="gender-option">
          <input type="radio" name="gender" value = "Male"> Male
        </label>

        <label class="gender-option">
          <input type="radio" name="gender" value = "Female"> Female
        </label>
      </div>
      <button>Sign up</button>
      <br>
      <a href="login.php">Already have an account? Sign in</a>
    </form>

  </div>

</body>

</html>
