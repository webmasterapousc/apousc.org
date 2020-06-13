<?php

$_POST = json_decode(file_get_contents('php://input'), true);

# DB info
$servername = "localhost";
$username = "apousc5_apousc5";
$password = "str0ngThec!rcl";

# DB connection + selection
$conn = new mysqli($servername, $username, $password);
$conn->select_db('apousc5_main');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

# find current time
date_default_timezone_set("America/Los_Angeles");
$now = date("Y-m-d H:i:s");



# check all events
$sql = "SELECT S.eventid, S.drive, U.username, U.fname, U.lname, U.family FROM signups S, users U WHERE eventid = ".$_POST["eventId"]." AND U.username = S.username ORDER BY S.timestamp ASC";

if ($result = mysqli_query($conn, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}

mysqli_close($conn);

?>