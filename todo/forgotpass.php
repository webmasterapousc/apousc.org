<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Forgot Password";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>

<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
<?php
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if (isset($_SESSION['forgotpass'])) {
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
    echo $_PROCESS['forgotpass'];
   if ($_SESSION['forgotpass']) {
     # echo $mailer->sendNewPass($session->username, $session->userinfo['email'], $mailer->pass, $session->userinfo['fname']);
      echo "<h2>New Password Generated</h2>";
      echo "<p>Your new password has been generated and sent to the e-mail address associated with your account.</p>";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else {
      echo "<h2>New Password Failure</h2>";
      echo "<p>There was an error sending you the e-mail with the new password, so your password has not been changed.</p>";
   }
   unset($_SESSION['forgotpass']);
} else {
/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>
		<h2>Forgot Password</h2>
		<p>A new password will be generated for you and sent to the e-mail address associated with your account. All you have to do is enter your username.</p>
		<?php echo $form->error("uname"); ?>
		<form action="process.php" method="post">
			<fieldset>
				<legend>Reset Password</legend>
				<ol>
					<li>
						<label for="uname">Username:</label>
						<input id="uname" name="uname" type="text" maxlength="30" value="<?php echo $form->value("uname"); ?>">
						<?php echo $form->error("uname"); ?>
					</li>
				</ol>
				<input type="hidden" name="subforgot" value="1">
				<input type="submit" value="Get New Password">
			</fieldset>
		</form>
<?php
}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>