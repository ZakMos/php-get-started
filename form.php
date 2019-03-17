<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      if (isset($_POST['submit'])) {
        $ok = ture;
      if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
      }
      if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
      }
      if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
      }

      // in case of Array we use !is_array and count = 0
      if (!isset($_POST['languages']) || !is_array($_POST['languages']) || count($_POST['languages']) === 0) {
        $ok = false;
      }

      if (!isset($_POST['comments']) || $_POST['comments'] === '') {
      if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
      }
        $ok = false;
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
         htmlspecialchars($_POST['name']),
         htmlspecialchars($_POST['password']),
         htmlspecialchars($_POST['gender']),
         htmlspecialchars($_POST['color']),
         // The implode function is used to "join elements of an array with a string".
         htmlspecialchars(implode(' - ', $_POST['languages'])),
         htmlspecialchars($_POST['comments']),
         htmlspecialchars($_POST['tc']));
      }
    }
     ?>
    <form method="post" action="">
      User name: <input type="text" name="name"/><br>
      Password: <input type="password" name="password"/><br>
      Gender:
        <input type="radio" name="gender" value="f">female
        <input type="radio" name="gender" value="m">male<br>
      Favorit Color:
        <select class="" name="color">
          <option value="f00">red</option>
          <option value="0f0">green</option>
          <option value="00f">blue</option>
        </select><br>
      Language Spoken:
      <select class="" name="languages[]" multiple size="3">
        <option value="en">English</option>
        <option value="fr">French</option>
        <option value="de">Deutsch</option>
      </select><br>
      Comments: <textarea name="comments"></textarea><br>
      <input type="checkbox" name="tc" value="ok">I accept the T&C<br>
      <input type="submit" name="submit" value="submit">
    </form>
  </body>
</html>
