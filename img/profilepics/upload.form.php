<?php
include("../../include/session.php");
// filename: upload.form.php

// first let's set some variables

// make a note of the current working directory relative to root.
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);

// make a note of the location of the upload handler
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php';

// set a max file size for the html upload form
$max_file_size = 1000000; // size in bytes

// now echo the html page
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php
	// If user is logged in, allow uploading a pic
	if (!$session->logged_in) {
		echo "\t\t\t<p>Sorry, but you must be signed-in in order to upload a pic.\n";
	} else {
?>

<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
		
		<title>Upload Form</title>
	
	</head>
	
	<body>
	
	<form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post">
	
		<h1>
			Upload Form
		</h1>

		<ul> 
			<b>*IMPORTANT* File Requirements: </b>
			<li><b><u>Name of file needs to be your username aka your usc email (ex: ttrojan.jpg)</b></u></li>
			<li>File size must not exceed 1 MB</li>
			<li><b>File must be jpeg/jpg</b></li>
			<li>Profile pic should show professionalism :^)</li>
		</ul>
		
		<p>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
		</p>
		
		<p>
			<label for="file">File to upload:</label>
			<input id="file" type="file" name="file">
		</p>
				
		<p>
			<label for="submit">Press to...</label>
			<input id="submit" type="submit" name="submit" value="Upload me!">
		</p>

		
		If you need help with uploading, please contact <u>webmaster.apousc@gmail.com</u>!
		<div>
			<br>
		<input type="button" onclick="window.location='http://www.apousc.org/useredit.php'" class="Back" value="Back to edit"/>
	
	</form>
	
	
	</body>

</html>
<?php
	}
?>