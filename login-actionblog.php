<?php

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(!isset($_POST['email']))
    {
        $_SESSION['feedback'] = "Email is required. Please try again.";
        header('Location: login-blog.php');
        die;
    }

    if(!isset($_POST['password']))
    {
        $_SESSION['feedback'] = "Password is required. Please try again.";
        header('Location: login-blog.php');
        die;
    }

    include('helpers/connectToDb.php');
    include('helpers/checkUserExists.php');    

    if(!$user)
    {
        $_SESSION['feedback'] = 'these credentials do not match our records. Please try again.';
        header('Location: login-blog.php');
        die;
    }

    if(!password_verify($_POST['password'], $user['hash']))
    {
        $_SESSION['feedback'] = 'these credentials do not match our records. Please try again.';
        header('Location: login-blog.php');
        die;
    }

    include('helpers/setSessionId.php');

    header('Location: homepage.php');


}

?>