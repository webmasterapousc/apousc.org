
<?php
include_once("include/session.php");
include_once("include/database.php");
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if (!$session->isAdmin()) {
  echo "<h2>Restricted Area</h2>\n";
  echo "<p>Sorry, but this page is a restricted area. You must be logged in as the site administrator in order to gain access.</p>\n";
} else {
  /**
   * Administrator is viewing page, so display all
   * forms.
   */
?>
<!DOCTYPE html>
<html>
 <head>
  <title>APOUSC Admin Control Panel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />

  <div class="container">
   <h2 align="center">ALL POWERFUL APOUSC ADMIN CONTROL PANEL</a></h2>
   <img src="laughs.gif" style="display: block;
                               margin-left: auto;
                               margin-right: auto;
                               width: 50%;">
   <p></p>
   <p>Hello, welcome to the APOUSC Admin Control Panel. On this page, you'll be able to</p>
   <ul>
    <li>change all current pledges to actives</li>
    <li>add new pledge excomm</li>
    <li>add new excomm</li>
    <li>view current/past excomm</li>
    <li>add big little pairings<li>
   </ul>
  </div>
 </body>
</html>
<?php
  }
?>
