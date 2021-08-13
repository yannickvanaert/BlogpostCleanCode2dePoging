<?php

$userSessionId = uniqid();

$updateUserSessionIdStatement = $connection->prepare('UPDATE users SET session_id = :sessionId WHERE email = :email');
$updateUserSessionIdStatement->bindParam('sessionId', $userSessionId);
$updateUserSessionIdStatement->bindParam('email', $_POST['email']);
$updateUserSessionIdStatement->execute();
    
setcookie('auth', $userSessionId,time() + 3600,'','','', true);

?>