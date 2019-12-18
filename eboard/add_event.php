<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Add Event";
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
		/*var selectConditional = function (trigger) {
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
		};*/
		// the working version... changes the style.display of hour select
		// Works by checking to see if either service (option[1]) or ICservice (14) is selected
		var selectConditional = function (trigger) {
			var i;
			let selectType = getObj(trigger);
			if (selectType.options[1].selected || selectType.options[14].selected) {
				getObj("0").style.display = "block";
			} else {
				getObj("0").style.display = "none";
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
if (!$session->isAdmin() && !$session->isOfficer()) {
	echo ("\t\t\t<h2>Restricted Area</h2>\n");
	echo ("\t\t\t<p>Sorry, but you must be logged in as an officer or administrator in order to view this page.</p>\n");
} else {
?>
			<h2>Add an Event</h2>
			<noscript><p style="font-weight:bold;color:#f00;">JavaScript must be enabled in order to use this form. Sorry for the inconvenience.</p></noscript>
			<?php
			if (isset($_SESSION['addevent'])) {
				unset($_SESSION['addevent']);
				echo ("\t\t\t<p>Event added successfully!</p>\n");
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
							<input type="text" id="txt_Name" name="txt_Name" title="Enter the name" size="50" value="<?php echo $form->value("txt_Name"); ?>" />
							<?php echo $form->error("txt_Name"); ?>
						</li>
						<li>
							<label for="sel_Type">Event Type</label>
							<select id="sel_Type" name="sel_Type" title="Select the Event Type" onchange ="selectConditional('sel_Type');">
								<option value="">Please select one&hellip;</option>
								<?php
								for ($i=0; $i<count($eventType); $i++) {

									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if (strcmp($form->value("sel_Type"),"") !== 0 && $form->value("sel_Type") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$eventType[$i]."</option>\n");
								}
								?>
							</select>
							<?php echo $form->error("sel_Type"); ?>
						</li>
						<li id="0" class="conditional">
							<label for="sel_Hours">Hours</label>
							<select id="sel_Hours" name="sel_Hours" title="Select the number of hours this event is worth">
								<?php
									for ($i=0; $i<=24; $i=$i+0.5) { 
										$selected = "";
										// If page isset(var) reloaded with errors, remember which option was selected
										if ($form->value("sel_Hours") == $i) {
											$selected = " selected=\"selected\"";
										}
										echo ("\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$i."</option>\n");
									}
								?>
							</select>
						</li>
						<li>
						<!--<li id="13" class="conditional"<?php if($form->value("sel_Type")=="13"){echo " style=\"display:block;\"";} ?>>
							<label for="sel_Hours">Hours</label>
							<select id="sel_Hours" name="sel_Hours" title="Select the number of hours this event is worth">
								<?php
								for ($i=0; $i<=24; $i=$i+0.5) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_Hours") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$i."</option>\n");
								}
								?>
							</select>
						</li>-->
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
												if ($form->value("sel_StartMo") == $i) {
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
												if ($form->value("sel_StartDay") == $i) {
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
												if ($form->value("sel_StartYear") == $i) {
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
												if ($form->value("sel_StartHr") == $i) {
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
												if ($form->value("sel_StartMin") == $i) {
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
											<option value="0"<?php if($form->value("sel_StartAmPm")==0){echo " selected=\"selected\"";} ?>>AM</option>
											<option value="1"<?php if($form->value("sel_StartAmPm")==1){echo " selected=\"selected\"";} ?>>PM</option>
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
										<input type="checkbox" id="chk_end" name="chk_end"<?php if($form->value("chk_end")=="on"){echo " checked=\"checked\"";} ?> onclick="toggleConditional(this, 'endDate');" />
										<label for="chk_end" class="checkboxLabel">Event ends on a different day than it starts on</label>
									</li>
									<li id="endDate" class="conditional"<?php if($form->value("chk_end")=="on"){echo " style=\"display:block;\"";} ?>>
										<select id="sel_EndMo" name="sel_EndMo" title="Select month">
											<?php
											for ($i=1; $i<=count($monthsOfTheYear); $i++) {
												// If page is reloaded with errors, remember which option was selected
												$selected = "";
												if ($form->value("sel_EndMo") == $i) {
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
												if ($form->value("sel_EndDay") == $i) {
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
												if ($form->value("sel_EndYear") == $i) {
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
												if ($form->value("sel_EndHr") == $i) {
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
												if ($form->value("sel_EndMin") == $i) {
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
											<option value="0"<?php if($form->value("sel_EndAmPm")==0){echo " selected=\"selected\"";} ?>>AM</option>
											<option value="1"<?php if($form->value("sel_EndAmPm")==1){echo " selected=\"selected\"";} ?>>PM</option>
										</select>
										<?php echo $form->error("endTime"); ?>
									</li>
								</ol>
							</fieldset>
						</li>
						<li>
							<input type="checkbox" id="chk_limited" name="chk_limited"<?php if($form->value("chk_limited")=="on"){echo " checked=\"checked\"";} ?> onclick="toggleConditional(this, 'limitedSpace');" />
							<label for="chk_limited" class="checkboxLabel">Limited space?</label>
						</li>
						<li id="limitedSpace" class="conditional"<?php if($form->value("chk_limited")=="on"){echo " style=\"display:block;\"";} ?>>
							<label for="txt_Spaces">Maximum allowed</label>
							<input type="text" id="txt_Spaces" name="txt_Spaces" size="3" value="<?php echo $form->value("txt_Spaces"); ?>" />
							<?php echo $form->error("txt_Spaces"); ?>
						</li>
						
						
						
						<li>
							<input type="checkbox" id="chk_repeat" name="chk_repeat"<?php if($form->value("chk_repeat")=="on"){echo " checked=\"checked\"";} ?> onclick="toggleConditional(this, 'repeatTimes');" />
							<label for="chk_repeat" class="checkboxLabel">Repeat?</label>
						</li>
						
						<li id="repeatTimes" class="conditional"<?php if($form->value("chk_repeat")=="on"){echo " style=\"display:block;\"";} ?>>
							If you don't need this many repeats, put 32 for the day starting from repeat 4 and going backwards.
							<label for="sel_StartMo2">1st Repeat Date:</label>
							<select id="sel_StartMo2" name="sel_StartMo2" title="Select month">
								<?php
								for ($i=1; $i<=count($monthsOfTheYear); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartMo2") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$monthsOfTheYear[$i]."</option>\n");
								}
								?>
							</select>
							<select id="sel_StartDay2" name="sel_StartDay2" title="Select day">
								<?php
								for ($i=1; $i<=32; $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartDay2") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
								}
								?>
							</select>
							<?php echo $form->error("endDate"); ?>
							
							<label for="sel_StartMo3">2nd Repeat Date:</label>
							<select id="sel_StartMo3" name="sel_StartMo3" title="Select month">
								<?php
								for ($i=1; $i<=count($monthsOfTheYear); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartMo3") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$monthsOfTheYear[$i]."</option>\n");
								}
								?>
							</select>
							<select id="sel_StartDay3" name="sel_StartDay3" title="Select day">
								<?php
								for ($i=1; $i<=32; $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartDay3") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
								}
								?>
							</select>
							<?php echo $form->error("endDate"); ?>
							
							<label for="sel_StartMo4">3rd Repeat Date:</label>
							<select id="sel_StartMo4" name="sel_StartMo4" title="Select month">
								<?php
								for ($i=1; $i<=count($monthsOfTheYear); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartMo4") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$monthsOfTheYear[$i]."</option>\n");
								}
								?>
							</select>
							<select id="sel_StartDay4" name="sel_StartDay4" title="Select day">
								<?php
								for ($i=1; $i<=32; $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartDay4") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
								}
								?>
							</select>
							<?php echo $form->error("endDate"); ?>
							
							<label for="sel_StartMo5">4th Repeat Date:</label>
							<select id="sel_StartMo5" name="sel_StartMo5" title="Select month">
								<?php
								for ($i=1; $i<=count($monthsOfTheYear); $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartMo5") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">".$monthsOfTheYear[$i]."</option>\n");
								}
								?>
							</select>
							<select id="sel_StartDay5" name="sel_StartDay5" title="Select day">
								<?php
								for ($i=1; $i<=32; $i++) {
									// If page is reloaded with errors, remember which option was selected
									$selected = "";
									if ($form->value("sel_StartDay5") == $i) {
										$selected = " selected=\"selected\"";
									}
									echo ("\t\t\t\t\t\t\t\t\t\t\t<option value=\"$i\"".$selected.">$i</option>\n");
								}
								?>
							</select>
							<?php echo $form->error("endDate"); ?>
						</li>
						
						
						<h2>Location</h2>
						<li>
							<input type="checkbox" id="chk_walk" name="chk_walk"<?php if($form->value("chk_walk")=="on"){echo " checked=\"checked\"";} ?> />
							<label for="chk_walk" class="checkboxLabel">On campus or walking distance? (No drivers needed)</label>
						</li>
						<li>
							<label for="txt_Meet_Location">Location where people should meet</label>
							<input type="text" id="txt_Meet_Location" name="txt_Meet_Location" size="50" value="BL" />
							<?php echo $form->error("txt_Meet_Location"); ?>
						</li>
						<li>
							<label for="txt_Meet_Location">Name of the location where the event actually takes place</label>
							<input type="text" id="txt_Actual_Location" name="txt_Actual_Location" size="50" value="<?php echo $form->value("txt_Actual_Location"); ?>" />
							<?php echo $form->error("txt_Actual_Location"); ?>
						</li>
						<li>
							<label for="txt_Actual_Address">Mappable address where the event actually takes place</label>
							<input type="text" id="txt_Actual_Address" name="txt_Actual_Address" size="50" value="<?php echo $form->value("txt_Actual_Address"); ?>" />
							<?php echo $form->error("txt_Actual_Address"); ?>
						</li>
						<li>
							<label for="txtarea_eventDesc">Event Description</label>
							<?php echo $form->error("txtarea_eventDesc"); ?>
							<textarea id="txtarea_eventDesc" name="txtarea_eventDesc" cols="60" rows="8"><?php echo $form->value("txtarea_eventDesc"); ?></textarea>
							<p class="small">Formatting tags: <code title="bold">[b][/b]</code>, <code title="italic">[i][/i]</code>, <code title="underline">[u][/u]</code>, <code title="link">[url=http://www.usc.edu][/url]</code>, <code title="bulleted list">[list][item][/item][/list]</code>, and <code title="numbered list">[numbered][item][/item][/numbered]</code>. No <abbr title="HyperText Markup Language">HTML</abbr> code allowed.</p>
						</li>

						<li>
							<input type="submit" value="Submit" />
						</li>
					</ol>
					<input type="hidden" id="subaddevent" name="subaddevent" value="1" />
				</fieldset>
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
