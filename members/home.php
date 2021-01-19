<?php 
	if (!isset($_SESSION)) {
	    session_start();
	}
?> 
<?php
// Google Analytics
include_once("include/analytics.php");
// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Alpha Phi Omega - Alpha Kappa";
$current_page = "index";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<style type="text/css" media="screen">
	<!--
		/* "Picture of the Week" box */
		#picOfTheWeek{background-color:#000;margin:-1em 0 2em;padding:5px;position:relative;text-align:center}
		#picOfTheWeek .slideContainer{padding-top:5px;width:100%}
		#picOfTheWeek .slideContainer img{display:block;margin:auto}
		#picOfTheWeek .overlay{background-color:#000;color:#fff;display:none;padding:10px;position:absolute;width:531px;z-index:500}
		#picOfTheWeek h3{border-bottom:none;color:#fff;font-size:1.5em;font-weight:400;margin:0 0 0.3em;padding:0}
		#picOfTheWeek a:link,#picOfTheWeek a:visited,#picOfTheWeek a:hover,#picOfTheWeek a:focus,#picOfTheWeek a:active{text-decoration:none}
		#picOfTheWeek a{display:none} /* Set initial display to 'none', and change to 'inline' using JavaScript. This prevents all of the photos showing at the same time if JS is disabled */
		#picOfTheWeek a.firstPhoto{display:inline}
		#picTop{font-size:1.2em;font-weight:400;left:4px;top:5px}
		#picBottom{bottom:0;left:4px;text-align:left}
		#picOfTheWeek p{font-weight:400;margin:0}
	-->
	</style>
	<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";

		var setupPotw, hideCaption; // Declare variables
		setupPotw = function () { // Construct "Pic of the Week" photo slides
			$('#picOfTheWeek a').each(function () {
				$(this).css('display','block'); // Use JavaScript to set CSS display to inline. That way, if JavaScript is disabled, only the first image will be shown and not all the photos at once.
				$(this).wrap('<div class="slideContainer" />');
				$(this).before('<div id="picTop" class="overlay">Week of ' + $(this).attr('title') + '</div>');
				$(this).after('<div id="picBottom" class="overlay"><h3>' + $(this).children('img').attr('title') + '</h3><p>' + $(this).children('img').attr('alt') + '</p></div>');
			});
			$('#picOfTheWeek').hover(function () {
				$('#picOfTheWeek .overlay').fadeTo('slow',0.7);
			}, function () {
				$('#picOfTheWeek .overlay').fadeOut();
			});
		};
		hideCaption = function () {
			$('#picOfTheWeek .overlay').css('opacity',0);
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
	// If user is logged in, show Picture of the Week and Announcements
	if ($session->logged_in) {
?>

<!-- Flickr Slide Show 

<object width="6" height="413"> <param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to="></param> <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=109615"></param> <param name="allowFullScreen" value="true"></param><embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=109615" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to=" width="550" height="413"></embed></object>
<hr />

-->



<!-- Leadership Board -->
<!-- <div class = 'highlight' align=middle> Site Under Construction </div> -->

<!--Family Points>
<iframe style="width:29%; height:104px; border:#ac2626 2px solid; border-radius:5px; margin-left:215px; margin-right:50px; margin-bottom:20px" align=middle frameborder=0 scrolling="no" src="https://docs.google.com/spreadsheets/d/1VDZESzaXjhlvjbwGRvCUUUP1QCPu8YU1vNehVkVZa1A/pubhtml?gid=221396378&amp;single=true&amp;widget=false&amp;range=b6:c9&amp;chrome=false&amp;headers=false"></iframe--> 

<!--Service/Fellowship/IC/Membership-->
<!-- <iframe style="width:100%; height:130px; border:#ac2626 2px solid; border-radius:5px" align=middle frameborder=0 scrolling="no" src="https://docs.google.com/spreadsheets/d/1VDZESzaXjhlvjbwGRvCUUUP1QCPu8YU1vNehVkVZa1A/pubhtml?gid=1295531778&amp;single=true&amp;widget=false&amp;range=a1:h6&amp;chrome=false&amp;embedded=true"></iframe>  -->

<!--hr/-->

<!-- start of announcements sections -->
<!-- <h2 align=middle>APO Youtube Channel</h2>-->


<?php
echo "<div class='status'>";
echo "<br /><div class='highlight' align=middle><a href='../information/announcements.php'>Announcements</a></div><ul>";

$query = "SELECT * FROM announcements ORDER BY date DESC LIMIT 3";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
    echo "<li>";
    echo "<strong><span class='holder_line'>".$row['title']."</span></strong>";
            echo "<span class='holder_time'>" . date("M j", strtotime($row['date'])) . "</span>";
include_once("include/convert_text.php");
    echo "<span class='holder_comment'>".convertText($row['body'])."</span>";
    echo "</li><hr/>";
}

?>


<!-- Start of Calendar -->

<?php
echo "</ul><br /><div class='highlight' align=middle><a href='../members/calendar.php'>Event Calendar</a></div>";
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
<!--/This is where we define the /-->
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
<div class="holder_line extra">
	<p>You can subscribe to the events in this calendar using <a href="http://www.google.com/support/calendar/bin/answer.py?hl=en&answer=37100" rel="external">Google Calendar</a> or any other calendar program that accepts the APOUSC<code>.ics</code> iCalendar feed downloadable <a href="ical.php">here</a></p>
</div>
<hr>
<!-- End of Calendar -->


<!--Start of Events Sign Ups -->
<?php

#echo "</ul>;"
echo "<br /><div class='highlight' align=middle>Events, Sign Ups, Comments</div><ul>";
$query = "SELECT U.username,U.fname,U.lname,E.ID,E.name,E.start,COUNT(S.username) as counter FROM events as E, signups as S, users as U WHERE UNIX_TIMESTAMP(E.end) <= UNIX_TIMESTAMP(NOW()) AND S.eventid = E.ID AND S.username = U.username GROUP BY E.ID ORDER BY start DESC LIMIT 3";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result)){
    //echo "<li><span class='holder_photo'><a href='userinfo.php?user=" . $row['username'] . "'><img src='img/profilepics/" . $row['username'] . ".jpg' /></a></span>";
	    echo "<li><span class='holder_line extra'><strong><a href='userinfo.php?user=" . $row['username'] . "'>" . $row['fname'] . " " . $row['lname'] . "</a>";
	    echo "</strong>";
	    echo " and ".($row['counter'] - 1)." others attended <a href='event_page.php?eventid=" . $row['ID'] . "'>";
	    echo $row['name'];
	    echo "</a></span>";
	    echo "<span class='holder_time'>" . date("g:i a", strtotime($row['start'])) . "</span>";
	    echo "</strong></li><hr>";
}

