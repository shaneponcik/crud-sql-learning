<!DOCTYPE html>
<html>
<body>

Group 1: Update </br>
<form action="" method="post">
  Enter row to change(1-...): <input type="text" name="row" />
  Field to change("race","result","year"): <input type="text" name="field" />
  New value: <input type="text" name="value" />
  <input type="submit" />
</form>

<?php
//need to insert results from results sql server
require 'connectToDB.php';
$connection = connectToDatabase("localhost","root","","cycling");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $rownum = test_input($_POST['row']);
  $field = test_input($_POST['field']);
  $value = test_input($_POST['value']);

  $counter = 1;
  $results = $connection->query("SELECT * FROM RESULTS");

  foreach($results as $row){
    $race = $row['race'];
    $result = $row['result'];
    $year = $row['year'];

    if($counter != $rownum){ //if not row to be corrected
      $counter++;
    }
    else{
      //correct row depending on whether strings are needed
      if($field == "year"){
        $sql = "UPDATE `results` SET $field=$value WHERE race='$race' AND result='$result' AND year=$year";
        $connection->query($sql);
      }
      else{
        $sql = "UPDATE `results` SET $field='$value' WHERE race='$race' AND result='$result' AND year=$year";
        $connection->query($sql);
      }
      $counter++;
    }
  }
  $counter = 1;
  $results = $connection->query("Select * FROM results"); //print new results
  foreach($results as $row){
    echo "$counter: " . $row['race'] . ", " . $row['result'] . ", " . $row['year'] . "<br />";
    $counter++;
  }
}
else
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
