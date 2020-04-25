<?php

/**
  * Delete a module
  */


require "./db_connection.php";
require "./common.php";

$success =" ";
if (isset($_GET["id"])) {
  try {
    new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $id = $_GET["id"];

    $sql = "DELETE FROM modules WHERE id = :id";


    $success = "module successfully deleted";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $sql = "SELECT * FROM modules";

  $statement = $conn->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php 
if($success) echo $success; 
?>
<h2>Delete Module </h2>


<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Code </th>
      <th> Name</th>
      <th>Lecturer </th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo($row["id"]); ?></td>
      <td><?php echo($row["code"]); ?></td>
      <td><?php echo($row["name"]); ?></td>
      <td><?php echo($row["lecturer"]); ?></td>
      <td><a href="delete.php?id=<?php echo($row["id"]); ?>"> Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>