<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Register New User";
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
	 * User not an administrator, redirect to main page
	 * automatically.
	 */
   
	if (!$session->isAdmin()) {
		echo "<h2>Sorry</h2>\n";
		echo "<p>You must be logged in as an Administrator in order to register new users.</p>\n";
    
	}
	else {
		/**
		 * The user has submitted the registration form and the
		 * results have been processed.
		 */
		if (isset($_SESSION['regsuccess'])) {
			/* Registration was successful */
			if ($_SESSION['regsuccess']) {
				echo "<h2>Registered!</h2>\n";
				echo "<p>Thank you. User <strong>".$_SESSION['reguname']."'s</strong> information has been added to the database.</p>\n";
			}
			/* Registration failed */
			else {
				echo "<h2>Registration Failed</h2>\n";
				echo "<p>We're sorry, but an error has occurred and your registration for the username <strong>".$_SESSION['reguname']."</strong> could not be completed. Please try again at a later time.</p>\n";
			}
			unset($_SESSION['regsuccess']);
			unset($_SESSION['reguname']);
		}
		/**
		 * The user has not filled out the registration form yet.
		 * Below is the page with the sign-up form, the names
		 * of the input fields are important and should not
		 * be changed.
		 */
		else {
?>
			<h2>Add Member</h2>
			<?php
			if ($form->num_errors > 0) {
				echo "<span style=\"color:#f00\">".$form->num_errors." error(s) found</span>";
			}
			?>
			<form action="../members/process.php" method="post">
				<fieldset>
					<legend>Register New User</legend>
					<ol>
						<li>
							<label for="txt_User">Username</label>
							<input type="text" name="txt_User" id="txt_User" maxlength="30" value="<?php echo $form->value("txt_User"); ?>" />
							<span>@usc.edu</span> <?php echo $form->error("txt_User"); ?>
						</li>
						<li>
							<label for="sel_Status">Status</label>
							<select name="sel_Status" id="sel_Status">
								<option value="">Select one&hellip;</option>
								<?php
								for ($i=0; $i<count($memberStatus); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_Status") != "" && $form->value("sel_Status") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$memberStatus[$i]</option>\n");
								}
								?>
							</select>
							<?php echo $form->error("sel_Status"); ?>
						</li>
						<li>
							<label for="txt_Email">E-mail</label>
							<input type="text" name="txt_Email" id="txt_Email" maxlength="50" value="<?php echo $form->value("txt_Email"); ?>" />
							<?php echo $form->error("txt_Email"); ?>
						</li>
						<li>
							<label for="txt_Fname">First Name</label>
							<input type="text" name="txt_Fname" id="txt_Fname" maxlength="20" value="<?php echo $form->value("txt_Fname"); ?>" />
							<?php echo $form->error("txt_Fname"); ?>
						</li>
						<li>
							<label for="txt_Lname">Last Name</label>
							<input type="text" name="txt_Lname" id="txt_Lname" maxlength="30" value="<?php echo $form->value("txt_Lname"); ?>" />
							<?php echo $form->error("txt_Lname"); ?>
						</li>
						<li>
							<!--<label for="sel_Family">Family</label>
							<select name="sel_Family" id="sel_Family">
								<option value="">Select one&hellip;</option>
								<?php
								for ($i=0; $i<count($families); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_Family") != "" && $form->value("sel_Family") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t<option value=\"$i\"".$selected.">$families[$i]</option>\n");
								}
								?>
							</select>   -->
						</li>
						<li>
							<fieldset>
								<legend>Semester Entered</legend>
								<label for="sel_Semester">Semester
									<select name="sel_Semester" id="sel_Semester">
										<option value="">Select one&hellip;</option>
										<option value="0"<?php if($form->value("sel_Semester")=="0"){echo " selected=\"selected\"";} ?>>Fall</option>
										<option value="1"<?php if($form->value("sel_Semester")=="1"){echo " selected=\"selected\"";} ?>>Spring</option>
									</select>
									<?php echo $form->error("sel_Semester"); ?>
								</label>
								<label for="txt_Year">Year
									<input type="text" name="txt_Year" id="txt_Year" maxlength="4" value="<?php echo $form->value("txt_Year"); ?>" />
									<?php echo $form->error("txt_Year"); ?>
								</label>
							</fieldset>
						</li>
						<li>
							<label for="sel_Position">Position</label>
							<select name="sel_Position" id="sel_Position">
								<option value="0">None</option>
								<?php
								for ($i=1; $i<=count($officers); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_Position") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t<option value=\"$i\"".$selected.">$officers[$i]</option>\n");
								}
								?>
							</select>
						</li>
						<li>
							<!-- <label for="sel_Big">Big</label> 
							<select name="sel_Big" id="sel_Big">
								<option value="">Unknown</option>
								<?php
								$q = "SELECT * FROM `".TBL_USERS."` WHERE `status` <> ".PLEDGE_MEMBER." AND `username` <> \"admin\" ORDER BY `lname`";
								$retval = $database->query($q);
								$i = 0; // counter
								while ($row = mysql_fetch_array($retval)) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_Big") == $row[0]) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t<option value=\"$row[0]\"".$selected.">$row[8], $row[7] ($row[0])</option>\n");
									$i++;
								}
								?>
							</select> -->
						</li>
						<li>
							<label for="tel_Phone">Phone Number</label>
							<input type="tel" name="tel_Phone" id="tel_Phone" maxlength="14" value="<?php echo $form->value("tel_Phone"); ?>" />
							<?php echo $form->error("tel_Phone"); ?>
						</li>
						<li>
							<label for="txt_USCID">USC ID Number</label>
							<input type="text" name="txt_USCID" id="txt_USCID" maxlength="10" value="<?php echo $form->value("txt_USCID"); ?>"  />
							<?php echo $form->error("txt_USCID"); ?>
						</li>
						<li>
							<label for="txtarea_Address">Address</label>
							<textarea id="txtarea_Address" name="txtarea_Address" cols="40" rows="4"><?php echo $form->value("txtarea_Address"); ?></textarea>
							<?php echo $form->error("txtarea_Address"); ?>
						</li>
						<li>
							<label for="sel_Shirt">T-Shirt Size</label>
							<select name="sel_Shirt" id="sel_Shirt">
								<option value="">Select one&hellip;</option>
								<option value="XXS"<?php if($form->value("sel_Shirt")=="XXS"){echo " selected=\"selected\"";} ?>>XXS</option>
								<option value="XS"<?php if($form->value("sel_Shirt")=="XS"){echo " selected=\"selected\"";} ?>>XS</option>
								<option value="S"<?php if($form->value("sel_Shirt")=="S"){echo " selected=\"selected\"";} ?>>S</option>
								<option value="M"<?php if($form->value("sel_Shirt")=="M"){echo " selected=\"selected\"";} ?>>M</option>
								<option value="L"<?php if($form->value("sel_Shirt")=="L"){echo " selected=\"selected\"";} ?>>L</option>
								<option value="XL"<?php if($form->value("sel_Shirt")=="XL"){echo " selected=\"selected\"";} ?>>XL</option>
								<option value="2XL"<?php if($form->value("sel_Shirt")=="2XL"){echo " selected=\"selected\"";} ?>>2XL</option>
								<option value="3XL"<?php if($form->value("sel_Shirt")=="3XL"){echo " selected=\"selected\"";} ?>>3XL</option>
							</select>
						</li>
					</ol>
				</fieldset>
				<input type="hidden" name="subjoin" value="1" />
				<input type="submit" value="Register!" />
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