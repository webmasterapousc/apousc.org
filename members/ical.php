<?php
// Initiate connection to database and user login session
include("include/session.php");

//set correct content-type-header
header("Content-Type: text/calendar; charset=utf-8");
header("Content-Disposition: inline; filename=\"calendar.ics\"");
// header("Content-Disposition: inline; filename=calendar.ics");
header("Cache-Control: no-cache, must-revalidate");

date_default_timezone_set('America/Los_Angeles'); // Jessie: added for time and for the code to work

// Convert event descriptions
function strip4ical($input_text)
{
	// Escape characters required by iCalendar spec
	$search = array(
		'\\',
		',',
		';'
	);
	$replace = array(
		'\\\\',
		'\,',
		'\;'
	);
	$input_text = str_replace($search, $replace, $input_text);
	
	// Remove BBCode
	$search = array(
		'@\[b\](.*?)\[/b\]@si',
		'@\[i\](.*?)\[/i\]@si',
		'@\[u\](.*?)\[/u\]@si',
		'@\[url=(.*?)\](.*?)\[/url\]@si',
		'@\[list\](.*?)\[/list\]@si',
		'@\[numbered\](.*?)\[/numbered\]@si',
		'@\[item\](.*?)\[/item\]@si'
	);
	$replace  = array(
		'\\1',
		'\\1',
		'\\1',
		'\\2',
		'\\1',
		'\\1',
		"\r\n - \\1"
	);
	$input_text = preg_replace($search, $replace, $input_text);
	
	// Fix line breaks to iCalendar spec
	$input_text = preg_replace("@\r\n@", "[-LB-]", $input_text);
	$input_text = preg_replace("@\r@", "", $input_text);
	$input_text = preg_replace("@\n@", "", $input_text);
	$input_text = preg_replace("@\[-LB-\]\[-LB-\]@", "[-LB-]", $input_text);
	$input_text = preg_replace("@\[-LB-\]\[-LB-\]@", "[-LB-]", $input_text);
	$input_text = preg_replace("@\[-LB-\]@", "\r\n  ", $input_text);

	return $input_text;
}

echo ("BEGIN:VCALENDAR" . "\r\n");
echo ("VERSION:2.0" . "\r\n");
echo ("PRODID:-//APOUSC//apousc.com Calendar//EN" . "\r\n");
echo ("X-WR-CALNAME:APO - AK Events" . "\r\n");
echo ("X-WR-CALDESC:Events Calendar for APO - Alpha Kappa Chapter" . "\r\n");
echo ("X-WR-TIMEZONE:America/Los_Angeles" . "\r\n");
echo ("CALSCALE:GREGORIAN" . "\r\n");
echo ("METHOD:PUBLISH" . "\r\n");
echo ("BEGIN:VTIMEZONE" . "\r\n");
echo ("TZID:US/Pacific" . "\r\n");
echo ("BEGIN:STANDARD" . "\r\n");
echo ("DTSTART:20090101T020000" . "\r\n");
echo ("RRULE:FREQ=YEARLY;BYDAY=1SU;BYHOUR=2;BYMINUTE=0;BYMONTH=11" . "\r\n");
echo ("TZNAME:Pacific Standard Time" . "\r\n");
echo ("TZOFFSETFROM:-0700" . "\r\n");
echo ("TZOFFSETTO:-0800" . "\r\n");
echo ("END:STANDARD" . "\r\n");
echo ("BEGIN:DAYLIGHT" . "\r\n");
echo ("DTSTART:20090101T020000" . "\r\n");
echo ("RRULE:FREQ=YEARLY;BYDAY=2SU;BYHOUR=2;BYMINUTE=0;BYMONTH=3" . "\r\n");
echo ("TZNAME:Pacific Daylight Time" . "\r\n");
echo ("TZOFFSETFROM:-0800" . "\r\n");
echo ("TZOFFSETTO:-0700" . "\r\n");
echo ("END:DAYLIGHT" . "\r\n");
echo ("END:VTIMEZONE" . "\r\n");

// Query the server for events
$q      = "SELECT * FROM `" . TBL_EVENTS . "` ORDER BY `start`";
$result = $database->query($q);
while ($row = mysql_fetch_array($result)) {
	// Get variables
	$name  = strip4ical($row[1]);
	$desc  = strip4ical($row[3]);
	$start = $row[4];
	$end   = $row[5];

	echo ("BEGIN:VEVENT" . "\r\n");
	echo ("DTSTAMP:" . gmdate("Ymd\THis\Z",strtotime($start)) . "\r\n");
	echo ("DTSTART;TZID=US/Pacific:" . date("Ymd\THis",strtotime($start)) . "\r\n");
	echo ("ORGANIZER:APO - Alpha Kappa Chapter" . "\r\n");
	echo ("SUMMARY:" . $name . "\r\n");
	echo ("UID:" . md5(uniqid(mt_rand(),true)) . "@apousc.org" . "\r\n"); // changed @apousc.com to @apousc.org
	echo ("CLASS:PUBLIC" . "\r\n");
	echo ("DESCRIPTION:" . $desc . "\r\n");
	echo ("DTEND;TZID=US/Pacific:" . date("Ymd\THis",strtotime($end)) . "\r\n");
	echo ("END:VEVENT" . "\r\n");
}

echo ("END:VCALENDAR");
exit;
?>