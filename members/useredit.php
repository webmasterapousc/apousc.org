<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "User Account Edit";
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
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if (isset($_SESSION['useredit'])) {
	unset($_SESSION['useredit']);
	echo "\t\t\t<h2>User Account Edit Success</h2>\n";
	echo "\t\t\t<p>Congratulations, <strong>$session->username</strong>! Your account has been successfully updated.</p>\n";
} else {
	/**
	 * If user is not logged in, display error.
	 * If user is logged in, then display the form to edit
	 * account information, with the current e-mail address
	 * already in the field.
	 */
	if (!$session->logged_in) {
		echo ("\t\t\t<h2>Restricted Area</h2>\n");
		echo ("\t\t\t<p>Sorry, but you must be logged in in order to view this page.</p>\n");
	} else {
?>
			<h2>User Account Edit</h2>
			<?php
			if ($form->num_errors > 0) {
				echo "<p>".$form->num_errors." error(s) found</p>";
			}
			?>
			<form action="process.php" method="post">
				<fieldset>
					<legend>Edit User Information</legend>
					<ol>
						<li>
							<label for="pass_Curpass">Current Password</label>
							<input type="password" id="pass_Curpass" name="pass_Curpass" maxlength="30" value="<?php echo $form->value("pass_Curpass"); ?>" />
							<?php echo $form->error("pass_Curpass"); ?>
						</li>
						<li>
							<label for="pass_Newpass">New Password</label>
							<input type="password" id="pass_Newpass" name="pass_Newpass" maxlength="30" value="<?php echo $form->value("pass_Newpass"); ?>" />
							<?php echo $form->error("pass_Newpass"); ?>
							<p class="small">Password must be at least 8 characters long</p>
						</li>
						<li>
							<label for="pass_Newpass2">Re-type New Password</label>
							<input type="password" id="pass_Newpass2" name="pass_Newpass2" maxlength="30" value="<?php echo $form->value("pass_Newpass2"); ?>" />
							<?php echo $form->error("pass_Newpass2"); ?>
						</li>
						<li>
							<label for="txt_Email">Email</label>
							<input type="text" id="txt_Email" name="txt_Email" maxlength="50" value="<?php
							if (strcmp($form->value("txt_Email"),"") == 0) {
								echo $session->userinfo['email'];
							} else {
								echo $form->value("txt_Email");
							}
							?>" />
							<?php echo $form->error("txt_Email"); ?>
						</li>
						<li>
							<label for="txt_alumail">Secondary Email</label>
							<input type="text" id="txt_alumail" name="txt_alumail" maxlength="50" value="<?php
							if (strcmp($form->value("txt_alumail"),"") == 0) {
								echo $session->userinfo['alumail'];
							} else {
								echo $form->value("txt_alumail");
							}
							?>" />
							<?php echo $form->error("txt_alumail"); ?>
						</li>
						<li>
							<label for="tel_Phone">Phone Number</label>
							<input type="tel" id="tel_Phone" name="tel_Phone" maxlength="14" value="<?php
							if (strcmp($form->value("tel_Phone"),"") == 0) {
								echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $session->userinfo['phone']);
							} else {
								echo $form->value("tel_Phone");
							}
							?>" />
							<?php echo $form->error("tel_Phone"); ?>
						</li>
						<li>
							<label for="txtarea_Address">Address</label><?php echo $form->error("txtarea_Address"); ?>
							<textarea id="txtarea_Address" name="txtarea_Address" cols="40" rows="4"><?php 
							if (strcmp($form->value("txtarea_Address"),"") == 0) {
								echo $session->userinfo['address'];
							} else {
								echo $form->value("txtarea_Address");
							}
							?></textarea>
						</li>
						<li>
							<label for="sel_Tshirt">T-shirt Size</label>
							<select id="sel_Tshirt" name="sel_Tshirt">
								<option value="">Choose one&hellip;</option>
								<option value="XXS"<?php if(strcmp($session->userinfo['shirt_size'],"XXS")==0){echo " selected=\"selected\"";} ?>>XXS</option>
								<option value="XS"<?php if(strcmp($session->userinfo['shirt_size'],"XS")==0){echo " selected=\"selected\"";} ?>>XS</option>
								<option value="S"<?php if(strcmp($session->userinfo['shirt_size'],"S")==0){echo " selected=\"selected\"";} ?>>S</option>
								<option value="M"<?php if(strcmp($session->userinfo['shirt_size'],"M")==0){echo " selected=\"selected\"";} ?>>M</option>
								<option value="L"<?php if(strcmp($session->userinfo['shirt_size'],"L")==0){echo " selected=\"selected\"";} ?>>L</option>
								<option value="XL"<?php if(strcmp($session->userinfo['shirt_size'],"XL")==0){echo " selected=\"selected\"";} ?>>XL</option>
								<option value="2XL"<?php if(strcmp($session->userinfo['shirt_size'],"2XL")==0){echo " selected=\"selected\"";} ?>>2XL</option>
								<option value="3XL"<?php if(strcmp($session->userinfo['shirt_size'],"3XL")==0){echo " selected=\"selected\"";} ?>>3XL</option>
							</select>
							<?php echo $form->error("sel_Tshirt"); ?>
						</li>
						<li>
							<label for="graduation">Graduation Term</label>
							<select id="graduation" name="graduation">
							<?php
							$query=mysql_query("SELECT * FROM graduation_term as G JOIN term as T ON G.graduation_term = T.term_id WHERE G.username = '".$req_user."'");
							while($row=mysql_fetch_array($query)){
							echo "<option value='".$row['term_id']."'>".$row['term']."</option>";
							}
							$query=mysql_query("SELECT * FROM term");
							while($row=mysql_fetch_array($query)){
								echo "<option value='".$row['term_id']."'>".$row['term']."</option>";
							}
							?>
							</select>
						</li>
						<!-- Jessie: look into img/profilepics/ for the php files -->
						<li>
							<label for="profile_pic">Profile Picture</label>
							<input type="button" onclick="window.location='http://www.apousc.org/img/profilepics/upload.form.php'" class="Upload" value="Upload"/>
						</li>
						<li>
							<label for="event_reminders">Email Reminders</label>
							<input type="checkbox" id="reminder" name="reminder" value="Remind"<?php
							$reminder = $database->getReminderSettings($session->username);
							if ($reminder['notify'] == 1) {
								echo "checked";
							}
							?>
							>
							<p class="small">Sends you a reminder email one hour before the event starts</p>
						</li>
						<li>
							<label for="google_calendar">Google Calendar</label>
							<input type="checkbox" id="calendar" name="calendar" value="calendar"<?php
							$calendar = $database->getCalendarSettings($session->username);
							if ($calendar['calendar_setting'] == 1) {
								echo "checked";
							}
							?>
							>
							<p class="small">Creates an event on your Google Calendar whenever you sign up on the website</p>
						</li>

					</ol>
				</fieldset>
				<input type="hidden" id="subedit" name="subedit" value="1" />
				<input type="submit" value="Save Updates" />
			</form>
<?php
	}
}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>