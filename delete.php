<?php

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('Location: select.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      readfile('navigation.tmpl.html');
      $db = mysqli_connect('localhost', 'root', '', 'php');
      $sql = "DELETE FROM users WHERE id=$id";
      mysqli_query($db, $sql);
      echo '<p>User deleted</p>';
      mysqli_close($db);
     ?>
  </body>
</html>
