<?php 
  require_once('config.inc.php');
  require_once('fetch.php');
  session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email    = trim($_POST["usrEmail"]);
  $pass     = trim($_POST["usrPass"]);
  if(!empty($email)&&!empty($pass)){
    if (isset($_SESSION[$email])) {
      if ($_SESSION[$email]['password'] === $pass) {
        header("Location: menu.php");
      }
      $error = "Password and\or email is not correct" ;
        }
    } 
    $error =  "Please fill all inputs";
  }

?>
<!DOCTYPE html>
<html lang="en" class="mnna">
<head>
<meta charset="UTF-8">
<title>Sign in</title>
<link rel="stylesheet" href="styles.css">
</head>
<body class="login-page">
<div class="cardform">

    <form class="form" action="login.php" method="POST">
    <h2>Sign in</h2>

    <input name= "usrEmail" type="email" placeholder="Email">
    <input name= "usrPass" type="password" placeholder="Password">
    <button name= "submitLogin" type="submit">Sign in</button>
    <br>

    <a href="signup.php">Don't have an account? Create one!</a>

<a href="role.php" class="back-link">← Back to role</a>

  </form>

    <?php if (isset($error)) { ?>
      <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php } ?>
</div>

</body>
</html>
