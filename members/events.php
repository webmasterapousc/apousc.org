<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Upcoming Events";
$current_page = "events";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
<style>
#searchform form input[type='text']{
	display:inline;
	box-sizing: border-box;
	border: 2px solid #ccc;
	border-radius: 4px;
	font-size: 16px;
	background-color: white;
	background-position: 10px 10px; 
	background-repeat: no-repeat;
	padding: 12px 20px 12px 10px;
	-webkit-transition: width 0.4s ease-in-out;
	transition: width 0.4s ease-in-out;
	width:75%;
	height: 12px;
}

input[type=submit] {
	background:#ccc; 
	border:0 none;
	cursor:pointer;
	-webkit-border-radius: 5px;
	border-radius: 5px; 
	height: 28px;
	width:8%;
}
select {
	width: 14%;
	height: 28px;
	border: 2px;
}

</style>

<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
			<h2>Event Listing</h2>
			<div id="searchform">
			<form action="<?php echo $_SERVER["REQUEST_URI"];?>" method="GET"> 

				<input name="span" type="hidden" value= "<?php echo $_GET["span"] ?>">
				<input type="text" placeholder="Search for an event..." name="search">
				<select name="event_type">
					<option value="-1">All events</option>
				<?php
					$q =  "SELECT name FROM event_type";
					$result = $database->query($q);
					$j = 0;

					while ($row = mysql_fetch_array($result)) {
						if(strcmp($row[0], "Canceled") != 0 && strcmp($row[0], "Alpha Family") != 0 && strcmp($row[0], "Phi Family") != 0 && strcmp($row[0], "Omega Family") != 0){
							echo "<option value=".$j.">". $row[0] ."</option>";
						}
						$j++;
					};
				?>

				<input id="submit_button" type="submit" value="Search">



			</form>
			</div>
			<p><strong>View:</strong>
				<?php if((strcmp($_GET["span"],"soon") === 0)) {echo "Next 2 Weeks";} else {echo "<a href=\"events.php?span=soon\">Next 2 Weeks</a>";}; ?> |
				<?php if((strcmp($_GET["span"],"upcoming") === 0)) {echo "All Upcoming";} else {echo "<a href=\"events.php?span=upcoming\">All Upcoming</a>";}; ?> |
				<?php if((strcmp($_GET["span"],"semester") === 0)) {echo "Entire Semester";} else {echo "<a href=\"events.php?span=semester\">Entire Semester</a>";}; ?> |
				<?php if((strcmp($_GET["span"],"forever") === 0)) {echo "All Time";} else {echo "<a href=\"events.php?span=forever\">All Time</a>";}; ?>
				<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><a href='https://www.google.com/calendar/embed?src=j2gk9k44u7q6qfegvnjs20f5pvj9qflg%40import.calendar.google.com&ctz=America/Los_Angeles' target='_blank'>GCal</a></strong>"; ?>
				<?php echo " | <strong><a href='calendar.php'>Calendar</a></strong>"; ?>
				

				<table id="eventTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
					<?php $ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up"; 
						if ($session->logged_in) {echo "<th scope='col'></th>";};
					?>
						<!-- <th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>&order=name&amp;sort=<?php echo $ascdesc; ?>">Event</a></th>
						<th scope="col"><a href="<?php echo $_SERVER["REQUEST_URI"]; ?>&order=type&amp;sort=<?php echo $ascdesc; ?>">Type</a></th>
						<th scope="col" style="width:5em"><a href="	<?php echo $_SERVER["REQUEST_URI"]; ?>&order=start&amp;sort=<?php echo $ascdesc; ?>">Date</a></th> -->
						<th scope="col">Event</th>
						<th scope="col">Type</th>
						<th scope="col" style="width:5em">Date</th>
						<th scope="col" style="width:8em">Time</th>
						<th scope="col"><img src="/img/car.png" height="15px"></a></th> 
						<th scope="col"><img src="/img/leadicon1.png" height="20px"></a></th>
					</tr>
				</thead>
				<tbody>
					<?php
	// $sortorders = array(
	// 	"name"  => "name",
	// 	"type"   => "type",
	// 	"date" => "date"
	// );
	// $sortorder_default = "start";
	// if (isset($sortorders[$_GET["order"]])) {
	// 	$sortorder = $sortorders[$_GET["order"]];
	// } else {
	// 	$sortorder = $sortorder_default;
	// }
	// $directions = array(
	// 	"up"   => "ASC",
	// 	"down" => "DESC"
	// );
	// $direction = $directions[$ascdesc];
	// $sortorder2_default = "type DESC";
	// if ($sortorders[$_GET["order"]] == "type") {
	// 	$sortorder2 = "lname ASC";
	// } else {
	// 	$sortorder2 = $sortorder2_default;
	// }					
					
					
					// Fetch current user's information
						$query = mysql_query("SELECT * FROM `users` WHERE username = '$session->username'") OR die(mysql_error());
						$aphio = mysql_fetch_array($query);
						$fambam = $aphio['family'];
						$current_year=date("Y");
						if(date("n")<=5){
							$start_month=00;$end_month=05;
						} else {
							$start_month=06;$end_month=12;
						}
						if(strcmp($_GET["span"],"semester") === 0) {$dateSpan = "WHERE end >= '$current_year-$start_month-01 00:00:00' && start <= '$current_year-$end_month-31 11:59:59'";} // Semester view will display all events from January 1 through May 31 inclusive, or June 1 through December 31 inclusive, depending on what particular time of the year it is right now. Think of this as the semester divider - fall semester starts on June 1 and ends on December 31.
						else if(strcmp($_GET["span"],"soon") === 0)  {$dateSpan = "WHERE `end` >= NOW() AND `end` <= DATE_ADD(CURDATE(), INTERVAL +14 DAY)";} // Note that this finds literally every upcoming event, even if it is in a future semester.
						else if(strcmp($_GET["span"],"forever") === 0) {} // This doesn't add a WHERE statement to the MySQL query, because we don't want any limitations on what events we fetch. Fetch them all!
						else {$dateSpan = "WHERE `end` >= NOW()";}; // Similar to upcoming events -- this finds the next 14 days of events, no matter what semester they may be in.
					
						// $q = "SELECT * FROM events 
						// {$dateSpan} ORDER BY {$sortorder} ASC";
						//$sortorder = $sortorder_default;
						$searchEventType = $_GET["event_type"];

						if($_GET["search"] == "" && ($searchEventType == -1 || $searchEventType == NULL) ){
							$q = "SELECT * FROM events {$dateSpan} ORDER BY start ASC";
						} else if($_GET["search"] == "") {
							if(strcmp($_GET["span"],"forever") === 0) {
								$q = "SELECT * FROM events WHERE type LIKE {$searchEventType} ORDER BY start ASC";
							} else {
								$q = "SELECT * FROM events {$dateSpan} && type LIKE {$searchEventType} ORDER BY start ASC";
							}
						} else {
							$searchparam = $_GET["search"];

							if($searchEventType != -1){
								$typeSpan = "type LIKE {$searchEventType} &&";
							} else {
								$typeSpan = "";
							}


							if(strcmp($_GET["span"],"forever") === 0) {
								$q = "SELECT * FROM events WHERE {$typeSpan} name LIKE '%{$searchparam}%' ORDER BY start ASC";
							} else {
								$q = "SELECT * FROM events {$dateSpan} && {$typeSpan} name LIKE '%{$searchparam}%' ORDER BY start ASC";
							}
						}
						
						$result = $database->query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($result)) {
							$id       = $row[0];
							$name     = htmlspecialchars($row[1]);
							$type     = $eventType[$row[2]];
							$desc     = $row[3];
							$start    = $row[4];
							$end      = $row[5];
							$max      = $row[6];
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							echo "					<tr".$zebra.">\n";
							if ($session->logged_in){
								
if(
   (($aphio['family'] == 1) && (("$type" == "Alpha Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 0) && ( ("$type" == "Phi Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 2) && ( ("$type" == "Phi Family") || ("$type" == "Alpha Family") ) )
   )
									{echo"<td class='check'></td>";}
								else{
									/* if ($event_page->waitlistCheck($id, $session->username, 0)) {echo "WAITLISTED";}; */
									if ($database->signedUp($id, $session->username))
										{echo "<td class='check'><img src=\"/img/checkmark.png\" height=\"15px\"></td>";}
									else {echo("<td class='check'></td>");};
								};
							} else {echo "";};
							

if(
   (($aphio['family'] == 1) && (("$type" == "Alpha Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 0) && ( ("$type" == "Phi Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 2) && ( ("$type" == "Phi Family") || ("$type" == "Alpha Family") ) )
   )
								{echo "<td><a href=\"event_page.php?eventid=$id\"><span class='greyedOut'>".$name."</span></a></td>\n";
}
else							{echo "						<td><a href=\"event_page.php?eventid=$id\">".$name."</a></td>\n";};

if(
   (($aphio['family'] == 1) && (("$type" == "Alpha Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 0) && ( ("$type" == "Phi Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 2) && ( ("$type" == "Phi Family") || ("$type" == "Alpha Family") ) )
   ){echo "<td><span class=\"greyedOut\">".$type."</span></td>\n";}						
							else {echo "						<td>".$type."</td>\n";};

if(
   (($aphio['family'] == 1) && (("$type" == "Alpha Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 0) && ( ("$type" == "Phi Family") || ("$type" == "Omega Family") ) )
   ||
   (($aphio['family'] == 2) && ( ("$type" == "Phi Family") || ("$type" == "Alpha Family") ) )
   ) {
		echo "<td><span class='greyedOut'>".date('D, M j', strtotime($start))."</span>";
	}
else{
	echo "						<td>".date('D, M j', strtotime($start))."";
};
if(strcmp($_GET["span"],"forever") === 0) {
	echo ", ".date('Y', strtotime($start));
} else {

};
if(!((date('D', strtotime($start))) == (date('D', strtotime($end))))) {
	echo "						<br />";
	if(
		(($aphio['family'] == 1) && (("$type" == "Alpha Family") || ("$type" == "Omega Family") ) )
		||
		(($aphio['family'] == 0) && ( ("$type" == "Phi Family") || ("$type" == "Omega Family") ) )
		||
		(($aphio['family'] == 2) && ( ("$type" == "Phi Family") || ("$type" == "Alpha Family") ) )
		){
		echo "<span class=\"greyedOut\">".date('D, M j', strtotime($end));
}
else {
	echo date('D, M j', strtotime($end));
	}
}
else {};

		echo "						<td>".date("g:iA", strtotime($start))." - ".date("g:iA", strtotime($end))."";

		$event_info = $database->getEventInfo($id);
		$temp = $database->getDriversAndAtt($id);
		$driver_info = mysql_fetch_array($temp);
		if ($event_info['max'] != 0) {
			if ($driver_info[nDrivers] < min($driver_info[nAtt], $event_info['max']) && $event_info['walk'] == 0) {
			 	echo " <td class='check'><img src=\"/img/notyetmark.png\" height=\"9px\"></td>";
			} else {
			 	echo " <td class='check'><img src=\"/img/yesmark1.png\" height=\"15px\"></td>";
			}
		} else {
			if ($driver_info[nDrivers] < $driver_info[nAtt] && $event_info['walk'] == 0) {
			 	echo " <td class='check'><img src=\"/img/notyetmark.png\" height=\"9px\"></td>";
			} else {
			 	echo " <td class='check'><img src=\"/img/yesmark1.png\" height=\"15px\"></td>";
			}
		}

		$result1 = $database->hasLead($id);
		$hasLead = false;
		while ($row = mysql_fetch_array($result1)) {
		 	if ((int)$row['lead'] === 1) {
		 		$hasLead = true;
		 	}
		}
		if ($hasLead === false) {
			echo " <td class='check'><img src=\"/img/notyetmark.png\" height=\"9px\"></td>";
		} else {
			echo " <td class='check'><img src=\"/img/yesmark1.png\" height=\"15px\"></td>";
		}

echo "					</td></tr>";


							$i++;
}
					
					?>
				</tbody>
			</table>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>