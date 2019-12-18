<?php
	// Google Analytics
	include_once("include/analytics.php")

	include("include/session.php");
	$poll_name = $_POST['poll_name'];
	$poll_type = $_POST['poll_type'];
	$poll_start = $_POST['poll_start'];
	$poll_end = $_POST['poll_end'];
	$poll_url = $_POST['poll_url'];

	$database->addPoll($poll_name, $poll_type, $poll_start, $poll_end, $poll_url);

	echo "add poll done";

	echo "
		<script>
			location.replace('home.php');
		</script>
	";
?>