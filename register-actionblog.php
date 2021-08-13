<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['password-repeat']))
    {
        $_SESSION['feedback'] = "Every field is required. Please try again.";
        header('Location: register-blog.php');
        die;
    }

    if($_POST['password-repeat'] !== $_POST['password'])
    {
        $_SESSION['feedback'] = 'Password do not match. Please try again';
        header('Location: register-blog.php');
        die;
    }

    include('helpers/connectToDb.php');
    include('helpers/checkUserExists.php');

    if($user)
    {
        $_SESSION['feedback'] = 'User already exist';
        header('Location: register-blog.php');
        die;
    }

    $hash = password_hash($_POST['password'],PASSWORD_BCRYPT);

    $insertUserStatement = $connection->prepare('INSERT INTO users (email, hash) VALUES(:email,:hash)');
    $insertUserStatement->bindParam('email', $_POST['email']);
    $insertUserStatement->bindParam('hash', $hash);
    $insertUserStatement->execute();
    

    $_SESSION['feedback'] = 'Account had been created!';
    header('Location: login-blog.php');
    die;

}

?>