// echo "</ul><br /><div class='highlight' align=middle>Comments</div><ul>";
$query = "SELECT C.timestamp, C.comment, C.eventid, C.username, U.fname, U.lname, E.name FROM comments as C, users as U, events as E WHERE C.timestamp + 21600 >= UNIX_TIMESTAMP(NOW()) AND C.username = U.username AND C.eventid = E.ID ORDER BY timestamp DESC LIMIT 10";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
    echo "<li>";
    //echo "<span class='holder_photo'><a href='userinfo.php?user=" . $row['username'] . "'><img src='img/profilepics/" . $row['username'] . ".jpg' /></a></span>";
    echo "<span class='holder_line'><a href='userinfo.php?user=" . $row['username'] . "'>" . $row['fname'] . " " . $row['lname'] . "</a>";
    echo " commented on ";
    echo "<a href='event_page.php?eventid=" . $row['eventid'] . "'>" . $row['name'] . "</a>:</span>";
    echo "<span class='holder_time'>" . date("g:i a", $row['timestamp']) . "</span>";
    echo "<span class='holder_comment'>" . $row['comment'] . "</span>";
    echo "</li><hr>";
}


// echo "</ul><br /><div class='highlight' align=middle>Signups</div><ul>";
$query = "SELECT * FROM signups AS S, users as U, events as E WHERE S.timestamp + 43200 >= UNIX_TIMESTAMP(NOW()) AND U.username = S.username AND E.ID = S.eventid ORDER BY UNIX_TIMESTAMP(S.timestamp) + 43200 DESC LIMIT 7";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result)){
    //echo "<li><span class='holder_photo'><a href='userinfo.php?user=" . $row['username'] . "'><img src='img/profilepics/" . $row['username'] . ".jpg' /></a></span>";
    echo "<li><span class='holder_line extra'><strong><a href='userinfo.php?user=" . $row['username'] . "'>" . $row['fname'] . " " . $row['lname'] . "</a>";
    echo "</strong>";
    echo " signed up for <a href='event_page.php?eventid=" . $row['eventid'] . "'>";
    echo $row['name'];
    echo "</a></span>";
    echo "<span class='holder_time'>" . date("g:i a", $row['timestamp']) . "</span>";
    echo "</strong></li><hr>";
}

echo "</ul></div>";
?>







<?php
	}
	// Or, if the user is not logged in, show general welcome
	else {
?>

			<h2>Hello and Welcome!</h2>
<!--<object width="320" height="240" class="floatright"> <param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to="></param> <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=109615"></param> <param name="allowFullScreen" value="true"></param><embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=109615" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to=" width="320" height="240"></embed></object>-->
			<p>Welcome to the members' page of the Alpha&nbsp;Kappa Chapter of Alpha&nbsp;Phi&nbsp;Omega at the University of Southern California.</p>
			<!--<p><strong>Alpha Phi Omega</strong> is an international, co-educational service fraternity that has set the standard for college campus-based volunteerism since 1925. With active chapters on over 375 American campuses, Alpha Phi Omega is the largest collegiate fraternity in the United States. We strive to help each individual member develop leadership skills, experience friendship on many levels, and provide service to others. With an active membership of approximately 21,000 students and over 350,000 alumni members, the Alpha Phi Omega family is here for you.</p>-->
			<!--<p>Alpha Phi Omega &ndash; Alpha Kappa Chapter is <abbr title="University of Southern California">USC</abbr>'s premier co-ed community service-based leadership fraternity, derived from the ideals and principles of the Boys Scouts of America. All undergraduate and graduate students of any major are invited to check us out! If you have any questions, please feel free to <a href="contact.php">contact us</a>.</p>-->

<?php } ?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>





