<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Edit Event";
$current_page = "events";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";

		var getObj = function (layername) {
			if (document.getElementById) {
				return document.getElementById(layername);
			}
			else if (document.all) {
				return document.all(layername);
			}
			else {
				alert("Please update to a newer, more secure browser!");
			}
		};

		// Use form checkbox to toggle visibility of conditional form elements
		var toggleConditional = function (trigger, target) {
			var displaySetting = (trigger.checked) ? "block" : "none";
			getObj(target).style.display = displaySetting;
		};

		// Use form dropdown select box to show selected conditional form elements and hide all others
		var selectConditional = function (trigger) {
			var i;
			for (i = 0; i < getObj(trigger).options.length; i++) {
				if (getObj(trigger).options[i].value !== "") {
					if (getObj(getObj(trigger).options[i].value)) {
						if (getObj(trigger).options[i].selected) {
							getObj(getObj(trigger).options[i].value).style.display = "block";
						} else {
							getObj(getObj(trigger).options[i].value).style.display = "none";
						}
					}
				}
			}
		};
	//--><!]]>
	</script>
<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
<?php
$req_event = preg_replace('/\D/', '', $_GET['eventid']);

if (!$session->isAdmin() && !$session->isOfficer()) {
	echo ("\t\t\t<h2>Restricted Area</h2>\n");
	echo ("\t\t\t<p>Sorry, but you must be logged in as an officer or administrator in order to view this page.</p>\n");
} else if (!$database->eventExists($req_event)) {
	echo ("\t\t\t<h2>Error</h2>\n");
	echo ("\t\t\t<p>Sorry, but the event you are trying to edit does not exist.</p>\n");
} else {
	$q = "SELECT * FROM `" . TBL_EVENTS . "` WHERE `ID` = " . $req_event . " LIMIT 1";
	$result = $database->query($q);
	$req_event_info = mysql_fetch_array($result);
?>
			<h2>Edit Event</h2>
			<noscript><p style="font-weight:bold;color:#f00;">JavaScript must be enabled in order to use this form. Sorry for the inconvenience.</p></noscript>
			<?php
			if (isset($_SESSION['editevent'])) {
				unset($_SESSION['editevent']);
				echo ("\t\t\t<p>Event edited successfully!</p>\n");
			} else {
			?>
			<form action="../members/process.php" method="post">
				<fieldset>
					<?php
					if ($form->num_errors > 0) {
						echo ("\t\t\t\t\t<p style=\"font-weight:bold;color:#f00;\">".$form->num_errors." error(s) found</p>\n");
					}
					?>
					<ol>
						<li>
							<label for="txt_Name">Event Name</label>
							<input type="text" id="txt_Name" name="txt_Name" title="Enter the name" size="50" value="<?php echo $req_event_info['name']; ?>" />
							<?php echo $form->error("txt_Name"); ?>
						</li>
						<li>
							<label for="sel_Type">Event Type</label>
							<select id="sel_Type" name="sel_Type" title="Select the Event Type" onchange="selectConditional('sel_Type');">
								<option value="">Please select one&hellip;</option>
								<?php
								for ($i=0; $i<count($eventType)+1; $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ((strcmp($req_event_info['type'],"") !== 0 || strcmp($req_event_info['type'],"") !== 13) && $req_event_info['type'] == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$eventType[$i]."</option>\n");
								}
								?>
							</select>
							<?php echo $form->error("sel_Type"); ?>
						</li>
						<li id="0" class="conditional"<?php if($req_event_info['type'] == "0" || $req_event_info['type'] == "13"){echo " style=\"display:block;\"";} ?>>
							<label for="sel_Hours">Hours</label>
							<select id="sel_Hours" name="sel_Hours" title="Select the number of hours this event is worth">
								<?php
								for ($i=0; $i<=24; $i=$i+0.5) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($req_event_info['hours'] == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$i."</option>\n");
								}
								?>
							</select>
						</li>
						<li>
							<fieldset>
								<legend>Event Start</legend>
								<ol>
									<li>
										<select id="sel_StartMo" name="sel_StartMo" title="Select month">
										<?php
											for ($i=1; $i<=count($monthsOfTheYear); $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("n",strtotime($req_event_info['start'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$monthsOfTheYear[$i]."</option>\n");
											}
										?>
										</select>
										<select id="sel_StartDay" name="sel_StartDay" title="Select day">
											<?php for ($i=1; $i<=31; $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("j",strtotime($req_event_info['start'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
											}
											?>
										</select>
										<select id="sel_StartYear" name="sel_StartYear" title="Select year">
											<?php
											$current = date("Y");
											for ($i=$current; $i<$current+5; $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("Y",strtotime($req_event_info['start'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
											}
											?>
										</select>
										<?php echo $form->error("startDate"); ?>
									</li>
									<li>
										<select id="sel_StartHr" name="sel_StartHr" title="Select hour">
											<?php
											for ($i=1; $i<=12; $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("g",strtotime($req_event_info['start'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												if ($i < 10) {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"0$i\"".$selected.">$i</option>\n");
												} else {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
												}
											}
											?>
										</select>
										:
										<select id="sel_StartMin" name="sel_StartMin" title="Select minute">
											<?php
											for ($i=0; $i<=59; $i=$i+5) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("i",strtotime($req_event_info['start'])) * 1 == $i) {
													$selected = " selected=\"selected\"";
												}
												if ($i < 10) {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"0$i\"".$selected.">0$i</option>\n");
												} else {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
												}
											}
											?>
										</select>
										<select id="sel_StartAmPm" name="sel_StartAmPm" title="Select AM or PM">
											<option value="0"<?php if(date("G",strtotime($req_event_info['start']))<11){echo " selected=\"selected\"";} ?>>AM</option>
											<option value="1"<?php if(date("G",strtotime($req_event_info['start']))>11){echo " selected=\"selected\"";} ?>>PM</option>
										</select>
									</li>
								</ol>
							</fieldset>
						</li>
						<li>
							<fieldset>
								<legend>Event End</legend>
								<ol>
									<li>
										<input type="checkbox" id="chk_end" name="chk_end"<?php $startDate=date("m-d-Y",strtotime($req_event_info['start']));$endDate=date("m-d-Y",strtotime($req_event_info['end']));if(strcmp($startDate,$endDate)!==0){echo " checked=\"checked\"";} ?> onclick="toggleConditional(this, 'endDate');" />
										<label for="chk_end" class="checkboxLabel">Event ends on a different day than it starts on</label>
									</li>
									<li id="endDate" class="conditional"<?php if(strcmp($startDate,$endDate)!==0){echo " style=\"display:block;\"";} ?>>
										<select id="sel_EndMo" name="sel_EndMo" title="Select month">
											<?php
											for ($i=1; $i<=count($monthsOfTheYear); $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("n",strtotime($req_event_info['end'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$monthsOfTheYear[$i]."</option>\n");
											}
											?>
										</select>
										<select id="sel_EndDay" name="sel_EndDay" title="Select day">
											<?php
											for ($i=1; $i<=31; $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("j",strtotime($req_event_info['end'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
											}
											?>
										</select>
										<select id="sel_EndYear" name="sel_EndYear" title="Select year">
											<?php
											$current = date("Y");
											for ($i=$current; $i<$current+5; $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("Y",strtotime($req_event_info['end'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
											}
											?>
										</select>
										<?php echo $form->error("endDate"); ?>
									</li>
									<li>
										<select id="sel_EndHr" name="sel_EndHr" title="Select hour">
											<?php
											for ($i=1; $i<=12; $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("g",strtotime($req_event_info['end'])) == $i) {
													$selected = " selected=\"selected\"";
												}
												if ($i < 10) {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"0$i\"".$selected.">$i</option>\n");
												} else {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
												}
											}
											?>
										</select>
										:
										<select id="sel_EndMin" name="sel_EndMin" title="Select minute">
											<?php
											for ($i=0; $i<=59; $i=$i+5) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if (date("i",strtotime($req_event_info['end'])) * 1 == $i) {
													$selected = " selected=\"selected\"";
												}
												if ($i < 10) {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"0$i\"".$selected.">0$i</option>\n");
												}
												else {
													echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
												}
											}
											?>
										</select>
										<select id="sel_EndAmPm" name="sel_EndAmPm" title="Select AM or PM">
											<option value="0"<?php if(date("G",strtotime($req_event_info['end']))<11){echo " selected=\"selected\"";} ?>>AM</option>
											<option value="1"<?php if(date("G",strtotime($req_event_info['end']))>11){echo " selected=\"selected\"";} ?>>PM</option>
										</select>
										<?php echo $form->error("endTime"); ?>
									</li>
								</ol>
							</fieldset>
						</li>
						<li>
							<input type="checkbox" id="chk_limited" name="chk_limited"<?php if($req_event_info['max']>0){echo " checked=\"checked\"";} ?> onclick="toggleConditional(this, 'limitedSpace');" />
							<label for="chk_limited" class="checkboxLabel">Limited space?</label>
						</li>
						<li id="limitedSpace" class="conditional"<?php if($req_event_info['max']>0){echo " style=\"display:block;\"";} ?>>
							<label for="txt_Spaces">Maximum allowed</label>
							<input type="text" id="txt_Spaces" name="txt_Spaces" size="3" value="<?php echo $req_event_info['max']; ?>" />
							<?php echo $form->error("txt_Spaces"); ?>
						</li>
						<h2>Location</h2>
						<li>
							<input type="checkbox" id="chk_walk" name="chk_walk"<?php if($req_event_info['walk']>0){echo " checked=\"checked\"";} ?> />
							<label for="chk_walk" class="checkboxLabel">On campus or walking distance? (No drivers needed)</label>
						</li>
						<li>
							<label for="txt_Meet_Location">Location where people should meet</label>
							<input type="text" id="txt_Meet_Location" name="txt_Meet_Location" size="50" value="<?php echo $req_event_info['meet']; ?>" />
							<?php echo $form->error("txt_Meet_Location"); ?>
						</li>
						<li>
							<label for="txt_Actual_Location">Name of the location where the event actually takes place</label>
							<input type="text" id="txt_Actual_Location" name="txt_Actual_Location" size="50" value="<?php echo $req_event_info['location']; ?>" />
							<?php echo $form->error("txt_Actual_Location"); ?>
						</li>
						<li>
							<label for="txt_Actual_Address">Mappable address where the event actually takes place</label>
							<input type="text" id="txt_Actual_Address" name="txt_Actual_Address" size="50" value="<?php echo $req_event_info['address']; ?>" />
							<?php echo $form->error("txt_Actual_Address"); ?>
						</li>
						<li>
							<label for="txtarea_eventDesc">Event Description</label>
							<?php echo $form->error("txtarea_eventDesc"); ?>
							<textarea id="txtarea_eventDesc" name="txtarea_eventDesc" cols="60" rows="8"><?php echo $req_event_info['desc']; ?></textarea>
							<p class="small">Formatting tags: <code title="bold">[b][/b]</code>, <code title="italic">[i][/i]</code>, <code title="underline">[u][/u]</code>, <code title="link">[url=http://www.usc.edu][/url]</code>, <code title="bulleted list">[list][item][/item][/list]</code>, and <code title="numbered list">[numbered][/numbered]</code>. No <abbr title="HyperText Markup Language">HTML</abbr> code allowed.</p>
						</li>
						<li>
							<input type="submit" value="Update" />
						</li>
					</ol>
				</fieldset>
				<input type="hidden" id="eventid" name="eventid" value="<?php echo $req_event; ?>" />
				<input type="hidden" id="subeditevent" name="subeditevent" value="1" />
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