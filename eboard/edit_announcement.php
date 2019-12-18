<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Edit Announcement";
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
$req_announcement = preg_replace('/\D/', '', $_GET['id']);
$q = "SELECT * FROM `" . TBL_ANNOUNCEMENTS . "` WHERE `ID` = " . $req_announcement . " LIMIT 1";
$result = $database->query($q);
$req_announcement_info = mysql_fetch_array($result);

if (!$session->isOfficer()) {
	echo ("\t\t\t<h2>Restricted Area</h2>\n");
	echo ("\t\t\t<p>Sorry, but you must be signed-in as an officer or administrator in order to view this page.</p>\n");
} else if (mysql_num_rows($result) < 1) {
	echo ("\t\t\t<h2>Error</h2>\n");
	echo ("\t\t\t<p>Sorry, but the announcement you are trying to edit does not exist.</p>\n");
} else {
?>
			<h2>Edit an Announcement</h2>
			<?php
			if (isset($_SESSION['editannouncement'])) {
				unset($_SESSION['editannouncement']);
				echo ("\t\t\t<p>Announcement edited successfully!</p>\n");
			}
			?>
			<form action="../members/process.php" method="post">
				<fieldset>
					<legend>Edit Announcement</legend>
					<?php
					if ($form->num_errors > 0) {
						echo ("\t\t\t\t\t<p style=\"font-weight:bold;color:#f00;\">".$form->num_errors." error(s) found</p>\n");
					}
					?>
					<ol>
						<li>
							<label for="txt_Title">Title</label>
							<input type="text" id="txt_Title" name="txt_Title" size="60" value="<?php 
							if ($form->num_errors > 0) {
								echo $form->value("txt_Title");
							} else {
								echo $req_announcement_info['title'];
							}
							?>" />
							<?php echo $form->error("txt_Title"); ?>
						</li>
						<li>
							<label for="txtarea_Body">Body</label><?php echo $form->error("txtarea_Body"); ?>
							<textarea id="txtarea_Body" name="txtarea_Body" cols="45" rows="6"><?php 
							if ($form->num_errors > 0) {
								echo $form->value("txtarea_Body");
							} else {
								echo $req_announcement_info['body'];
							}
							?></textarea>
							<span class="small">Formatting tags: <code title="bold">[b][/b]</code>, <code title="italic">[i][/i]</code>, <code title="underline">[u][/u]</code>, <code title="link">[url=http://www.usc.edu][/url]</code>, <code title="bulleted list">[list][item][/item][/list]</code>, and <code title="numbered list">[numbered][item][/item][/numbered]</code>. No <abbr title="HyperText Markup Language">HTML</abbr> code allowed.</span>
						</li>
					</ol>
					<input type="hidden" id="announcementid" name="announcementid" value="<?php echo $req_announcement; ?>" />
					<input type="hidden" id="subeditannouncement" name="subeditannouncement" value="1" />
				</fieldset>
				<input type="submit" value="Submit" />
			</form>
<?php
}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>