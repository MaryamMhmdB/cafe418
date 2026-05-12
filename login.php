<?php require_once('config.inc.php');

try {
  $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);

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
<?php
} catch (Throwable $e) {
    $code = $e->getCode();

    if ($code == 404) {
        http_response_code(404);
        include __DIR__ . '/404.html';
        exit;
    }

    if ($e instanceof PDOException) {
        http_response_code(500);
        include __DIR__ . '/pdo-error.html';
        exit;
    }
}
?>
