<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update module </title>
</head>
<body>
    
<?php
require "./db_connection.php";

if (isset($_POST['submit'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $module = [
      "id" => $_POST['id'],
      "code" => $_POST['code'],
      "name" => $_POST['name'],
      "lecturer" => $_POST['lecturer']
    ];

    $sql = "UPDATE modules
            SET id = :id,
              code = :code,
              name = :name,
              lecturer = :lecturer
            WHERE id = :id";

  $statement = $conn->prepare($sql);
  $statement->execute($module);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $id = $_GET['id'];
    $sql = "SELECT * FROM modules WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo($_POST['name']); ?> successfully updated.
<?php endif; ?>

<h2>Edit a module </h2>

<form method="post">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Update">
</form>

<a href="./index.php">Back to home</a>


</body>
</html>
