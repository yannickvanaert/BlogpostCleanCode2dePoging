<?php

session_start();
/* try {
    $connection = new PDO('mysql:host=localhost;dbname=blogpost-db','root','root');
} catch(Exception $exception) {
    echo $exception->getMessage();
}
$posts = $connection->query('SELECT * FROM posts');
if ($posts->num_rows > 0) {
    // output data of each row
    while($row = $posts->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["description"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close(); */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "blogpost-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

$title = 'homepage';
include('includes/header.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>
    <h1>Blog pagina</h1>
    <?php if(isset($_SESSION['feedback'])): ?>
        <p><?= $_SESSION['feedback'] ?></p>
    <?php endif; ?>
    <?php
        if (!$_COOKIE['auth']) 
        { 
    ?>
        <form action="login-blog.php">
            <button>Login</button>
        </form>
        <form action="register-blog.php">
            <button>Register</button>
        </form>
    <?php
        }else{
            ?>
            <button type="button" ><a href="post-blogpost.php">Add post</a></button>
            <?php
        }
    ?>
<br>
<br>  
<table>
  <tr>
    <th>Post ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  
  <?php 
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
            echo "<td>" . $row["id"]. "</td>";
            echo "<td><a href=blogpost-detail.php?id=".$row["id"].">". $row["titel"]." </td>>";
            echo "<td>" . $row["description"]. "</td>";
            echo "<td><a href='#'>Like</a></td>";
          echo "</tr>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
  

</table>
    

    

</body>

</html>