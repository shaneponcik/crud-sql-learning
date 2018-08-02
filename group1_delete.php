<!DOCTYPE html>
<html>
<body>

Group 1: Delete </br>
<form action="" method="post">
  Enter row to delete: <input type="text" name="row"
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
  $results = $connection->query("SELECT * FROM RESULTS");

//do deleting
  foreach($results as $row){
    $race = $row['race'];
    $result = $row['result'];
    $year = $row['year'];

    if($counter != $rownum){ //if not row to be corrected
      $counter++;
    }
    else{
      //delete row
      $sql = "DELETE FROM `results` WHERE race='$race' AND result='$result' AND year=$year";
      $connection->query($sql);
      $counter++;
    }
  }

//print out the new data with deleted row
  $counter = 1;
  $results = $connection->query("Select * FROM results"); //print new results
  foreach($results as $row){
    echo "$counter: " . $row['race'] . ", " . $row['result'] . ", " . $row['year'] . "<br />";
    $counter++;
  }
}
else //simply print out the info
{
  //need to retrieve results
  $results = $connection->query("Select * FROM results");
  $counter = 1;
  foreach($results as $row){
    echo "$counter: " . $row['race'] . ", " . $row['result'] . ", " . $row['year'] . "<br />";
    $counter++;
  }
}

?>


<form method="" action="group1.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>
