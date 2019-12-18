<?php
/**
 * Process.php
 * 
 * The Process class is meant to simplify the task of processing
 * user submitted forms, redirecting the user to the correct
 * pages if errors are found, or if form is successful, either
 * way. Also handles the logout procedure.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 *
 * Modified by: Brad Ramos (bradleyRamos@gmail.com)
 * Last Updated: November 2011
 */
include_once("include/session.php");


$id=$_POST['id'];
$delete = "DELETE FROM comments WHERE id=$id";
$result = mysql_query($delete) or die(mysql_error());


?>