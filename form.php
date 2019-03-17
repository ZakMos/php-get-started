<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      $name = '';
      $password = '';
      $comments = '';
      $gender = '';
      $tc = '';
      $color = '';
      $languages = array();

      if (isset($_POST['submit'])) {
        $ok = ture;
      if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
      } else {
        $name = $_POST['name'];
      }
      if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
      } else {
        $password = $_POST['password'];
      }
      if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
      } else {
        $color = $_POST['color'];
      }
      // in case of Array we use !is_array and count = 0
      if (!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === 0) {
        $ok = false;
      } else {
        $languages = $_POST['languages'];
      }
      if (!isset($_POST['comments']) || $_POST['comments'] === '') {
        $ok = false;
      } else {
        $comments = $_POST['comments'];
      }
      if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
      } else {
        $tc = $_POST['tc'];
      }

      if ($ok) {
        printf('User name: %s
        <br>Passwrod: %s
        <br>Gender: %s
        <br>Color: %s
        <br>Languages(s): %s
        <br>Comments: %s
        <br>T&amp;C: %s',
        // htmlspecialchars used to avoid html chars like < > & ...
         htmlspecialchars($name),
         htmlspecialchars($password),
         htmlspecialchars($gender),
         htmlspecialchars($color),
         // The implode function is used to "join elements of an array with a string".
         htmlspecialchars(implode(' - ', $languages)),
         htmlspecialchars($comments),
         htmlspecialchars($tc));
       }
    }
     ?>
    <form method="post" action="">
      User name: <input type="text" name="name" value="<?php
      echo htmlspecialchars($name);
      ?>"/><br>
      Password: <input type="password" name="password" value="<?php
      echo htmlspecialchars($password);
      ?>"/><br>
      Gender:
        <input type="radio" name="gender" value="f" <?php
          if($gender === 'f') {
            echo "checked";
          }
         ?>>female
        <input type="radio" name="gender" value="m" <?php
          if($gender === 'm') {
            echo "checked";
          }
         ?>>male<br>
      Favorit Color:
        <select class="" name="color">
          <option value="#f00" <?php
            if($color === '#f00'){
              echo 'selected';
            }
           ?>>red</option>
          <option value="#0f0" <?php
            if($color === '#0f0') {
              echo 'selected';
            }
           ?>>green</option>
          <option value="#00f" <?php
            if($color === '#00f') {
              echo 'selected';
            }
          ?>>blue</option>
        </select><br>
      Language Spoken:
      <select class="" name="languages[]" multiple size="3">
        <option value="en" <?php
          if(in_array('en', $languages)) {
            echo 'selected';
          }
         ?>>English</option>
        <option value="fr" <?php
          if(in_array('fr', $languages)) {
            echo 'selected';
          }
        ?>>French</option>
        <option value="de" <?php
          if(in_array('de', $languages)) {
            echo 'selected';
          }
         ?>>Deutsch</option>
      </select><br>
      Comments: <textarea name="comments" value="<?php
      echo htmlspecialchars($comments);
      ?>"></textarea><br>
      <input type="checkbox" name="tc" value="ok" <?php
        if ($tc === ok) {
          echo "checked";
        }
       ?>>I accept the T&C<br>
      <input type="submit" name="submit" value="submit">
    </form>
  </body>
</html>
