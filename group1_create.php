<!DOCTYPE html>
<html>
<body>

Group 1: Create </br>

<form action="" method="post">
  Enter race: <input type="text" name="race" />
  Enter result: <input type="text" name="result" />
  Enter year: <input type="text" name="year" />
  <input type="submit" />
</form>


<?php
//need to insert results from results sql server

if($_SERVER["REQUEST_METHOD"] == "POST"){
  require 'connectToDB.php';
  $connection = connectToDatabase("localhost","root","","cycling");

  //need to update db with submittion
  $race = test_input($_POST['race']);
  $result = test_input($_POST['result']);
  $year = test_input($_POST['year']);

  $sql = "INSERT INTO `results`(`race`, `result`, `year`) VALUES ('$race', '$result', $year)";

  $connection->query($sql);
}
?>

<form method="" action="group1.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>
