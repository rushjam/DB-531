<?php
//setting header to json
header('Content-Type: application/json');

//database
include('../includes/config.php');

//query to get data from the table
$query = sprintf("SELECT `Date`,`Liter` FROM `tblmsale` ORDER BY `Date`");

//execute query
$result = mysqli_query($con, $query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
mysqli_close($con);

//now print the data
print json_encode($data);

?>