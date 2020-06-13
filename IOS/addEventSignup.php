<?php
include("../include/database.php");

global $database; // The database object

$_POST = json_decode(file_get_contents('php://input'), true);

$subuser = $_POST["username"];
$subeventid = $_POST["eventid"];
$subdrive = 0;
$sublead = 0;
$subweight = 1;
$subguest = 0;

/* Set signup timestamp */
$subtime = time();

/* No errors, add the signup to the database */
if(!$database->signedUp($subeventid, $subuser))	{
	if ($database->addEventSignup($subuser, $subeventid, $subdrive, $sublead, $subweight, $subguest, $subtime)) {
		echo "0"; //Event signup added succesfully
	} else {
		echo "1"; //Event signup attempt failed
	}
} else {
	echo "2";
}


?>