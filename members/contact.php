<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Contact Us";
$current_page = "contact";

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
			<h2>Contact Us</h2>
			<?php
			if (isset($_SESSION['submitcontact'])) {
				unset($_SESSION['submitcontact']);
				echo ("\t\t\t<p><strong>Message sent successfully!</strong></p>\n");
			}
			?>
			<img src="img/contact1.jpg" height="150" width="183" alt="Alpha Phi Omega" class="floatright" />
			<p>We'd love to hear from you! Please use the form below to let us know about any questions, comments, or concerns you may have with Alpha Phi Omega &ndash; Alpha Kappa Chapter.</p>
			<p>If you would prefer to contact a member of our executive committee directly, please see our <a href="main/members">list of officers</a>.</p>
			<form action="process.php" method="post" class="clear">
				<fieldset>
					<?php if(strlen($form->error("akismet")) > 1){echo "<p>".$form->error("akismet")."</p>";} ?>
					<legend>Send Us A Message</legend>
					<ol>
						<li>
							<label for="txt_Name">Name*</label>
							<input type="text" id="txt_Name" name="txt_Name" maxlength="30" value="<?php echo $form->value("txt_Name"); ?>" />
							<?php echo $form->error("txt_Name"); ?>
						</li>
						<li>
							<label for="txt_Email">E-mail*</label>
							<input type="text" id="txt_Email" name="txt_Email" maxlength="30" value="<?php echo $form->value("txt_Email"); ?>" />
							<?php echo $form->error("txt_Email") ?>
						</li>
						<li>
							<label for="tel_Phone">Phone</label>
							<input type="tel" id="tel_Phone" name="tel_Phone" maxlength="17" value="<?php echo $form->value("tel_Phone") ?>" />
							<?php echo $form->error("tel_Phone"); ?>
						</li>
						<li>
							<label for="sel_Subject">Subject</label>
							<select id="sel_Subject" name="sel_Subject">
								<option value="">Choose one&hellip;</option>
								<option value="q"<?php if(strcmp($form->value("sel_Subject"),"q") === 0){echo " selected=\"selected\"";} ?>>Quick Question</option>
								<option value="c"<?php if(strcmp($form->value("sel_Subject"),"c") === 0){echo " selected=\"selected\"";} ?>>Quick Comment</option>
								<option value="p"<?php if(strcmp($form->value("sel_Subject"),"p") === 0){echo " selected=\"selected\"";} ?>>Report Problem with Site</option>
								<option value="o"<?php if(strcmp($form->value("sel_Subject"),"o") === 0){echo " selected=\"selected\"";} ?>>Other</option>
							</select>
						</li>
						<li>
							<label for="txtarea_Message">Message*</label><?php echo $form->error("txtarea_Message"); ?>
							<textarea id="txtarea_Message" name="txtarea_Message" cols="55" rows="8"><?php echo $form->value("txtarea_Message"); ?></textarea>
						</li>
					</ol>
					<p class="small">*Fields marked with an asterisk are required</p>
					<input type="hidden" id="subcontactus" name="subcontactus" value="1" />
				</fieldset>
				<input type="submit" value="Submit" />
			</form>
	<h3>Write to Us</h3>
		<p>Alpha Phi Omega&mdash;Alpha Kappa</br />
		<a href="http://sait.usc.edu/ca/" rel="external">Office of Campus Activities</a>, <a href="http://www.usc.edu/" rel="external">University of Southern California</a><br />
		Ronald Tutor Campus Center 330<br />
		Los Angeles, <abbr title="California">CA</abbr> 90089</p>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>