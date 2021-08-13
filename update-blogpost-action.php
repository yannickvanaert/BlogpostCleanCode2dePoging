<?php

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(!isset($_COOKIE['auth']))
    {
        header('Location: login-blog.php');
    }

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

    try {
        $connection = new PDO('mysql:host=localhost;dbname=blogpost-db','root','root');
    } catch(Exception $exception) {
        echo $exception->getMessage();
    }

    $id = $_GET["id"];

    $updatePostStatement = $connection->prepare('UPDATE posts SET titel =:titel, description =:description WHERE id = :id');
    $updatePostStatement->bindParam('id', $id);
    $updatePostStatement->bindParam('titel',$_POST['titel']);
    $updatePostStatement->bindParam('description', $_POST['description']);
    $updatePostStatement->execute();

    $_SESSION['feedback'] = 'Post has been updated.';
    header('Location: homepage.php');
    die;


}
header('Location: homepage.php');
die;
?>