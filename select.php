<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      $db = mysqli_connect('localhost', 'root', '', 'php');
      $sql = 'SELECT * FROM users';
      $result = mysquli_query($db, $sql);

      foreach ($result as $row) {
        printf('<li><span style="color: %s">%s (%s)</span>
        <a href="update.php?id=%s">edit</a>
        <a href="delete.php?id=%s">delete</a>
        </li>',
          htmlspecialchars($row['color']),
          htmlspecialchars($row['name']),
          htmlspecialchars($row['gender']),
          htmlspecialchars($row['id']),
          htmlspecialchars($row['id'])
        );
      }
      mysqli_close($db);
     ?>
  </body>
</html>
