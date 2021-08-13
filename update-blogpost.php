<?php

$id = $_GET["id"];

include('Helpers/connectToDb.php');
include('Helpers/checkUserId.php');
$post = CheckUserId($id, $connection);

$title = 'update blogpost';
include('includes/header.php');

?>


    <form method="POST" action="controller/update-blogpost-action.php?id=<?php echo $id ?>">
        <label for="titel">Titel: </label><br>
        <input value="<?= $post['titel'] ?>" type="text" name="titel" id="titel" required><br>
        <label for="description">Description: </label><br>
        <textarea type="text" name="description" id="description" required><?php echo $post['description'] ?></textarea><br>
        <button>Edit blogpost</button>
    </form>

<?php

include('includes/footer.php');

?> 