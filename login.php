<?php require_once('config.inc.php');  ?>
<!DOCTYPE html>
<html lang="en" class="mnna">
<head>
<meta charset="UTF-8">
<title>Sign in</title>
<link rel="stylesheet" href="styles.css">
</head>
<body class="login-page">
<div class="cardform">

    <form class="form" action="menu.php" method="get">
    <h2>Sign in</h2>

    <input name= "usrEmail" type="email" placeholder="Email">
    <input name= "usrPass" type="password" placeholder="Password">
    <button name= "submitLogin" type="submit">Sign in</button>
    <br>

    <a href="signup.php">Don't have an account? Create one!</a>

<a href="role.php" class="back-link">← Back to role</a>

  </form>

</div>

</body>
</html>
