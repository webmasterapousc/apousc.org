<?php
	include_once("../include/constants.php");
	include_once('../include/fix_mysql.inc.php');
	include_once("../mail.php");
	//include_once("../include/database.php");
	
	//$q = "DELETE FROM `" . TBL_SIGNUPS . "` WHERE `username` = '$username' AND `eventid` = $eventid";
	//mysql_query($q, $this->connection);

	//test values
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_error) {
	  exit('Error connecting to database'); //Should be a message a typical user could understand in production
	}
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysqli->set_charset("utf8mb4");
	$eventid=6413;

	//check max for event
	$ps = $mysqli->prepare("SELECT max FROM events WHERE id = ?");
	$ps->bind_param("i", $eventid);
	$ps->execute();
	$result = $ps->get_result();
	$event_max = $result->fetch_row()[0];
	if ($event_max == 0) return; //no limit

	//check number of signups
	$param = "timestamp";	
	$ps = $mysqli->prepare("SELECT * FROM signups WHERE eventid = ? ORDER BY timestamp ASC");
	$ps->bind_param("i", $eventid); 
	
	$ps->execute();
	$result = $ps->get_result();

	//if need be, email the person who's most recent on the waitlist
	//signups order by timestamp, index of max
	echo ("max, results: ".$event_max . " " . mysqli_num_rows($result)."\n");
	if (mysqli_num_rows($result) >= $event_max) {
		$rows = mysqli_fetch_all($result);
		echo print_r($rows[$event_max - 1]);
		$username = $rows[$event_max - 1][0];
		//find email of user
		$ps = $mysqli->prepare("SELECT email FROM users WHERE `username` = ?");
		$ps->bind_param("s", $username);
		$ps->execute();
		$result = $ps->get_result();
		$email = $result->fetch_row()[0];
		//find firstname of user
		$ps = $mysqli->prepare("SELECT fname FROM users WHERE `username` = ?");
		$ps->bind_param("s", $username);
		$ps->execute();
		$result = $ps->get_result();
		$fname = $result->fetch_row()[0];
		//get name of event
		$ps = $mysqli->prepare("SELECT name FROM events WHERE id = ?");
		$ps->bind_param("i", $eventid);
		$ps->execute();
		$result = $ps->get_result();
		$event_name = $result->fetch_row()[0];
		echo ("event name is ".$event_name);
		//construct $mail_subject and $mail_msg
		$mail_subject = "Congratulations! You're off the Waitlist";
		$mail_msg = "Hi ".$fname.", you've been taken off the waitlist for event \"".$event_name."\". Please show up on time! Your attendance is expected.";
		//send email
		sendMail($email, $mail_subject, $mail_msg);
	}
	return;
?>