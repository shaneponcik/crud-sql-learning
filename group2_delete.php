<!DOCTYPE html>
<html>
<body>

Group 2: Delete </br>
<form action="" method="post">
  Enter row to delete(1-...): <input type="text" name="row" />
  <input type="submit" />
</form>

<?php
//need to insert results from results sql server
require 'connectToDB.php';
$connection = connectToDatabase("localhost","root","","cycling");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $rownum = test_input($_POST['row']);

  $counter = 1;
  $gear = $connection->query("SELECT * FROM GEAR");

  foreach($gear as $row){ //deleting
    $year = $row['year'];
    $bike = $row['bike'];
    $kit = $row['kit'];

    if($counter != $rownum){ //if not row to be corrected
      $counter++;
    }
    else{
      $sql = "DELETE FROM `gear` WHERE year=$year AND bike='$bike' AND kit='$kit'";
      $connection->query($sql);
      $counter++;
    }
  }

  //PRINT OUT NEW RESULTS AFTER DELETE
  $counter = 1;
  $gear = $connection->query("Select * FROM gear"); //print new results
  foreach($gear as $row){
    echo "$counter: " . $row['year'] . ", " . $row['bike'] . ", " . $row['kit'] . "<br />";
    $counter++;
  }
}
else //IF NO DELETE REQUEST WAS SUBMITTED, JUST PRINT OUT LIST
{
  //need to retrieve results
  $gear = $connection->query("Select * FROM gear");
  $counter = 1;
  foreach($gear as $row){
    echo "$counter: " . $row['year'] . ", " . $row['bike'] . ", " . $row['kit'] . "<br />";
    $counter++;
  }
}
?>


<form method="" action="group2.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>
