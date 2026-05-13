<?php
require_once('config.inc.php');
require_once('fetch.php');
session_start();
$_SESSION['role']="admin";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["usremail"]) && !empty($_POST["usrpass"])) {
        $d = findAdminByEmail($pdo, $_POST["usremail"]);

        if ($d && $d->Password == $_POST["usrpass"]) {
            $_SESSION["userObj"]= $d;
            header("Location: admin.php");
            exit();
        } else {
            $error = "Incorrect email and\or password";
        }
    } else {
        $error = "Please fill all the inputs";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="mnna">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="login-page">

    <div class="cardform">
        <form class="form" action="adminlogin.php" method="POST">
            <h2>Sign in</h2>
            <input type="email" name="usremail" placeholder="Email" value="<?= htmlspecialchars($_POST['usremail'] ?? '') ?>">
            <input type="password" name="usrpass" placeholder="Password">
            <button type="submit">Sign in</button>
            <a href="role.php" class="back-link">← Back to role</a>
        </form>

        <?php if (isset($error)) { ?>
            <p style="color:red;"><?= $error ?></p>
        <?php } ?>
    </div>

</body>

</html>