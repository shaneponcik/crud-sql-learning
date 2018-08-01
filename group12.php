<!DOCTYPE html>
<html>
<body>

Using INNERJOIN between Group1 and Group2 on YEAR <br />

<?php
//want to submit a innerjoin between two tables
require 'connectToDB.php';
$connection = connectToDatabase("localhost","root","","cycling");

$sql = "SELECT results.race, gear.bike, gear.kit FROM results INNER JOIN gear ON results.year = gear.year";
$info = $connection->query($sql);

foreach($info as $row){
  echo $row['race'] . ", " . $row['bike'] . ", " . $row['kit'] . "<br />";
}
 ?>

<form method="" action="home.php">
    <button type="submit">Back to home</button>
</form>

</body>
</html>
