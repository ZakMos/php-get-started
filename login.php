<?php
  session_start();

  $message = '';

  if (isset($_POST['name']) && isset($_POST['password'])) {
    $db = mysqli_connect('localhost', 'root', '', 'php');
    $sql = sprintf("SELECT * FROM users WHERE name= '%s'",
      mysqli_real_escape_string($db, $_POST['name'])
    );
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      $hash = $row['password'];
      $isAdmin = $row['isAdmin'];

      if (password_verify($_POST['password'], $hash)) {
        $message = 'Login successful';
        $_SESSION['user'] = $row['name'];
        $_SESSION['isAdmin'] = $isAdmin;


      } else {
        $message = 'Login failed';
      }
    } else {
      $message = 'Login failed.';
    }
    mysqli_close($db);
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
    echo "<p>$message</p>";
    ?>
    <form class="" action="" method="post">
      <div class="">
        <p>User Name</p>
        <input type="text" name="name">
      </div>
      <div class="">
        <p>Password</p>
        <input type="password" name="password">
      </div>
      <div class="">
        <input type="submit" value="Login">
      </div>
    </form>
  </body>
</html>
