<?php

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(!isset($_POST['titel']))
    {
        $_SESSION['feedback'] = "Titel is required. Please fill in";
        header('Location: post-blogpost.php');
        die;
    }

    if(!isset($_POST['description']))
    {
        $_SESSION['feedback'] = "Description is required. Please fill in";
        header('Location: post-blogpost.php');
        die;
    }

    include('helpers/connectToDb.php');

    $insertPostStatement = $connection->prepare('INSERT INTO posts (titel, description) VALUES (:titel,:description)');
    $insertPostStatement->bindParam('titel', $_POST['titel']);
    $insertPostStatement->bindParam('description', $_POST['description']);
    $insertPostStatement->setFetchMode(PDO::FETCH_ASSOC);
    $insertPostStatement->execute();

    $_SESSION['feedback'] = 'Post has been added';
    header('Location: homepage.php');
    die;
}

?>
