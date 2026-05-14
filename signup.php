<?php
require_once('config.inc.php');
require_once('fetch.php');
session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name     = trim($_POST["usrName"]);
  $email    = trim($_POST["usrEmail"]);
  $pass     = trim($_POST["usrPass"]);
  $confPass = trim($_POST["usrConfPass"]);
  $tel      = trim($_POST["usrTel"]);
  $gender   = $_POST["gender"] ?? '';
  // Validation
  if (empty($name)) {
    $error = "Name is required";
  } elseif (empty($email)) {
    $error = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format";
  } 
  elseif (True) { //I want it to always enter here
    foreach ($i as $key ) {
      if ($i == $email){
        $error = "This email is already registered, try sign in";
      }
    }
  } elseif (empty($pass)) {
    $error = "Password is required";
  } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $pass)) {
    $error = "Password must be 8+ characters and include uppercase, lowercase, numbers, and symbols (@$!%*?&).";
  } elseif ($pass !== $confPass) {
    $error = "Passwords do not match";
  } elseif (empty($tel)) {
    $error = "Phone number is required";
  } elseif (!preg_match('/^05[0-9]{8}$/', $tel)) {
    $error = "Invalid phone number";
  } elseif (empty($gender)) {
    $error = "Please select a gender";
  } else {

    $_SESSION[$email] = [
      "name"   => $name,
      "email"  => $email,
      "password" => $pass,
      "tel"    => $tel,
      "gender" => $gender,
      "role" => "customer"
    ];
    
    header("Location: menu.php");
    exit();
  }
}

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
    <form class="form" action="signup.php" method="POST">
      <h2>Create Account</h2>
      <input name="usrName" type="text" placeholder="Name" value="<?= htmlspecialchars($_POST['usrName'] ?? '') ?>">
      <input name="usrEmail" type="email" placeholder="Email" value="<?= htmlspecialchars($_POST['usrEmail'] ?? '') ?>">
      <input name="usrPass" type="password" placeholder="Password">
      <input name="usrConfPass" type="password" placeholder="Confirm Password">
      <input name="usrTel" type="tel" placeholder="Phone Number" value="<?= htmlspecialchars($_POST['usrTel'] ?? '') ?>">

      <div class="gender">
        <span class="gender-title">Gender:</span>
        <label class="gender-option">
          <input type="radio" name="gender" value="Male" <?= (($_POST['gender'] ?? '') == 'Male') ? 'checked' : '' ?>> Male
        </label>
        <label class="gender-option">
          <input type="radio" name="gender" value="Female" <?= (($_POST['gender'] ?? '') == 'Female') ? 'checked' : '' ?>> Female
        </label>
      </div>

      <button type="submit">Sign up</button>
      <br>
      <a href="login.php">Already have an account? Sign in</a>
    </form>

    <?php if (isset($error)) { ?>
      <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php } ?>
  </div>

</body>

</html>