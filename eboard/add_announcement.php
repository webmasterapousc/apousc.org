<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Add Announcements";
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
<?php if (!$session->isOfficer()) {
	echo ("\t\t\t<h2>Restricted Area</h2>\n");
	echo ("\t\t\t<p>Sorry, but you must be signed-in as an officer in order to view this page.</p>\n");
} else {
?>
			<h2>Add an Announcement</h2>
			<?php
			if (isset($_SESSION['addannouncement'])) {
				unset($_SESSION['addannouncement']);
				echo ("\t\t\t<p>Announcement added successfully!</p>\n");
			} else {
			?>
			<form action="process.php" method="post">
				<fieldset>
					<legend>Add Announcement</legend>
					<?php
					if ($form->num_errors > 0) {
						echo ("\t\t\t\t\t<p style=\"font-weight:bold;color:#f00;\">".$form->num_errors." error(s) found</p>\n");
					}
					?>
					<ol>
						<li>
							<label for="txt_Title">Title</label>
							<input type="text" id="txt_Title" name="txt_Title" size="60" value="<?php echo $form->value("txt_Title"); ?>" />
							<?php echo $form->error("txt_Title"); ?>
						</li>
						<li>
							<label for="txtarea_Body">Body</label>
							<textarea id="txtarea_Body" name="txtarea_Body" cols="45" rows="6"><?php echo $form->value("txtarea_Body"); ?></textarea>
							<span class="small">Formatting tags: <code title="bold">[b][/b]</code>, <code title="italic">[i][/i]</code>, <code title="underline">[u][/u]</code>, <code title="link">[url=http://www.usc.edu][/url]</code>, <code title="bulleted list">[list][item][/item][/list]</code>, and <code title="numbered list">[numbered][item][/item][/numbered]</code>. No <abbr title="HyperText Markup Language">HTML</abbr> code allowed.</span>
							<?php echo $form->error("txtarea_Body"); ?>
						</li>
					</ol>
					<input type="hidden" id="subaddannouncement" name="subaddannouncement" value="1" />
				</fieldset>
				<input type="submit" value="Submit" />
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
