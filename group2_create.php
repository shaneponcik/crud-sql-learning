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

  $year = $_POST['year'];
  $bike = $_POST['bike'];
  $kit = $_POST['kit'];

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
