<?php

function CheckUserId($id, $connection)
{
    $selectPostidStatement = $connection->prepare('SELECT * FROM posts WHERE id = :id');
    $selectPostidStatement->bindParam('id', $id);
    $selectPostidStatement->setFetchMode(PDO::FETCH_ASSOC);
    $selectPostidStatement->execute();
    $post = $selectPostidStatement->fetch();

    return $post;
}

//Een groot bestand met allemaal functies. 

?>
