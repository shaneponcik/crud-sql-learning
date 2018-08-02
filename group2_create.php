<!DOCTYPE html>
<html>
<body>

Group 2: Create </br>

<form action="" method="post">
  Enter year: <input type="text" name="year" />
  Enter bike: <input type="text" name="bike" />
  Enter kit: <input type="text" name="kit" />
  <input type="submit" />
</form>


<?php
//need to insert results from results sql server

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  require 'connectToDB.php';
  $connection = connectToDatabase("localhost","root","","cycling");

  $year = test_input($_POST['year']);
  $bike = test_input($_POST['bike']);
  $kit = test_input($_POST['kit']);

  if($year != '2016' || $year != '2017' || $year != '2018')
    throw new Exception("Invalid year entry");

  //need to update db with submittion
  $sql = "INSERT INTO gear(year,bike,kit) VALUES ($year,'$bike','$kit')";
  //echo $sql;
  $connection->query($sql);
}

?>

<form method="" action="group2.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>
