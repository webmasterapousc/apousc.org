<?php
// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title   = "Nominations";
$current_page = "home";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";

		// Place all JS to be run on page load in this function
		$(document).ready(function () {
			makeRound(".contentBox", "10", "10", "10", "10");
		});
	//--><!]]>
	</script>
	<style type="text/css" media="screen">
	<!--
		table.pretty tr.thead{border:1px solid #333}
		table.pretty tr.thead a,#mainContent tr.thead a:hover{color:#fff;font-weight:400}
		table.pretty tr.thead td{color:#fff;background-color:#808080;font-size:1.2em;font-weight:400;padding:1em;text-align:left}
		.declined{text-decoration:line-through}
	-->
	</style>
<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
			<?php
			if (!$session->logged_in) {
				echo ("\t\t\t<h2>Restricted Area</h2>\n");
				echo ("\t\t\t<p>Sorry, but you must be logged-in in order to view this page.</p>\n");
			} else {
				echo ("<h2>Nominations</h2>\n");
				if (isset($_SESSION['addnomination'])) {
					unset($_SESSION['addnomination']);
					echo ("\t\t\t<p>Nomination added successfully!</p>\n");
				}
				$positionz[0] = "President";
				$positionz[1] = "New Member Educator";
				$positionz[2] = "VP of Service";
				$positionz[3] = "VP of Membership";
				$positionz[4] = "VP of Fellowship";
				$positionz[5] = "VP of Finance";
				$positionz[6] = "VP of Communications";
				$positionz[7] = "Interchapter Chair";
				$positionz[8] = "Diversity and Inclusion Chair";
			?>
			<div class="contentBox">
				<p>Please review the <a href="https://drive.google.com/file/d/1boIJrEb5CTK81SMorV8RGWvcFKMkJ59g/view?usp=sharing">Officer Descriptions</a>, 
					<a href="https://drive.google.com/open?id=13ebg2IfQ2B013lQxT5ZO1FjwKA4g-4k9">Bylaws</a>, and <a href="https://drive.google.com/open?id=1b-4t8zc7_i8f9V_H0hqRt6zFd956RbDu">Officer Election Policy</a> 
					for procedures regarding elections and for a list of each position's responsibilities. If you wish to decline your nomination, please click "[Decline]" next to your name, or email <a href="mailto:webmaster.apousc@gmail.com">webmaster.apousc@gmail.com</a> 
					so that the website administrator may decline on your behalf. <br/><br/><strong>If you are accepting your nominations, please be sure to submit the <a href="https://docs.google.com/document/d/1uVfEY7P9IcKabiNCmc2bUr9hYiZR50SeSFyR710v2xk/edit">E-Board Application</a> by 11:59 PM on Monday, April 19. 
					</strong></br></br><strong>If you would like to apply for an appointed position, please submit your <a href="https://docs.google.com/document/d/1TP5goDQeJ1hpN6Z9H2wlY6DAevSg_3r2_hMZnui6f6k/edit">A-Board Application </a> 
						by 11:59 PM on Monday, April 26.</strong></p> 
				
			</div>
			<form action="process.php" method="post">
				<fieldset>
					<legend>Nominate a Member</legend>
					<ol>
						<?php
						if ($form->num_errors > 0) {
							echo "<li>".$form->num_errors." error(s) found</li>\n";
						}
						?>
						<li>
							<label for="sel_Member">Member</label>
							<select name="sel_Member" id="sel_Member">
							<?php
							$q      = "SELECT * FROM `" . TBL_USERS . "` WHERE (`status` = 1 OR `status` = 0 OR `status` = 2 OR `status` = 7) AND `username` <> \"admin\" ORDER BY `lname`";
							$retval = $database->query($q);
							while ($row = mysql_fetch_array($retval)) {
								echo ("\t\t\t\t\t\t\t\t<option value=\"".$row['username']."\"$selected>".$row['lname'].", ".$row['fname']." (".$row['username'].")</option>\n");
							}
							?>
							</select>
							<?php echo $form->error("sel_Member"); ?>
						</li>
						<li>
							<label for="sel_Position">Position</label>
							<select name="sel_Position" id="sel_Position">
							<?php
							for ($i = 0; $i < count($positionz); $i++) {
								echo ("\t\t\t\t\t\t\t<option value=\"" . $i . "\">" . $positionz[$i] . "</option>\n");
							// echo ("\t\t\t\t\t\t\t<option value=\"" . $i . "\">" . $positionz[5] . "</option>\n");
							}
							?>
							</select>
							<?php echo $form->error("sel_Position"); ?>
						</li>
						<li>
							<input type="hidden" id="subaddnomination" name="subaddnomination" value="1" />
							<input type="submit" value="Nominate" />
						</li>
					</ol>
				</fieldset>
			</form>

			<table class="pretty">
				<thead>
					<tr>
						<th scope="col">Position</th>
						<th scope="col">Second?</th>
					</tr>
				</thead>
			

<tbody>
					<tr class="thead">
						<td>President</td>
						<td></td>
					</tr>
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 0 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
              
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=0\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0 ) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=0\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
					<tr class="thead">
						<td>Pledge Master</td>
						<td></td>
					</tr>
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 1 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=1\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=1\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
					<tr class="thead">
						<td>VP of Service</td>
						<td></td>
					</tr>
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 2 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=2\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=2\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
					<tr class="thead">
						<td>VP of Membership</td>
						<td></td>
					</tr>
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 3 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=3\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=3\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
					<tr class="thead">
						<td>VP of Fellowship</td>
						<td></td>
					</tr>
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 4 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=4\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=4\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
					<tr class="thead">
						<td>VP of Finance</td>
						<td></td>
					</tr>
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 5 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=5\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=5\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
 					<tr class="thead">
						<td>VP of Communications</td>
						<td></td>
					</tr>
						<?php 
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 6 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=6\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=6\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
					<!-- <tr class="thead">
						<td>Fundraising Chair</td>
						<td></td>
					</tr> 
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 7 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=7\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=7\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?> -->
					<tr class="thead">
						<td>Interchapter Chair</td>
						<td></td>
					</tr>
						<?php
						$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 7 ORDER BY decline, name";
						$retval = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($retval)) {
							$nominee_info = $database->getUserInfo($row['name']);
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							$declined = $row['decline'] > 0;
							$declinedOut = ($declined) ? " class=\"declined\"" : "";
							echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
							if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
								if ($row['decline'] == 0) {
									echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=7\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
								}
							}
							echo ("</td><td>");
							if ($declined) {
								echo ("Declined");
							} else if ($row['second'] == 0) {
								if (strcmp($session->username,$row['name']) == 0) {
									echo ("Not seconded");
								} else {
									echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=7\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
								}
							} else {
								echo ("Seconded");
							}
							echo ("</td></tr>");
							$i++;
						}
						?>
			<tr class="thead">
				<td>Diversity and Inclusion Chair</td>
				<td></td>
			</tr>
				<?php
				$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `position` = 8 ORDER BY decline, name";
				$retval = $database->query($q);
				$i = 0; // Counter used for alternating table row colors
				while ($row = mysql_fetch_array($retval)) {
					$nominee_info = $database->getUserInfo($row['name']);
					$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
					$declined = $row['decline'] > 0;
					$declinedOut = ($declined) ? " class=\"declined\"" : "";
					echo ("<tr".$zebra."><td".$declinedOut.">".$nominee_info['fname']." ".$nominee_info['lname']." (".$nominee_info['username'].")");
					if (strcmp($session->username,$row['name']) == 0 || $session->isAdmin()) {
						if ($row['decline'] == 0) {
							echo (" [<a href=\"process.php?subdeclinenomination=1&amp;user=".$row['name']."&amp;position=8\" title=\"Decline Nomination\" onclick=\"return confirm('Are you sure you want to decline this nomination?');\">Decline</a>]");
						}
					}
					echo ("</td><td>");
					if ($declined) {
						echo ("Declined");
					} else if ($row['second'] == 0) {
						if (strcmp($session->username,$row['name']) == 0) {
							echo ("Not seconded");
						} else {
							echo ("<a href=\"process.php?subsecondnomination=1&amp;user=".$row['name']."&amp;position=8\" title=\"Second Nomination\" onclick=\"return confirm confirm('Are you sure you want to second this nomination?');\">Second Now</a>");
						}
					} else {
						echo ("Seconded");
					}
					echo ("</td></tr>");
					$i++;
				}
				?>
				</tbody>
			</table>
<?php
			}
?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>
