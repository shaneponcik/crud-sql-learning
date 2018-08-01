<!DOCTYPE html>
<html>
<body>

Group 2: Update </br>
<form action="" method="post">
  Enter row to change(1-...): <input type="text" name="row" />
  Field to change("year","bike","kit"): <input type="text" name="field" />
  New value: <input type="text" name="value" />
  <input type="submit" />
</form>

<?php
//need to insert results from results sql server
require 'connectToDB.php';
$connection = connectToDatabase("localhost","root","","cycling");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $rownum = $_POST['row'];
  $field = $_POST['field'];
  $value = $_POST['value'];

  $counter = 1;
  $gear = $connection->query("SELECT * FROM GEAR");

  foreach($gear as $row){
    $year = $row['year'];
    $bike = $row['bike'];
    $kit = $row['kit'];

    if($counter != $rownum){ //if not row to be corrected
      $counter++;
    }
    else{
      //correct row depending on whether strings are needed
      if($field == "year"){
        $sql = "UPDATE `gear` SET $field=$value WHERE year=$year AND bike='$bike' AND kit='$kit'";
        $connection->query($sql);
      }
      else{
        $sql = "UPDATE `gear` SET $field='$value' WHERE year=$year AND bike='$bike' AND kit='$kit'";
        $connection->query($sql);
      }
      $counter++;
    }
  }
  $counter = 1;
  $gear = $connection->query("Select * FROM gear"); //print new results
  foreach($gear as $row){
    echo "$counter: " . $row['year'] . ", " . $row['bike'] . ", " . $row['kit'] . "<br />";
    $counter++;
  }
}
else
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
