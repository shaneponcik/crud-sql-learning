<!DOCTYPE html>
<html>
<body>

Group 1: Read </br>

<?php
//need to insert results from results sql server
require 'connectToDB.php';
$connection = connectToDatabase("localhost","root","","cycling");

//need to retrieve results
$results = $connection->query("Select * FROM results");

foreach($results as $row){
  echo $row['race'] . ", " . $row['result'] . ", " . $row['year'] . "<br />";
}
 ?>


<form method="" action="group1.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>
