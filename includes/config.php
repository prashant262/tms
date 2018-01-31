<?php 

//Local
$hostname = "localhost";
$username = "";
$password = "";
$database = "tourism";
$mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//server
// $hostname = "localhost";
// $username = "haiweb_user";
// $password = "hBGKR1B2JPkm";
// $database = "database_tms";
// $mysqli = new mysqli($hostname, $username, $password, $database);
// /* check connection */
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }

function fetchResult($result){
	$returnResult = array();
	while($row = $result->fetch_assoc()) // use fetch_assoc here
      {
        $returnResult[] = $row; // assign each value to array
      }
      return $returnResult;
}
?>