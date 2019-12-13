<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Calendar of Events";
$current_page = "calendar";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<style type="text/css">
	<!--
		#mainContent table.calendar td{border:1px solid #333;padding:0;vertical-align:top}
		#mainContent table.calendar th{border:1px solid #333;text-align:center}
		#mainContent table.calendar td.empty{background-color:#ff9;padding:0}
		#mainContent table.calendar tr:hover{background-color:#fc5}
		#mainContent table.calendar caption{font-weight:700;font-size:1.8em;margin:0 0 0.5em;position:relative}
		#mainContent table.calendar td.calendar-day{height:100px;width:80px;padding:2px}
		#mainContent table.calendar td.calendar-day a{display:block;margin-bottom:1px}
		#mainContent table.calendar td.today{background-color:#fe7;border:4px solid #900;font-weight:700}
		#mainContent table.calendar caption span{font-size:0.7em;position:absolute}
		#mainContent table.calendar caption span a{text-decoration:none}
		#mainContent table.calendar caption span.calendar-prev{left:30px}
		#mainContent table.calendar caption span.calendar-next{right:30px}
	-->
	</style>
	<script type="text/javascript">
	<!--/JOE: I don't think this part does anything'/--><![CDATA[//><!--
		"use strict";

		// Place all JS to be run on page load in this function
		$(document).ready(function () {
			makeRound(".contentBox", "10", "10", "10", "10");
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
<?php
if ($_GET["month"] == "") {
	// Current date in x/x/xxxx format
	$curday   = date(j);
	$curmonth = date(n);
	$curyear  = date(Y);
} else {
	$curmonth = htmlspecialchars($_GET["month"]);
	$curyear  = htmlspecialchars($_GET["year"]);
}

// Create month and year selection controls

/* date settings */
$month                = (int) ($_GET['month'] ? htmlspecialchars($_GET['month']) : date('m'));
$year                 = (int) ($_GET['year'] ? htmlspecialchars($_GET['year']) : date('Y'));
/* select month control */
$select_month_control = '<li><select name="month" id="month">';
for ($x = 1; $x <= 12; $x++) {
	$select_month_control .= '<option value="' . $x . '"' . ($x != $month ? '' : ' selected="selected"') . '>' . date('F', mktime(0, 0, 0, $x, 1, $year)) . '</option>';
}
$select_month_control .= '</select>';
/* select year control */
$year_range          = 7;
$select_year_control = '<select name="year" id="year">';
for ($x = ($year - floor($year_range / 2)); $x <= ($year + floor($year_range / 2)); $x++) {
	$select_year_control .= '<option value="' . $x . '"' . ($x != $year ? '' : ' selected="selected"') . '>' . $x . '</option>';
}
$select_year_control .= '</select>';
/* bringing the controls together */
$controls = '<form method="get" action="#"><ol>' . $select_month_control . $select_year_control . '<input type="submit" name="submit" value="Go" /></li></ol></form>';

// Query the server for events on the date
$q      = "SELECT * FROM `" . TBL_EVENTS . "` ORDER BY `start`";
$result = $database->query($q);

$count   = 0;
$names   = array();
$daylist = array();
$ids     = array();

if ($result) {
	while ($row = mysql_fetch_array($result)) {
		// Get variables
		$id    = $row[0];
		$name  = htmlspecialchars($row[1]);
		$type  = $row[2];
		$desc  = $row[3];
		$start = $row[4];
		$end   = $row[5];
		
		$calcmonth = ($start[5] * 10 + $start[6]);
		$calcday   = ($start[8] * 10 + $start[9]);
		
		$Eyear = substr($start, 0, 4);
		
		if ($curmonth == $calcmonth && $Eyear == $curyear) {
			$names[$count]   = $name;
			$daylist[$count] = $calcday;
			$ids[$count]     = $id;
			$count++;
		}
	}
}

function return_startday($month, $year)
{
	$startday = date("l", mktime(0, 0, 0, $month, 1, $year));
	return $startday;
}

function return_daysInMonth($month, $year)
{
	$daysCount = 0;
	if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
		$daysCount = 31;
	} else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
		$daysCount = 30;
	} else {
		if (date(L, mktime(0, 0, 0, 1, 1, $year))) {
			$daysCount = 29;
		} else {
			$daysCount = 28;
		}
	}
	return $daysCount;
}

$startday    = return_startday($curmonth, $curyear);
$daysInMonth = return_daysInMonth($curmonth, $curyear);

//setup prev. month
if ($curmonth == 1) {
	$prevmonth = 12;
	$prevyear  = $curyear - 1;
} else {
	$prevmonth = $curmonth - 1;
	$prevyear  = $curyear;
}

//setup nextmonth
if ($curmonth == 12) {
	$nextmonth = 1;
	$nextyear  = $curyear + 1;
} else {
	$nextmonth = $curmonth + 1;
	$nextyear  = $curyear;
}
?>
<!--/This is where we define the table/-->
			<table class="calendar pretty" cellpadding="0" cellspacing="0" border="0">
				<caption class="calendar-month"><span class="calendar-prev"><?php echo "<a href=\"calendar.php?month=".$prevmonth."&amp;year=".$prevyear."\">&laquo;&nbsp;".$monthsOfTheYear[$prevmonth]."</a>"; ?></span>&nbsp;<?php echo ($monthsOfTheYear[$curmonth]." ".$curyear); ?>&nbsp;<span class="calendar-next"><?php echo "<a href=\"calendar.php?month=".$nextmonth."&amp;year=".$nextyear."\">".$monthsOfTheYear[$nextmonth]."&nbsp;&raquo;</a>"; ?></span></caption>
				<tr class="header-row"><th abbr="Sunday">Sun</th><th abbr="Monday">Mon</th><th abbr="Tuesday">Tue</th><th abbr="Wednesday">Wed</th><th abbr="Thursday">Thu</th><th abbr="Friday">Fri</th><th abbr="Saturday">Sat</th></tr>
				<?php
				echo ("<tr class=\"day-row\">");
				// Print out blank spaces until we get to the start day
				$day_iterator   = 1;
				$dayOf_iterator = 0;
				for ($i = 0; $i < 7; $i++) {
					if (!strcmp($startday, $daysOfTheWeek[$i])) {
						$dayOf_iterator++;
						break;
					} else {
						echo ("<td class=\"calendar-day empty\">&nbsp;</td>");
						$dayOf_iterator++;
					}
				}
				
				while ($day_iterator <= $daysInMonth) {
					$curdate = strtotime($curyear."-".$curmonth."-".$day_iterator);
					if (date("Y-m-d") === date("Y-m-d",$curdate)) {
						echo "<td class=\"calendar-day today\">".$day_iterator."<br />";
					} else {
						echo ("<td class=\"calendar-day\">".$day_iterator."<br />");
					}
					// Code for adding the events
					for ($i = 0; $i < $count; $i++) {
						if ($day_iterator == $daylist[$i]) {
							$eventname = $names[$i];
							// Cut off event name after 20 characters to save space on calendar
							$cutoff    = false;
							if (strlen($eventname) > 15) {
								$eventname = substr($eventname, 0, 15);
								$cutoff    = true;
							}
							// Force event name to linewrap after 10 characters to maintain calendar shape
							$eventname = wordwrap($eventname, 10, "<br />", true);
							// Add elipsis if event name was cut off
							if ($cutoff) {
								$eventname .= "&hellip;";
							}
							echo ("<a href=\"event_page.php?eventid=".$ids[$i]."\" title=\"".$names[$i]."\">".$eventname."</a><br />");
						}
					}
					echo ("</td>");
					if ($dayOf_iterator % 7 == 0 && $day_iterator != $daysInMonth) {
						echo "</tr>\n				<tr class=\"day-row\">";
					} else if ($dayOf_iterator % 7 == 0) {
						echo "</tr>";
					}
					$day_iterator++;
					$dayOf_iterator++;
				}
				// Print out blank spaces for empty days at end of month
				if (($dayOf_iterator - 1) % 7 != 0) {
					while ($dayOf_iterator % 7 != 1) {
						$dayOf_iterator++;
						echo ("<td class=\"calendar-day empty\">&nbsp;</td>");
					}
				}
				echo "</tr>\n";
				?>
			</table>
			<?php echo $controls; ?>
			<div class="contentBox">
				<p>You can subscribe to the events in this calendar using <a href="http://www.google.com/support/calendar/bin/answer.py?hl=en&answer=37100" rel="external">Google Calendar</a> or any other calendar program that accepts an <code>.ics</code> iCalendar feed using the following <abbr title="Uniform Resource Locator">URL</abbr>: <span class="center" style="display:block">http://www.apousc.org/ical.php</span></p>
			</div>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>