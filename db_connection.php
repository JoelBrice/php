<?php

$servername = "localhost";
$username = "root";
$password = "root@1#:)";
$dbname = "ict2613";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // Select all the fields from the db
     $select_db = $conn->prepare("SELECT id, code, name, lecturer FROM modules");
    $select_db->execute();

    // set the resulting array to associative
    $result = $select_db->setFetchMode(PDO::FETCH_ASSOC);
}


catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
