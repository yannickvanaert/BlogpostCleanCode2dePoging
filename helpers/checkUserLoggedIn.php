<?php

if(isset($_COOKIE['auth']))
{
    include('connectToDb.php');

    $selectUserStatement = $connection->prepare('SELECT * FROM users WHERE session_id = :sessionId');
    $selectUserStatement->bindParam('sessionId', $_COOKIE['auth']);
    $selectUserStatement->setFetchMode(PDO::FETCH_ASSOC);
    $selectUserStatement->execute();

    $user = $selectUserStatement->fetch();

    if($user)
    {
        header('Location: homepage.php');
        die;
    }
}

?>