<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Module </title>
</head>
<body>
<?php

/**
  * List all users with a link to edit
  */

try {
  require "db_connection.php";
//   require "../common.php";

  $sql = "SELECT * FROM modules";

  $stm = $conn->prepare($sql);
  $stm->execute();

  $result = $stm->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<h2> Update subject </h2>

<table>
  <thead>
    <tr>
      <th> Code</th>
      <th> Name </th>
      <th> Lecturer </th>
      <th> Edit </th>
    </tr>
  </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo($row["id"]); ?></td>
        <td><?php echo($row["code"]); ?></td>
        <td><?php echo($row["name"]); ?></td>
        <td><?php echo($row["lecturer"]); ?></td>
        <td><a href="update-single.php?id=<?php echo($row["id"]); ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href= "./index.php"> Back to home</a>   
</body>
</html>