<!DOCTYPE html>
<html>
<body>

Group 2: Read </br>

<?php
//need to insert results from results sql server
require 'connectToDB.php';
$connection = connectToDatabase("localhost","root","","cycling");

//need to retrieve results
$gear = $connection->query("Select * FROM gear");

foreach($gear as $row){
  echo $row['year'] . ", " . $row['bike'] . ", " . $row['kit'] . "<br />";
}
 ?>


<form method="" action="group2.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>
