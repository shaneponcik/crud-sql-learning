<?php

function connectToDatabase($servername,$username, $password, $dbName){
  try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    return $connection;
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
