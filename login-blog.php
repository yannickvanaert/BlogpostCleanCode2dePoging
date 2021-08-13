<?php

session_start();

include('checkUserLoggedIn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <?php if(isset($_SESSION['feedback'])): ?>
        <p><?= $_SESSION['feedback'] ?></p>
    <?php endif; ?>

    <form method="POST" action='login-actionblog.php'>
        <label>Email: </label><br>
        <input type="email" name="email" id="email" required><br>
        <label>Password: </label><br>
        <input type="password" name="password" id="password" required><br>
        <button>Login</button>
    </form>
</body>
</html>