<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a module </title>
</head>
<body>
    
<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "./db_connection.php";
require "./common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $new_module = array(
      "code" => $_POST['code'],
      "name"  => $_POST['name'],
      "lecturer" => $_POST['lecturer']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "modules",
      implode(", ", array_keys($new_module)),
      ":" . implode(", :", array_keys($new_module))
    );
    
    $statement = $conn->prepare($sql);
    $statement->execute($new_module);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }

?>
  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo($_POST['code']); ?> successfully added.</blockquote>
  <?php endif; ?>

  <h2>Add a module </h2>

  <form method="post">
    <input name="csrf" type="hidden" value="<?php echo($_SESSION['csrf']); ?>">
    <label for="code"> Code </label>
    <input type="text" name="code" id="code">
    <label for="name">Name </label>
    <input type="text" name="name" id="name">
    <label for="lecturer"> Lecturer </label>
    <input type="text" name="lecturer">
    <input type="submit" name="submit" value="Create">
  </form>

  <a href="index.php">Back to home</a>
</body>
</html>
