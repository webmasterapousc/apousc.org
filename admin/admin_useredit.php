<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Admin User Account Edit";
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
 * Admin has submitted form without errors and user's
 * account has been edited successfully.
 */
if (isset($_SESSION['adminuseredit'])) {
	unset($_SESSION['adminuseredit']);
	echo "\t\t\t<h2>User Account Edit Success</h2>\n";
	echo "\t\t\t<p>Congratulations! The account has been successfully updated.</p>\n";
} else {
	/* If user is not logged in as Admin, display error */
	if (!$session->isAdmin()) {
		echo ("\t\t\t<h2>Restricted Area</h2>\n");
		echo ("\t\t\t<p>Sorry, but you must be logged in as the Administrator in order to view this page.</p>\n");
	} else {
		/* Define username to be edited */
		$req_user = preg_replace('/[^a-zA-Z0-9]/', '', $_GET['user']);
		/* If requested username is not in the database, display error */
		if (!$database->usernameTaken($req_user)) {
			echo ("\t\t\t<h2>Error</h2>\n");
			echo ("\t\t\t<p>Sorry, but the user account that you are attempting to edit does not exist.</p>\n");
		} else {
			$req_user_info = $database->getUserInfo($req_user); // Returns array of requested user's information
?>
			<h2>Admin User Account Edit</h2>
			<h4><?php echo $req_user_info['fname'] . " " . $req_user_info['lname'] . " (" . $req_user . ")"; ?></h4>
			<?php
			if ($form->num_errors > 0) {
				echo "<p>".$form->num_errors." error(s) found</p>";
			}
			?>
			<form action="process.php" method="post">
				<fieldset>
					<legend>Admin-Only-Editable Information</legend>
					<ol>
						<li>
							<label for="sel_Family">Family</label>
							<select name="sel_Family" id="sel_Family">
								<option value="">Select one&hellip;</option>
								<?php
								for ($i=0; $i<count($families); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($req_user_info['family'] == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t<option value=\"$i\"".$selected.">$families[$i]</option>\n");
								}
								?>
							</select>
						</li>
						<li>
							<fieldset>
								<legend>Semester Entered</legend>
								<label for="sel_Semester">Semester
									<select name="sel_Semester" id="sel_Semester">
										<option value="">Select one&hellip;</option>
										<option value="0"<?php if($req_user_info['semester']=="0"){echo " selected=\"selected\"";} ?>>Fall</option>
										<option value="1"<?php if($req_user_info['semester']=="1"){echo " selected=\"selected\"";} ?>>Spring</option>
									</select>
									<?php echo $form->error("sel_Semester"); ?>
								</label>
								<label for="txt_Year">Year
									<input type="text" name="txt_Year" id="txt_Year" maxlength="4" value="<?php echo $req_user_info['year']; ?>" />
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
									// Fill in form with info from the database
									$selected = "";
									if ($req_user_info['position'] == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t<option value=\"$i\"".$selected.">$officers[$i]</option>\n");
								}
								?>
							</select>
						</li>
						<li>
							<label for="sel_Big">Big</label>
							<select name="sel_Big" id="sel_Big">
								<option value="">Unknown</option>
								<?php
								$q = "SELECT * FROM `".TBL_USERS."` WHERE `status` <> ".PLEDGE_MEMBER." AND `username` <> \"admin\" ORDER BY `lname`";
								$retval = $database->query($q);
								$i = 0; // counter
								while ($row = mysql_fetch_array($retval)) {
									// Fill in form with info from the database
									$selected = "";
									if ($req_user_info['big'] == $row[0]) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t<option value=\"$row[0]\"".$selected.">$row[8], $row[7] ($row[0])</option>\n");
									$i++;
								}
								?>
							</select>
						</li>
						<li>
							<label for="txt_USCID">USC ID Number</label>
							<input type="text" name="txt_USCID" id="txt_USCID" maxlength="10" value="<?php 
							if (strcmp($form->value("txt_USCID"),"") == 0) {
								echo $req_user_info['uscid'];
							} else {
								echo $form->value("txt_USCID");
							}
							?>" />
							<?php echo $form->error("txt_USCID"); ?>
						</li>
					</ol>
				</fieldset>
				<fieldset>
					<legend>User-Editable Information</legend>
					<ol>
						<li>
							<label for="txt_Email">Email</label>
							<input type="text" id="txt_Email" name="txt_Email" maxlength="50" value="<?php
							if (strcmp($form->value("txt_Email"),"") == 0) {
								echo $req_user_info['email'];
							} else {
								echo $form->value("txt_Email");
							}
							?>" />
							<?php echo $form->error("txt_Email"); ?>
						</li>
						<li>
							<label for="tel_Phone">Phone Number</label>
							<input type="tel" id="tel_Phone" name="tel_Phone" maxlength="14" value="<?php
							if (strcmp($form->value("tel_Phone"),"") == 0) {
								echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $req_user_info['phone']);
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
								echo $req_user_info['address'];
							} else {
								echo $form->value("txtarea_Address");
							}
							?></textarea>
						</li>
						<li>
							<label for="sel_Tshirt">T-shirt Size</label>
							<select id="sel_Tshirt" name="sel_Tshirt">
								<option value="">Choose one&hellip;</option>
								<option value="XXS"<?php if(strcmp($req_user_info['shirt_size'],"XXS")==0){echo " selected=\"selected\"";} ?>>XXS</option>
								<option value="XS"<?php if(strcmp($req_user_info['shirt_size'],"XS")==0){echo " selected=\"selected\"";} ?>>XS</option>
								<option value="S"<?php if(strcmp($req_user_info['shirt_size'],"S")==0){echo " selected=\"selected\"";} ?>>S</option>
								<option value="M"<?php if(strcmp($req_user_info['shirt_size'],"M")==0){echo " selected=\"selected\"";} ?>>M</option>
								<option value="L"<?php if(strcmp($req_user_info['shirt_size'],"L")==0){echo " selected=\"selected\"";} ?>>L</option>
								<option value="XL"<?php if(strcmp($req_user_info['shirt_size'],"XL")==0){echo " selected=\"selected\"";} ?>>XL</option>
								<option value="2XL"<?php if(strcmp($req_user_info['shirt_size'],"2XL")==0){echo " selected=\"selected\"";} ?>>2XL</option>
								<option value="3XL"<?php if(strcmp($req_user_info['shirt_size'],"3XL")==0){echo " selected=\"selected\"";} ?>>3XL</option>
							</select>
							<?php echo $form->error("sel_Tshirt"); ?>
						</li>
					</ol>
				</fieldset>
				<div>
	                <input type="hidden" id="subadminedit" name="subadminedit" value="1" />
                    <input type="hidden" id="hidden_req_user" name="hidden_req_user" value="<?php echo $req_user; ?>" />
					<input type="submit" value="Edit Account" />
				</div>
			</form>
<?php
		}
	}
}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>