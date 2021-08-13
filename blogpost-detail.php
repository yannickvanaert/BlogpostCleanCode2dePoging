<?php

include('checkUserLoggedIn.php');


//include('checkUserId.php');

include('connectToDb.php');

$id = $_GET["id"];

$selectPostidStatement = $connection->prepare('SELECT * FROM posts WHERE id = :id');
$selectPostidStatement->bindParam('id', $id);
$selectPostidStatement->setFetchMode(PDO::FETCH_ASSOC);
$selectPostidStatement->execute();
$post = $selectPostidStatement->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <br>
        <h1><?= $post['titel']." (id:".$post['id'].")" ?></h1>
         <br>
        <p><?= $post['description'] ?></p>

        <?php if($post['user_id'] === $user['id']): ?>
        <form method="POST" action="update-blogpost.php?id=<?php echo $id ?>">
            <button type="submit">Edit post</button>
        </form>
        <?php endif; ?>

</body>
</html>
