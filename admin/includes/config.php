<?php 
//Local
// $hostname = "localhost";
// $username = "";
// $password = "";
// $database = "tourism";
// $mysqli = new mysqli($hostname, $username, $password, $database);
// /* check connection */
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }

//server
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

function fetchResult($result){
	$returnResult = array();
	while($row = $result->fetch_assoc()) // use fetch_assoc here
      {
        $returnResult[] = $row; // assign each value to array
      }
      return $returnResult;
}

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

?>