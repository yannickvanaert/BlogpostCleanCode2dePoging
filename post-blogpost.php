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
    <form method="POST" action="post-blogpost-action.php">
        <label for="titel">Titel: </label><br>
        <input type="text" name="titel" id="titel" required><br>
        <label for="description">Description: </label><br>
        <textarea name="description" id="description" required></textarea><br>
        <button>Post blogpost</button>
    </form>
</body>
</html>