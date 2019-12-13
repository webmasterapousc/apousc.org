<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Add Picture of the Week";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<script type="text/javascript" src="js/date.js"></script>
	<script type="text/javascript" src="js/jquery.datePicker.js"></script>
	<style type="text/css">
	<!--
		table.jCalendar{background:#aaa;border:1px solid #000;border-collapse:separate;border-spacing:2px}
		table.jCalendar th{background:#333;color:#fff;font-weight:700;padding:3px 5px}
		table.jCalendar td{background:#ccc;color:#000;padding:3px 5px;text-align:center}
		table.jCalendar td.other-month{background:#ddd;color:#aaa}
		table.jCalendar td.today{background:#666;color:#fff}
		table.jCalendar td.selected.dp-hover{background:#f33;color:#fff}
		table.jCalendar td.dp-hover,table.jCalendar tr.activeWeekHover td{background:#fff;color:#000}
		div.dp-popup{background:#ccc;font-family:arial, sans-serif;font-size:10px;line-height:1.2em;padding:2px;position:relative;width:171px}
		div#dp-popup{position:absolute;z-index:199}
		div.dp-popup h2{font-size:12px;margin:2px 0;padding:0;text-align:center}
		a#dp-close{display:block;font-size:11px;padding:4px 0;text-align:center}
		a#dp-close:hover{text-decoration:underline}
		div.dp-popup a{color:#000;padding:3px 2px 0;text-decoration:none}
		div.dp-popup div.dp-nav-prev{left:4px;position:absolute;top:2px;width:100px}
		div.dp-popup div.dp-nav-prev a{float:left}
		div.dp-popup div.dp-nav-next{position:absolute;right:4px;top:2px;width:100px}
		div.dp-popup div.dp-nav-next a{float:right}
		div.dp-popup a.disabled{color:#aaa;cursor:default}
		#calendar-me{margin:20px}
		table.jCalendar td.selected,table.jCalendar tr.selectedWeek td{background:#f66;color:#fff}
		table.jCalendar td.disabled,table.jCalendar td.disabled.dp-hover,table.jCalendar td.unselectable,table.jCalendar td.unselectable:hover,table.jCalendar td.unselectable.dp-hover{background:#bbb;color:#888}
		div.dp-popup div.dp-nav-prev a,div.dp-popup div.dp-nav-next a,div.dp-popup td{cursor:pointer}
		div.dp-popup div.dp-nav-prev a.disabled,div.dp-popup div.dp-nav-next a.disabled,div.dp-popup td.disabled{cursor:default}
		a.dp-choose-date{background:url("img/calendar.png") no-repeat;display:inline-block;height:16px;margin:5px 3px 0;overflow:hidden;padding:0;width:16px;text-indent:-9999px}
		a.dp-choose-date.dp-disabled{background-position:0 -20px;cursor:default}
		input[type=text]{width:250px}
		input.dp-applied{width:230px}
	-->
	</style>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		Date.format = 'mm/dd/yyyy';
		$(function () {
			$('.date-pick').datePicker({selectWeek:true,closeOnSelect:true,clickInput:true,startDate:'<?php echo date("m/d/Y",strtotime("1 month ago")); ?>'});
		});
	//--><!]]>
	</script>
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
			<h2>Add Picture of the Week</h2>
			<?php
			if (isset($_SESSION['addpotw'])) {
				unset($_SESSION['addpotw']);
				echo ("\t\t\t<p>Picture added successfully!</p>\n");
			} else {
				// set a max file size for the html upload form
				$max_file_size = 30000; // size in bytes 
			?>
			<p class="contentBox">Note: This upload form doesn't work yet!</p>
			<form action="process.php" enctype="multipart/form-data" method="post">
				<fieldset>
					<legend>Add Picture</legend>
					<?php
					if ($form->num_errors > 0) {
						echo ("\t\t\t\t\t<p style=\"font-weight:bold;color:#f00;\">".$form->num_errors." error(s) found</p>\n");
					}
					echo $form->error("error_Type");
					?>
					<ol>
						<li>
							<label for="txt_Week">Week of</label>
							<input type="text" id="txt_Week" name="txt_Week" class="date-pick" value="<?php echo $form->value("txt_Week"); ?>" />
							<?php echo $form->error("txt_Week"); ?>
						</li>
						<li>
							<label for="txt_Title">Photo Title</label>
							<input type="text" id="txt_Title" name="txt_Title" value="<?php echo $form->value("txt_Title"); ?>" />
							<?php echo $form->error("txt_Title"); ?>
						</li>
						<li>
							<label for="txt_Caption">Photo Caption</label>
							<input type="text" id="txt_Caption" name="txt_Caption" style="width:100%" value="<?php echo $form->value("txt_Caption"); ?>" />
							<?php echo $form->error("txt_Caption"); ?>
						</li>
						<li>
							<label for="txt_SubmittedBy">Submitted by</label>
							<input type="text" id="txt_SubmittedBy" name="txt_SubmittedBy" value="<?php echo $form->value("txt_SubmittedBy"); ?>" />
							<?php echo $form->error("txt_SubmittedBy"); ?>
						</li>
						<li>
							<label for="file_POTW">Select Photo</label>
							<input type="file" id="file_POTW" name="file_POTW" value="<?php echo $form->value("file_POTW"); ?>" />
							<?php echo $form->error("file_POTW"); ?>
						</li>
					</ol>
					<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>" />
					<input type="hidden" id="subaddpotw" name="subaddpotw" value="1" />
				</fieldset>
				<input type="submit" id="submit_POTW" name="submit_POTW" value="Submit" />
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