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
    <h1>Register</h1>
    <?php if(isset($_SESSION['feedback'])): ?>
        <p><?= $_SESSION['feedback'] ?></p>
    <?php endif; ?>

    <form method="POST" action="register-actionblog.php">
        <label for="email">Email: </label><br>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password: </label><br>
        <input type="password" name="password" id="password" required><br>
        <label for="password-repeat">Repeat password: </label><br>
        <input type="password" name="password-repeat" id="password-repeat" required><br>
        <button>Register</button>
    </form>
</body>
</html>