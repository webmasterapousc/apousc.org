<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include "include/session.php";

// fix mysql calls
include_once("include/fix_mysql.inc.php");

// Set values for page
$page_title = "Event Details";
$current_page = "events";

	// Load header
include_once "include/header.php";
date_default_timezone_set('America/Los_Angeles');
	// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
	##################################################
?>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
"use strict";

	// Place all JS to be run on page load in this function

//--><!]]>
</script>
<style type="text/css" media="screen">
	#signupTable th {
		padding:0.6em;
	}
	#signupTable td {
		padding: 0.4em;
		max-width:220px;
		overflow:hidden;
		text-overflow:ellipsis;
		white-space:nowrap;
	}
	#signupTable .userName {
		min-width:150px;
	}
	<!--
	#commentTable p{margin:0}
	#mainContent #eventDetails,#mainContent #eventDetails li{list-style-type:none;margin-left:0}
	#signupTable tr td.waitlist{text-align:center;font-weight:700;color:#fff;background-color:#1f64a1}
	#signupTable tr.lead{border:3px solid #444}
	-->
</style>
<?php
##################################################
// Load top navigation
include_once "include/topnav.php";

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
<?php
$query = mysql_query("SELECT * FROM `users` WHERE username = '$session->username'") OR die(mysql_error());
$aphio = mysql_fetch_array($query);
$req_event = preg_replace('/\D/', '', $_GET['eventid']); // Sanitize user-submitted argument before running through MySQL to prevent SQL injection
if (!$database->eventExists($req_event)) {
    # The event ID is invalid (no event exists with that ID)
	echo ("<p>Sorry, but the requested event does not exist.</p>\n");
} else {
    # The event ID is valid, so display information about the requested event (the rest of the page will be included within this else clause)
	$req_event_info = $database->getEventInfo($req_event);

	/************** GENERAL INFORMATION ABOUT THE EVENT *************************/
	?>

	<div class="topContent">
		<h4><?php echo $eventType[$req_event_info['type']] . " Event >> " . (htmlspecialchars($req_event_info['name'])) ?></h4>
		<hr>
		<ul id="eventDetails">
			<li>
				<?php
				if (date("m/d/y", strtotime($req_event_info['start'])) == date("m/d/y", strtotime($req_event_info['end']))) {
					echo date("l", strtotime($req_event_info['start'])) . ", <span class='tile'>" . date("F j", strtotime($req_event_info['start'])) . "</span>, " . date("Y", strtotime($req_event_info['start']));
				} else {
					echo date("n/j/y (D)", strtotime($req_event_info['start'])) . " &mdash; " . date("n/j/y (D)", strtotime($req_event_info['end'])) . "\n";
				}
				?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<?php
				if (date("m/d/y", strtotime($req_event_info['start'])) == date("m/d/y", strtotime($req_event_info['end']))) {
					echo "<span class='tile'>" . date("g:i", strtotime($req_event_info['start'])) . "</span>";
					if (date("A", strtotime($req_event_info['start'])) != date("A", strtotime($req_event_info['end']))) {echo date("A", strtotime($req_event_info['start']));} else {}
					;
				} else {
					echo date("g:i A", strtotime($req_event_info['start'])) . "\n";
				}
				?>
				&ndash;
				<?php
				if (date("m/d/y", strtotime($req_event_info['start'])) == date("m/d/y", strtotime($req_event_info['end']))) {
					echo "<span class='tile'>" . date("g:i", strtotime($req_event_info['end'])) . "</span> " . date("A", strtotime($req_event_info['end'])) . "\n";
    } //date("m/d/y", strtotime($req_event_info['start'])) == date("m/d/y", strtotime($req_event_info['end']))
    else {
    	echo date("g:i A", strtotime($req_event_info['end'])) . "\n";
    }
    ?>
</li>
<script>
	element = document.getElementById('mainContent').style.height;
	console.log("Element: " + element);
</script>

<?php
# Information about the event location
if (($req_event_info['location'] != NULL) && ($req_event_info['location'] != '0') && ($req_event_info['location'] == $req_event_info['meet'])) {
	echo "<hr />Meets and takes place at <span class='tile'>" . $req_event_info['location'] . "</span>";
} else {
	if (($req_event_info['meet'] != NULL) && ($req_event_info['meet'] != '0') && ($session->logged_in)) {
		echo "<hr />Meets <span class='tile'>";
		if ($req_event_info['meet'] == 'BL') {} else {echo " at ";}
		;
		echo $req_event_info['meet'] . "</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
		;
		if ((($req_event_info['meet'] == NULL) || ($req_event_info['meet'] == '0')) && $req_event_info['location'] != NULL && $req_event_info['location'] != '0') {echo "<hr>";}
		if (($req_event_info['location'] != NULL) && ($req_event_info['location'] != '0') && ($session->logged_in)) {
			echo "Takes place at <span class='tile'>" . $req_event_info['location'] . "</span>";}
			;
		}
		;
		if (($req_event_info['address'] != NULL) && ($req_event_info['address'] != '0') && ($session->logged_in)) {
			echo " (<a href='https://maps.google.com/maps?saddr=W+34th+St,+Los+Angeles,+CA+90007&daddr=" . $req_event_info['address'];
			if ($req_event_info['walk'] > 0) {
				echo "&dirflg=w";
			}
			;
			echo "'>" . $req_event_info['address'] . "</a>)</span>";
		}
		;

# If event is a service event, display the number of service hours it is worth
		if (($req_event_info['type'] == 0) || $req_event_info['type'] == 13) {
			echo "<hr><li><span class='tile'>" . $req_event_info['hours'] . "</span> service hour";
			if ($req_event_info['hours'] == 1) {} else {echo "s";}
			;
			echo "</li>";
		}

# If event is capped (limited to a certain number of attendees), show the cap
		if ($req_event_info['max'] > 0) {
			echo ("<hr><li>Capped at <span class='tile'>" . $req_event_info['max'] . "</span></li>");
		}
		?>
		<?php
# Information about who is driving to the event
		$drivas  = "SELECT SUM(`". TBL_SIGNUPS . "`.drive) as nDrivers, SUM(`". TBL_SIGNUPS . "`.guest) as nGuests, COUNT(`". TBL_SIGNUPS . "`.username) as nAtt FROM `". TBL_SIGNUPS . "` WHERE `". TBL_SIGNUPS . "`.eventid = $req_event";
		$resultD = mysql_query($drivas);
		$rowD = mysql_fetch_array($resultD);
		if ($rowD[nDrivers] > 0 && $req_event_info['walk'] == 0) {
			echo "<hr><li>";
			echo $rowD[nDrivers] . " rides for " . $rowD[nAtt] . " people";
			if ($rowD[nAtt] > $rowD[nDrivers]) {
				echo " &mdash; please sign up to drive!";
			}
			;
			echo "</li>";
		}

# Information about guests coming to the event
		if ($rowD[nGuest] > 0) {
			echo "<hr><li>";
			echo $rowD[nAtt] . " Brothers + " . $rowD[nGuest] . " guests = " . ($rowD[nAtt] + $rowD[nGuest]) . " total attendees";
			echo "</li>";
		}
		?>



 </ul>
</div>
<hr>
<?php
include_once "include/convert_text.php"; // Convert user-submitted plain text and BBCode into HTML
    //Hide event info if not logged in
if (!$session->logged_in) {
	echo "\t\t\t<p><strong>*You must be logged-in in order to view the event info.</strong></p>\n";
} else {
	echo convertText($req_event_info['desc']);
}

    //LOOK HERE U TWAT :D this is where you give permission to take people off events
    //change the username == "cguan" to the person with that position

if ($session->isOfficer()) {
	$q_mailto = "SELECT U.email FROM `" . TBL_SIGNUPS . "` AS S, `" . TBL_USERS . "` AS U WHERE S.eventid = '$req_event' AND S.username = U.username ORDER BY S.timestamp";
	$column = array();
	$result_mailto = $database->query($q_mailto);
	while ($row0 = mysql_fetch_array($result_mailto)) {
		$column[] = $row0['email'];
	}
	$comma_separated = implode(",", $column);
	$comma_separated2 = implode(", ", $column);
	echo " <p class=\"right\">";
	echo " <a href=\"process.php?subdeleteevent=1&amp;event=" . $req_event . "\" title=\"Delete Event\"onclick=\"
	if(confirm('This will delete the event.')); 
// 	confirm('It cannot be undone.'); confirm('Are you really sure you want to do this?'); confirm('No turning back.'); confirm('Think about this. Some people really love " . $req_event_info['name'] . ".'); confirm('You know, I think Myrtle Turtle mentioned something about enjoying " . $eventType[$req_event_info['type']] . " events. Maybe you should reconsider.'); confirm('This is your last chance. Are you sure you want to DELETE this event? This cannot be undone.'); 
	return confirm('Are you sure?');\"> 
	<img src=\"img/cancel.png\" height=\"18\" width=\"18\" alt=\"[Delete]\" /></a> ";
	echo " <a href=\"mailto:apo@usc.edu?subject=" . $req_event_info['name'] . "&bcc=" . $comma_separated . "\" title=\"E-mail All Event Volunteers\"><img src=\"img/gmailedit.png\" height=\"20\" width=\"auto\" alt=\"[E-mail]\" style=\"margin-right:10px;\" /></a>";
	echo "<a href=\"../eboard/edit_event.php?eventid=" . $req_event . "\" title=\"Edit Event Information\"><img src=\"img/edit.png\" height=\"20\" width=\"20\" alt=\"[Edit]\" /></a></p>\n";
	echo "<div class='slide1 right' style='cursor: pointer;'>Show Email Addresses</div>
	<div class='view1'><br />" .
	$comma_separated2
	. "</div>";

    }
/*****************************
DISPLAY LIST OF SIGN UPS
 *****************************/
# User must be logged in to view the signup sheet and comments
if (!$session->logged_in) {
	echo "\t\t\t<p><strong>*You must be logged-in in order to view the sign-up sheet and comments.</strong></p>\n";
}
else if ($session->status == FROZEN_MEMBER){
echo "\t\t\t<p><strong>Your account has been frozen. Please pay your dues in order to sign up for events.</strong></p>\n";
} 
else {
    # These are how signups will be sorted
	$sortorders = array(
		"timestamp" => "timestamp",
		"fname" => "fname",
		"lname" => "lname",
		"drive" => "drive",	
		"weight" => "weight",
	);
	$sortorder_default = "timestamp";
	if (isset($sortorders[$_GET["order"]])) {
		$sortorder = $sortorders[$_GET["order"]];
	} else {
		$sortorder = $sortorder_default;
	}
	$directions = array(
		"up" => "ASC",
		"down" => "DESC",
	);
	$direction = $directions[$ascdesc];
	$sortorder2_default = "timestamp DESC";
	if ($sortorders[$_GET["order"]] == "timestamp") {
		$sortorder2 = "timestamp ASC";
	} else {
		$sortorder2 = $sortorder2_default;
	}
	$ascdesc = ($_GET["sort"] == NULL || $_GET["sort"] == "up") ? "down" : "up";
	$eventMax = $req_event_info['max'];
    $eventCap = ((int) $eventMax > 0 ? " LIMIT " . $eventMax : ""); // Limit the query if the event has a volunteer limit
    $q = "SELECT * FROM (SELECT S.username, U.fname, U.lname, U.status, S.drive, S.lead, S.weight, S.guest, S.timestamp FROM `" . TBL_SIGNUPS . "` AS S, `" . TBL_USERS . "` AS U WHERE S.eventid = '$req_event' AND S.username = U.username AND S.weight > 0 ORDER BY S.timestamp" . $eventCap . ") AS T1 ORDER BY drive DESC, weight DESC, {$sortorder}";
    $result = $database->query($q);
	# If anyone (at least 1 person) has signed up for the event, display the list of signups
if (mysql_num_rows($result) > 0) {
	echo "<hr><span class='topContent'><h4>Attendees</h4></span>";
	echo "<h5>As of " . date('F j', time()) . " at " . date('g:i a', time());
	echo "\t\t\t<table id=\"signupTable\" class=\"pretty\" summary=\"People signed up to attend this event\">\n";
	echo "\t\t\t\t<thead>\n";
	echo "\t\t\t\t\t<tr>\n";
	echo "\t\t\t\t\t\t<th scope=\"col\" style=\"width:1em\">#</th>\n";
	echo "\t\t\t\t\t\t<th class= \"userName\" scope=\"col\"><a href=event_page.php?eventid=$req_event&order=fname&amp;sort=" . $ascdesc . "><span class='bright'>First</span></a>&nbsp;<a href=event_page.php?eventid=$req_event&order=lname&amp;sort=" . $ascdesc . "><span class='bright'>Last</span></th>\n";
	if ($req_event_info['walk'] == 0) {echo "\t\t\t\t\t\t<th scope=\"col\" style=\"width:3em\"><a href=event_page.php?eventid=$req_event&order=drive&amp;sort=" . $ascdesc . "><span class='bright'>Drive?</span></th>\n";} else {echo "\t\t\t\t\t\t<th scope=\"col\" style=\"width:3em; padding-left: 100px\"><a href=event_page.php?eventid=$req_event&order=drive&amp;sort=" . $ascdesc . "></th>\n";}
	;

	echo "\t\t\t\t\t\t<th scope=\"col\" style=\"width:7em\"><a href=event_page.php?eventid=$req_event&order=timestamp&amp;sort=" . $ascdesc . "><span class='bright'>Sign-Up Time</span></a></th>\n";
	if (($session->isOfficer())) {
		echo "\t\t\t\t\t\t<th scope=\"col\" colspan=\"1\"><a href=event_page.php?eventid=$req_event&order=weight&amp;sort=" . $ascdesc . "><span class='bright'>Weight</span></th>\n";
	}
	if (
        //pledge master
        ($session->username == "tamhoang" && ($req_event_info['type'] == 5 || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) || 
        //puncle
        ($session->username == "aaronval" && $req_event_info['type'] == 5) || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) ||
        //puncle
        ($session->username == "anjelict" && $req_event_info['type'] == 5) || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) ||
	//pauntie
	($session->username == "clarecho" && $req_event_info['type'] == 5) || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) ||
        //vp service
        ($session->username == "jutabha" && ($req_event_info['type'] == 7 || $req_event_info['type'] == 0)) ||
        //vps membership
        (($session->username == "alfredot" || $session->username == "samantyl") && ($req_event_info['type'] == 4 || $req_event_info['type'] == 14)) || 
        //vp fellowship
        ($session->username == "mwu20216" && $req_event_info['type'] == 1) || 
        //vps finance
        (($session->username == "qquan" || $session->username == "lntran") && ($req_event_info['type'] == 4 || $req_event_info['type'] == 2)) || 
        //vp comm
        ($session->username == "ggenito" && $req_event_info['type'] == 8) || 
        //ic chair
        ($session->username == "rjtsang" && $req_event_info['type'] == 3) || 
        //special events coord
        ($session->username == "woosarah" && $req_event_info['type'] == 9) || 
        //creative director
        ($session->username == "dayonlee" && $req_event_info['type'] == 8) || 
        //alumni liason
        ($session->username == "leman" && $req_event_info['type'] == 6) || 
        //historian
        ($session->username == "kuloszew" && $req_event_info['type'] == 5) ||
        //philanthropy chairs
        (($session->username == "wahlgren" || $session->username == "bohler") && ($req_event_info['type'] == 7 || $req_event_info['type'] == 0)) ||
        //directors of recruitment
        (($session->username == "ipeng" || $session->username == "mlwang") && ($req_event_info['type'] == 5 || $req_event_info['type'] == 8)) ||
        //alpha fam head
        ($session->username == CURRENT_ALPHA_HEAD && $req_event_info['type'] == 10) ||
        //phi fam head
        ($session->username == CURRENT_PHI_HEAD && $req_event_info['type'] == 11) || 
        //omega fam head
        ($session->username == CURRENT_OMEGA_HEAD && $req_event_info['type'] == 12) ||
     	//Diversity and Inclusion
        ($session->username == "jfu12446" && $req_event_info['type'] == 16) ||
        //sectionals chair
        // ($session->username == CURRENT_SECTIONALS_CHAIR && $req_event_info['type']==9)  || 
	//president
	($session->username == "tkyang") ||
        //webmasters
        ($session->username == "kaiyunhs") || //webmaster (S2017)
        ($session->username == "mvong") || //webmaster (F2016)
        ($session->username == "ryanloui") || //webmaster (HAY LOOK U HAV POWER)
        ($session->username == "yangzigu") || //webmaster (HAY LOOK U HAV POWER)
        ($session->username == "zolotykh") || //webmaster (HAY LOOK U HAV POWER)
        ($session->username == "miaos") || //webmaster (    HAY LOOK U HAV POWER)
        ($session->username == "brendajl") || //webmaster (pls don’t break)
        ($session->username == "jemichel") || //webmaster (pls don’t break pt2)
        ($session->username == "chen284") || // webmaster Yay!
        ($session->username == "jutabha") || // webmaster YEET
        ($session->username == "nickchen") || // webmaster YOTE
	($session->username == "ipeng") || // webmaster YAAAAAAAAAAAAAAAAYEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEET
	($session->username == "kjma") //webmaster :DDDDDD
        //LOOK HERE U TWAT :D this is where you give permission to take people off events
        //new webmasters add yourself here!! ^^
    ) {
		echo "<th>Lead?</th>";
	}
	echo "\t\t\t\t\t</tr>\n";
	echo "\t\t\t\t</thead>\n";
	echo "\t\t\t\t<tbody>\n";
    $i = 0; // Counter used for alternating table row colors
    while ($row = mysql_fetch_array($result)) {
    	$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
    	$volunteer_count = $i + 1;
    	$driver = "";
    	if ((int) $row['drive'] > 0) {
    		$driver = "Yes (" . $row['drive'] . ")";
        } //(int) $row['drive'] > 0
        $lead = "";
        if ((int) $row['lead'] === 1) {
        	if (strcmp($zebra, " class=\"zebra\"") == 0) {
        		$zebra = " class=\"zebra lead\"";
            } //strcmp($zebra, " class=\"zebra\"") == 0
            else {
            	$zebra = " class=\"lead\"";
            }
            $lead = " <strong>(Lead)</strong>";
        }
        $guest = "";
        if ((int) $row['guest'] > 0) {
        	$guest = " <strong>+" . $row['guest'] . "</strong>";
        }
        //(int) $row['lead'] === 1
        echo ("\t\t\t\t\t<tr" . $zebra . ">\n");
        echo ("\t\t\t\t\t\t<td>" . $volunteer_count . "</td>\n");
        echo ("\t\t\t\t\t\t<td><span class='bigger'><a href=\"userinfo.php?user=" . $row['username'] . "\">" . $row['fname'] . "&nbsp;" . $row['lname'] . "</a></span>" . $lead);
        if ((int) $row['guest'] > 0) {echo " <strong>+" . $row['guest'] . "</strong>";}
        ;
        echo ("</td>\n");
        if ($req_event_info['walk'] == 0) {
        	echo ("<td>" . $driver . "</td>");
        } else {
        	echo ("<td></td>");
        }

        echo "<td>" . date("M j", $row['timestamp']) . "<br />" . date("g:i", $row['timestamp']) . "&nbsp;" . date("a", $row['timestamp']) . "</td>";
        if ($session->isOfficer() || $session->isFakeOfficer()) {
        	if (                        //pledge master
                ($session->username == CURRENT_PLEDGE_MASTER && ($req_event_info['type'] == 5 || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) || 
                //puncle
                ($session->username == CURRENT_PLEDGE_UNCLE && $req_event_info['type'] == 5) ||
                //pauntie
                ($session->username == CURRENT_PLEDGE_AUNT && $req_event_info['type'] == 5) ||
                //vp service
                ($session->username == CURRENT_VP_SERVICE && ($req_event_info['type'] == 7 || $req_event_info['type'] == 0)) ||
                //vps membership
                (($session->username == CURRENT_VP_MEMBERSHIP1 || $session->username == CURRENT_VP_MEMBERSHIP2) && ($req_event_info['type'] == 4 || $req_event_info['type'] == 14)) || 
                //vp fellowship
                ($session->username == CURRENT_VP_FELLOWSHIP && $req_event_info['type'] == 1) || 
//pledge master
        ($session->username == "tamhoang" && ($req_event_info['type'] == 5 || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) || 
        //puncle
        ($session->username == "aaronval" && $req_event_info['type'] == 5) || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) ||
        //puncle
        ($session->username == "anjelict" && $req_event_info['type'] == 5) || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) ||
	//pauntie
	($session->username == "clarecho" && $req_event_info['type'] == 5) || $req_event_info['type'] == 9 || $req_event_info['type'] == 14)) ||
        //vp service
        ($session->username == "jutabha" && ($req_event_info['type'] == 7 || $req_event_info['type'] == 0)) ||
        //vps membership
        (($session->username == "alfredot" || $session->username == "samantyl") && ($req_event_info['type'] == 4 || $req_event_info['type'] == 14)) || 
        //vp fellowship
        ($session->username == "mwu20216" && $req_event_info['type'] == 1) || 
        //vps finance
        (($session->username == "qquan" || $session->username == "lntran") && ($req_event_info['type'] == 4 || $req_event_info['type'] == 2)) || 
        //vp comm
        ($session->username == "ggenito" && $req_event_info['type'] == 8) || 
        //ic chair
        ($session->username == "rjtsang" && $req_event_info['type'] == 3) || 
        //special events coord
        ($session->username == "woosarah" && $req_event_info['type'] == 9) || 
        //creative director
        ($session->username == "dayonlee" && $req_event_info['type'] == 8) || 
        //alumni liason
        ($session->username == "leman" && $req_event_info['type'] == 6) || 
        //historian
        ($session->username == "kuloszew" && $req_event_info['type'] == 5) ||
        //philanthropy chairs
        (($session->username == "wahlgren" || $session->username == "bohler") && ($req_event_info['type'] == 7 || $req_event_info['type'] == 0)) ||
        //directors of recruitment
        (($session->username == "ipeng" || $session->username == "mlwang") && ($req_event_info['type'] == 5 || $req_event_info['type'] == 8)) ||
        //alpha fam head
        ($session->username == CURRENT_ALPHA_HEAD && $req_event_info['type'] == 10) ||
        //phi fam head
        ($session->username == CURRENT_PHI_HEAD && $req_event_info['type'] == 11) || 
        //omega fam head
        ($session->username == CURRENT_OMEGA_HEAD && $req_event_info['type'] == 12) ||
     	//Diversity and Inclusion
        ($session->username == "jfu12446" && $req_event_info['type'] == 16) ||
        //sectionals chair
        // ($session->username == CURRENT_SECTIONALS_CHAIR && $req_event_info['type']==9)  || 
	//president
	($session->username == "tkyang") ||
        //webmasters
        ($session->username == "kaiyunhs") || //webmaster (S2017)
        ($session->username == "mvong") || //webmaster (F2016)
        ($session->username == "ryanloui") || //webmaster (HAY LOOK U HAV POWER)
        ($session->username == "yangzigu") || //webmaster (HAY LOOK U HAV POWER)
        ($session->username == "zolotykh") || //webmaster (HAY LOOK U HAV POWER)
        ($session->username == "miaos") || //webmaster (    HAY LOOK U HAV POWER)
        ($session->username == "brendajl") || //webmaster (pls don’t break)
        ($session->username == "jemichel") || //webmaster (pls don’t break pt2)
        ($session->username == "chen284") || // webmaster Yay!
        ($session->username == "jutabha") || // webmaster YEET
        ($session->username == "nickchen") || // webmaster YOTE
	($session->username == "ipeng") || // webmaster YAAAAAAAAAAAAAAAAYEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEET
	($session->username == "kjma") //webmaster :DDDDDD
        //LOOK HERE U TWAT :D this is where you give permission to take people off events
        //new webmasters add yourself here!! ^^
    )
			{
				echo ("\t\t\t\t\t\t<td style=\"width:40em\">" . round($row['weight'], 2)) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				if ($req_event_info['type'] == 0) {
					echo ("<a href=\"process.php?subflake=1&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "\" title=\"Flake\" onclick=\"return confirm('Are you sure you want to FLAKE " . $row['fname'] . " " . $row['lname'] . "?');\">&ndash;&frac12;</a>");
				} else {
					echo ("<a href=\"process.php?subflakeother=1&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "\" title=\"Flake\" onclick=\"return confirm('Are you sure you want to FLAKE " . $row['fname'] . " " . $row['lname'] . "?');\">-1</a>");
				};
				echo "&nbsp;&nbsp;<a href=\"process.php?subdeletesignup=1&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "\" title=\"Remove Volunteer\" onclick=\"return confirm('Are you sure you want to REMOVE " . $row['fname'] . " " . $row['lname'] . "?');\">0</a>&nbsp;&nbsp;<a href=\"process.php?subweighthalf=1&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "\" title=\"Modify Credit\" onclick=\"return confirm('Are you sure you want to give HALF CREDIT to " . $row['fname'] . " " . $row['lname'] . "?');\">&frac12;</a>&nbsp;&nbsp;<a href=\"process.php?subweightnormal=1&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "\" title=\"Modify Credit\" onclick=\"return confirm('Are you sure you want to give NORMAL CREDIT to " . $row['fname'] . " " . $row['lname'] . "?');\">1</a>&nbsp;&nbsp;<a href=\"process.php?subweightdouble=1&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "\" title=\"Modify Credit\" onclick=\"return confirm('Are you sure you want to give DOUBLE CREDIT to " . $row['fname'] . " " . $row['lname'] . "?');\">2</a></td>";
				if ($row['status'] == 1) {
					echo "<td><a href=\"process.php?sublead=1&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "&amp;lead=1\" title=\"Change Lead\" onclick=\"return confirm('Are you sure you want to take lead for this event?');\">Yes</a><br /><a href=\"process.php?sublead=0&amp;event=" . $req_event . "&amp;user=" . $row['username'] . "&amp;lead=0\" title=\"Change Lead\" onclick=\"return confirm('Are you sure you want to NOT take lead for this event?');\">No</a></td>";
				} else {
					echo "<td></td>";
				};
	        } // end if session == ... and username == "..." if statement
	        else {echo "\t\t\t\t\t\t<td>" . round($row['weight'], 2);};
	    } else {};
	    echo ("\t\t\t\t\t</tr>\n");
	    $i++;
	} //$row = mysql_fetch_array($result)

	# Display information about the waitlist
    if ($eventMax > 0 && mysql_num_rows($result) == $eventMax) {
    	$num_columns = 4;
    	if ($session->isOfficer()) {$num_columns = 6;}
    	echo ("\t\t\t\t\t<tr><td colspan=\"" . $num_columns . "\" class=\"waitlist\">Waitlist</td></tr>\n");
    	$q2 = "SELECT S.username, U.fname, U.lname, S.drive, S.lead, S.timestamp, S.weight FROM `" . TBL_SIGNUPS . "` AS S, `" . TBL_USERS . "` AS U WHERE ( (S.eventid = '$req_event' AND S.username = U.username) ) ORDER BY S.timestamp LIMIT {$eventMax}, 500";
    	$result2 = $database->query($q2);
        $j = (int) $eventMax; // Counter used for alternating table row colors
        while ($row2 = mysql_fetch_array($result2)) {
        	$zebra = ($j % 2 == 0) ? " class=\"zebra\"" : "";
        	$volunteer_count = $j + 1;
        	if ($session->username == $row2['username']) {$global_vol = $volunteer_count;}
        	;
        	$driver = "";
        	if ((int) $row2['drive'] > 0) {
        		$driver = "Yes (" . $row2['drive'] . ")";
            } //(int) $row['drive'] > 0
            echo ("\t\t\t\t\t<tr" . $zebra . ">\n");
            echo ("\t\t\t\t\t\t<td>" . $volunteer_count . "</td>\n");
            echo ("\t\t\t\t\t\t<td><a href=\"userinfo.php?user=" . $row2['username'] . "\">" . $row2['fname'] . "</a>");
            echo (" <a href=\"userinfo.php?user=" . $row2['username'] . "\">" . $row2['lname'] . "</a></td>\n");
            echo ("\t\t\t\t\t\t<td>" . $driver . "</td>\n");
            echo ("\t\t\t\t\t\t<td>" . date("M j g:i a", $row2['timestamp']) . "</td>\n");
            if ($session->isOfficer()) {
            	echo ("\t\t\t\t\t\t<td colspan=2><a href=\"process.php?subdeletesignup=1&amp;event=" . $req_event . "&amp;user=" . $row2['username'] . "\" title=\"Remove Volunteer\" onclick=\"return confirm('Are you sure you want to remove " . $row2['fname'] . " " . $row2['lname'] . "?');\"><img src=\"img/canceltransparent.png\" height=\"20\" width=\"20\" alt=\"Delete\" /></a></td>\n");
            }
            echo ("\t\t\t\t\t</tr>\n");

            $j++;
        } //$row2 = mysql_fetch_array($result2)
    } //$eventMax > 0 && mysql_num_rows($result) == $eventMax

	# Officers have access to additional options
    if ($session->isOfficer() && $eventMax > 0 && mysql_num_rows($result) == $eventMax) {
    	$num_columns = 6;
    	echo ("\t\t\t\t\t<tr><td colspan=\"" . $num_columns . "\" class=\"waitlist\">Flakes</td></tr>\n");
    	$q3 = "SELECT S.username, U.fname, U.lname, S.drive, S.lead, S.timestamp, S.weight FROM `" . TBL_SIGNUPS . "` AS S, `" . TBL_USERS . "` AS U WHERE ( (S.eventid = '$req_event' AND S.username = U.username) AND S.weight < 0) ORDER BY S.weight DESC";
    	$result3 = $database->query($q3);
        $j = (int) $eventMax; // Counter used for alternating table row colors
        while ($row3 = mysql_fetch_array($result3)) {
        	$zebra = ($j % 2 == 0) ? " class=\"zebra\"" : "";
        	$volunteer_count = $j + 1;
        	$driver = "";
        	if ((int) $row3['drive'] > 0) {
        		$driver = "Yes (" . $row3['drive'] . ")";
            } //(int) $row['drive'] > 0
            echo ("\t\t\t\t\t<tr" . $zebra . ">\n");
            echo ("\t\t\t\t\t\t<td>" . $volunteer_count . "</td>\n");
            echo ("\t\t\t\t\t\t<td><a href=\"userinfo.php?user=" . $row3['username'] . "\">" . $row3['fname'] . "</a>");
            echo (" <a href=\"userinfo.php?user=" . $row3['username'] . "\">" . $row3['lname'] . "</a></td>\n");
            echo ("\t\t\t\t\t\t<td>" . $driver . "</td>\n");
            echo ("\t\t\t\t\t\t<td>" . date("M j g:i a", $row3['timestamp']) . "</td>\n");
            if ($session->isOfficer() || $session->isFakeOfficer()) {
            	if (
					($session->position == 1 && $req_event_info['type'] == 7) ||

					($session->position == 2 && $req_event_info['type'] == 0) ||

					($session->position == 3 && $req_event_info['type'] == 4) ||
					($session->position == 3 && $req_event_info['type'] == 10) ||
					($session->position == 3 && $req_event_info['type'] == 11) ||
					($session->position == 3 && $req_event_info['type'] == 12) ||
					($session->position == 3 && $req_event_info['type'] == 6) ||

					($session->position == 4 && $req_event_info['type'] == 1) ||

					($session->position == 5 && $req_event_info['type'] == 2) ||

					($session->position == 6 && $req_event_info['type'] == 8) ||
					($session->position == 7 && $req_event_info['type'] == 2) ||

					($session->position == 8 && $req_event_info['type'] == 3) ||
					($session->position == 8 && $req_event_info['type'] == 1) ||

					($session->position == 9 && $req_event_info['type'] == 3) ||
					($session->position == 9 && $req_event_info['type'] == 9) ||
					($session->position == 9 && $req_event_info['type'] == 13) ||

					($session->position == 10 && $req_event_info['type'] == 5) ||
					($session->position == 10 && $req_event_info['type'] == 9) ||

					($session->position == 11 && $req_event_info['type'] == 6) ||
					($session->position == 11 && $req_event_info['type'] == 8) ||

					($session->position == 12 && $req_event_info['type'] == 6) ||

					($session->position == 13 && $req_event_info['type'] == 2) ||

					($session->position == 15 && $req_event_info['type'] == 4) ||

					($session->position == 16) ||

					($session->position == 17 && $req_event_info['type'] == 0) ||
					($session->position == 17 && $req_event_info['type'] == 7) ||

					($session->position == 18) ||

					($session->position == 19 && $req_event_info['type'] == 7) ||
					($session->position == 19 && $req_event_info['type'] == 9) ||

					($session->position == 20 && $req_event_info['type'] == 3) ||
					($session->position == 20 && $req_event_info['type'] == 9) ||
					($session->position == 20 && $req_event_info['type'] == 13) ||

					($session->position == 21 && $req_event_info['type'] == 7) ||

					($session->position == 22 && $req_event_info['type'] == 0) ||

					($session->position == 23 && $req_event_info['type'] == 1) ||

					($session->position == 24 && $req_event_info['type'] == 2) ||

					($session->position == 33 && $req_event_info['type'] == 16) ||

					(($session->position >= 25 || $session->position <= 28) && $req_event_info['type'] == 7)
				) {
            		echo ("\t\t\t\t\t\t<td colspan=2>" . round($row3['weight'], 2)) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            		if ($req_event_info['type'] == 0) {
            			echo ("<a href=\"process.php?subflake=1&amp;event=" . $req_event . "&amp;user=" . $row3['username'] . "\" title=\"Flake\" onclick=\"return confirm('Are you sure you want to FLAKE " . $row3['fname'] . " " . $row3['lname'] . "?');\">-&frac12;</a>");
            		} else {
            			echo ("<a href=\"process.php?subflakeother=1&amp;event=" . $req_event . "&amp;user=" . $row3['username'] . "\" title=\"Flake\" onclick=\"return confirm('Are you sure you want to FLAKE " . $row3['fname'] . " " . $row3['lname'] . "?');\">-1</a>");}
            		;
            		echo ("&nbsp;&nbsp;<a href=\"process.php?subdeletesignup=1&amp;event=" . $req_event . "&amp;user=" . $row3['username'] . "\" title=\"Remove Volunteer\" onclick=\"return confirm('Are you sure you want to REMOVE " . $row3['fname'] . " " . $row3['lname'] . "?');\">0</a>&nbsp;&nbsp;<a href=\"process.php?subweighthalf=1&amp;event=" . $req_event . "&amp;user=" . $row3['username'] . "\" title=\"Modify Credit\" onclick=\"return confirm('Are you sure you want to give HALF CREDIT to " . $row3['fname'] . " " . $row3['lname'] . "?');\">&frac12;</a>&nbsp;&nbsp;<a href=\"process.php?subweightnormal=1&amp;event=" . $req_event . "&amp;user=" . $row3['username'] . "\" title=\"Modify Credit\" onclick=\"return confirm('Are you sure you want to give NORMAL CREDIT to " . $row3['fname'] . " " . $row3['lname'] . "?');\">1</a>&nbsp;&nbsp;<a href=\"process.php?subweightdouble=1&amp;event=" . $req_event . "&amp;user=" . $row3['username'] . "\" title=\"Modify Credit\" onclick=\"return confirm('Are you sure you want to give DOUBLE CREDIT to " . $row3['fname'] . " " . $row3['lname'] . "?');\">2</a></td>"
            	);
            	} else {echo "\t\t\t\t\t\t<td>" . round($row['weight'], 2);}
            	;
            }
            ;
            echo ("\t\t\t\t\t</tr>\n");
            $j++;
        } //$row2 = mysql_fetch_array($result2)
    } //$eventMax > 0 && mysql_num_rows($result) == $eventMax
    echo "\t\t\t\t</tbody>\n";
    echo "\t\t\t</table>\n";
}

if ($database->waitlisted) {
	echo "WAITLISTED";
}
;

echo "<span class='topContent'><span id='eventDetails'>";
// If user is already signed up for event, display flake policy

# Allows user to edit how many people they are driving
        if (($database->signedUp($req_event, $session->username)) && (strtotime($req_event_info['start']) > (time()))) {
        	echo "<hr><ul><li>I Can Drive...
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=0\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 0 for this event?');\">0</a>
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=1\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 1 for this event?');\">1</a>
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=2\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 2 for this event?');\">2</a>
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=3\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 3 for this event?');\">3</a>
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=4\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 4 for this event?');\">4</a>
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=5\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 5 for this event?');\">5</a>
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=6\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 6 for this event?');\">6</a>
        	<a href=\"process.php?subdrive=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;drive=7\" title=\"Change Driving\" onclick=\"return confirm('Are you sure you want to change your driving to 7 for this event?');\">7</a>
        	(including myself)</li></ul>";
        }

# Allows user to edit whether they are bringing a guest or not
        if (($database->signedUp($req_event, $session->username)) && (strtotime($req_event_info['start']) > (time())) && ($req_event_info['type'] == 9)) {
        	echo "<li>I Will Bring A Guest:
        	<a href=\"process.php?subguest=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;guest=1\" title=\"Bring A Guest\" onclick=\"return confirm('Are you sure you want to take bring a guest to this event?');\">Yes</a>
        	<a href=\"process.php?subguest=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;guest=0\" title=\"Do Not Bring A Guest\" onclick=\"return confirm('Are you sure you do NOT want to bring a guest for this event?');\">No</a></li>";
        }

# Allows pledges to take or un-take lead after signing up
        if (($database->signedUp($req_event, $session->username)) && (strtotime($req_event_info['start']) > (time())) && ($session->status == PLEDGE_MEMBER)) {
        	echo "<li>I Will Take Lead:
        	<a href=\"process.php?sublead=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;lead=1\" title=\"Change Lead\" onclick=\"return confirm('Are you sure you want to take lead for this event?');\">Yes</a>
        	<a href=\"process.php?sublead=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "&amp;lead=0\" title=\"Change Lead\" onclick=\"return confirm('Are you sure you want to NOT take lead for this event?');\">No</a></li>";
        }

# Allows user to delete their own signup if it's at least 72 hours before the event start time
        if (($database->signedUp($req_event, $session->username)) && (strtotime($req_event_info['start']) > (259200 + time()))) {
        	echo "<li><a href=\"process.php?subdeletesignup=1&amp;event=" . $req_event . "&amp;user=" . $session->username . "\" title=\"Remove Volunteer\" onclick=\"return confirm('Are you sure you want to cancel your sign up for this event?');\">Cancel My Sign-Up for This Event</a> (" . round((((strtotime($req_event_info['start']) - (time())) / 3600) - 72), 0) . " Hours Left to Cancel My Own Sign-Up)</li></ul></span></span><hr />";
# If it's between 72 and 24 hours before the event starts (meaning the user will have to email an officer to be removed)
        } else if (($database->signedUp($req_event, $session->username)) && (strtotime($req_event_info['start']) > (86400 + time())) && (strtotime($req_event_info['start']) < (259200 + time()))) {
        	echo ("<p class=\"small\">Note: If you would like to be removed from the sign-up list, you have " . round((((strtotime($req_event_info['start']) - (time())) / 3600) - 24), 0) . " hours to submit your request by e&#8209;mail to the officer in charge of this event. Otherwise, the event hours/credit will be deducted from your semester total.</p>\n");
        	echo ("</span></span><hr />");
# If it's within 24 hours of the event start (meaning it's too late to cancel attendance)
        } else if (($database->signedUp($req_event, $session->username)) && (strtotime($req_event_info['start']) > time()) && (strtotime($req_event_info['start']) < (86400 + time()))) {
        	echo ("<p class=\"small\">Note: You are signed up for this event and are expected to attend. The deadline to cancel your sign-up has passed. If you would like to cancel your sign-up, please email the officer in charge of this event and you will receive a flake.</p>\n");
        	echo ("</span></span><hr />");
# If the event has already passed
        } else if (($database->signedUp($req_event, $session->username)) && (strtotime($req_event_info['start']) < time())) {
        	echo ("<p class=\"small\">Note: This event has already passed. This list indicates that you signed up. If you did not, you must submit your request for a correction by e&#8209;mail to the officer in charge of this event.</p>\n");
        	echo ("</span></span><hr />");
        }
# If user is an alumni, do not display sign up form
        else if ($session->status == ALUMNI_MEMBER || $session->status == INACTIVE_MEMBER) {
        	echo ("</span></span><hr />");
        }
# If user is frozen, do not display sign up form and display a warning message
        else if ($session->status == FROZEN_MEMBER) {
        	echo "<p><strong>Your account has been frozen. Please pay your dues in order to sign up for events.</strong></p></span></span><hr />";
        } else if (
        	(($aphio['family'] == 1) && (($eventType[$req_event_info['type']] == "Alpha Family") || ($eventType[$req_event_info['type']] == "Omega Family")))
        	||
        	(($aphio['family'] == 0) && (($eventType[$req_event_info['type']] == "Phi Family") || ($eventType[$req_event_info['type']] == "Omega Family")))
        	||
        	(($aphio['family'] == 2) && (($eventType[$req_event_info['type']] == "Phi Family") || ($eventType[$req_event_info['type']] == "Alpha Family")))
        ) {
        	echo "\t\t\t<p><strong>Go back to your own family!!</strong></p></span></span><hr />";
        }
//$session->status == ALUMNI_MEMBER

// Only allow people to sign up if it's at least 24 hours before the start time
        // This was changed on February 19, 2014 by Casey Penk; per direction from Patrick Vossler and Christina Stewart
        // Show sign up form
        // else if ((strtotime($req_event_info['start']) - 86400) > time())
        else if (strtotime($req_event_info['start']) > time()) {
        	?>
        </span></span><form action="process.php" method="post">
        	<fieldset>

        		<ol>
        			<li>
        				<label for="sel_Name">Name</label>
        				<select name="sel_Name" id="sel_Name">
        					<?php
        					$q = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `status` <> " . FROZEN_MEMBER . "  AND `username` <> \"admin\" ORDER BY `lname`";
        					$retval = $database->query($q);
        					while ($row = mysql_fetch_array($retval)) {
        						if (strcmp($row['username'], $session->username) == 0) {
        							echo ("\t<option value=\"" . $row['username'] . "\"" . $selected . ">" . $row['lname'] . ", " . $row['fname'] . " (" . $row['username'] . ")</option>\n");
        						}
        					}
        					?>
        				</select>
        			</li>
        			<?php
        			if ($req_event_info['walk'] == 0) {echo "
        			<li>
        			<label for='txt_Drive'><span class='bigg'>Drive?</span></label>
        			<input id='txt_Drive' name='txt_Drive' type='text' value='0' maxlength='2' class='box' style='width:2em' />
        			(0 if you can't; otherwise indicate number, including self)" . $form->error("txt_Drive") . "
        			</li>";} else {echo "<input type='hidden' id='txt_Drive' name='txt_Drive' value=0 />";}
        			;

        			if ($req_event_info['type'] == 9) {echo "
        			<li>
        			<label for='txt_Guest'><span class='bigg'>Guests</span></label>
        			<input id='txt_Guest' class='box' name='txt_Guest' type='text' value='0' maxlength='2' style='width:2em' />
        			(0 if you aren't bringing any; otherwise indicate the number of guests)
        			<?php echo $form->error('txt_Drive'); ?>
        			</li>";} else {echo "<input type='hidden' id='txt_Guest' name='txt_Guest' value=0 />";}
        			;

        			if ($session->status == PLEDGE_MEMBER) {
        				echo "<li>\n";
        				echo "	<label for=\"chk_Lead\"><span class='bigg'>Take Lead</span></label>\n";
        				echo "	<input type=\"checkbox\" id=\"chk_Lead\" name=\"chk_Lead\" />\n";
        				echo "</li>\n";
            } //$session->status == PLEDGE_MEMBER
            echo "<li><button type='submit' class='button'";
            if ($rowD['nAtt'] >= $req_event_info['max'] && $req_event_info['max'] != 0) {
            	echo " onclick=\"return confirm('This event is currently full. If you sign up you will be added to the waitlist. You must be prepared to attend in the case that current attendees drop, or the cap is increased.');\">Sign Up for Wailist";} else {
            		echo ">Sign Up!";
            	}
            	;
            	echo "</button></li>";
            	?>
            </ol>
            <input type="hidden" id="eventID" name="eventID" value="<?php echo $req_event; ?>" />
            <input type="hidden" id="weight" name="weight" value=1 />
            <input type="hidden" id="subcontactus" name="subreminder" value="1" />
            <input type="hidden" id="subeventsignup" name="subeventsignup" value="1" />
        </fieldset>
    </form>
    <?php
} else {
	echo "<br />This event has already passed. If you forgot to sign up, please contact the respective officer.</span></span>";
}
;
if (

	($session->position == 1 && $req_event_info['type'] == 7) ||

	($session->position == 2 && $req_event_info['type'] == 0) ||

	($session->position == 3 && $req_event_info['type'] == 4) ||
	($session->position == 3 && $req_event_info['type'] == 10) ||
	($session->position == 3 && $req_event_info['type'] == 11) ||
	($session->position == 3 && $req_event_info['type'] == 12) ||
	($session->position == 3 && $req_event_info['type'] == 6) ||

	($session->position == 4 && $req_event_info['type'] == 1) ||

	($session->position == 5 && $req_event_info['type'] == 2) ||

	($session->position == 6 && $req_event_info['type'] == 8) ||
	($session->position == 7 && $req_event_info['type'] == 2) ||

	($session->position == 8 && $req_event_info['type'] == 3) ||
	($session->position == 8 && $req_event_info['type'] == 1) ||

	($session->position == 9 && $req_event_info['type'] == 3) ||
	($session->position == 9 && $req_event_info['type'] == 9) ||
	($session->position == 9 && $req_event_info['type'] == 13) ||

	($session->position == 10 && $req_event_info['type'] == 5) ||
	($session->position == 10 && $req_event_info['type'] == 9) ||

	($session->position == 11 && $req_event_info['type'] == 6) ||
	($session->position == 11 && $req_event_info['type'] == 8) ||

	($session->position == 12 && $req_event_info['type'] == 6) ||

	($session->position == 13 && $req_event_info['type'] == 2) ||

	($session->position == 15 && $req_event_info['type'] == 4) ||

	($session->position == 16) ||

	($session->position == 17 && $req_event_info['type'] == 0) ||
	($session->position == 17 && $req_event_info['type'] == 7) ||

	($session->position == 18) ||

	($session->position == 19 && $req_event_info['type'] == 7) ||
	($session->position == 19 && $req_event_info['type'] == 9) ||

	($session->position == 20 && $req_event_info['type'] == 3) ||
	($session->position == 20 && $req_event_info['type'] == 9) ||
	($session->position == 20 && $req_event_info['type'] == 13) ||

	($session->position == 21 && $req_event_info['type'] == 7) ||

	($session->position == 22 && $req_event_info['type'] == 0) ||

	($session->position == 23 && $req_event_info['type'] == 1) ||

	($session->position == 24 && $req_event_info['type'] == 2) ||

	($session->position == 33 && $req_event_info['type'] == 16) ||

	(($session->position >= 25 || $session->position <= 28) && $req_event_info['type'] == 7)
	||
	$session->username == "kjma" // webmaster
) {
	/*************** SIGN UP FOR THE EVENT ***************/
	?>
	<form action='process.php' method='post'>
		<fieldset>
			<ol>
				<li>
					<label for='sel_Name'><span class='bigg'>Name</span></label>
					<select name='sel_Name' id='sel_Name'>";
						<?php
						$q = "SELECT * FROM `" . TBL_USERS . "` WHERE `status` <> " . ALUMNI_MEMBER . " AND `status` <> " . FROZEN_MEMBER . " AND `username` <> \"admin\" ORDER BY `lname`";
						$retval = $database->query($q);
						while ($row = mysql_fetch_array($retval)) {

							if (!$database->signedUp($req_event, $row['username'])) {
								echo ("\t\t\t\t\t\t\t\t<option value=\"" . $row['username'] . "\"$selected>" . $row['lname'] . ", " . $row['fname'] . " (" . $row['username'] . ")</option>\n");
							}
						}
						;
						echo "
						</select>
						</li>
						<li>
						<label for='txt_Drive'><span class='bigg'>Drive?</span></label>
						<input id='txt_Drive' name='txt_Drive' class='box' type='text' value='0' maxlength='2' style='width:2em' />
						(0 if they can't, otherwise indicate number, including them)";
						echo $form->error("txt_Drive");
						echo "
						</li>";

# Pledges can sign up to take lead
						if ($session->status == PLEDGE_MEMBER) {
							echo "<li>\n";
							echo "	<label for=\"chk_Lead\"><span class='bigg'>Take Lead</span></label>\n";
							echo "	<input type=\"checkbox\" id=\"chk_Lead\" name=\"chk_Lead\" />\n";
							echo "</li>\n";
            } //$session->status == PLEDGE_MEMBER

# Special events allow people to bring guests
            if ($req_event_info['type'] == 9) {
            	echo "
            	<li>
            	<label for='txt_Guest'><span class='bigg'>Guests</span></label>
            	<input id='txt_Guest' class='box' name='txt_Guest' type='text' value='0' maxlength='2' style='width:2em' />
            	(0 if they aren't bringing any; otherwise indicate the number of guests)
            	<?php echo $form->error('txt_Drive'); ?>
            	</li>";
            } else {
            	echo "<input type='hidden' id='txt_Guest' name='txt_Guest' value=0 />";
            }
            ;

            echo "<li><button type='submit' class='button' onclick=\"return confirm('You are NOT signing up yourself! Are you sure you want to sign up the selected user?');\">Sign Up ***SELECTED*** User</button></li>
            </ol>
            <input type='hidden' id='eventID' name='eventID' value='<?php echo $req_event; ?>' />
            <input type='hidden' id='weight' name='weight' value=1 />
            <input type='hidden' id='subeventsignup' name='subeventsignup' value='1' />
            </fieldset>
            </form>";

        }
        ;
        /*************** ADD TO GOOGLE CALENDAR *********************/
# Add to Google Calendar Button
# Authors: Kevin Chen, Nick Chen
        //echo "<button type='submit' class='button'";
# get name, description, location of the event
# convert the special characters to url-compatible
        $eventName = urlencode($req_event_info['name']);
        $eventDesc = urlencode($req_event_info['desc']);
        $eventLoc = urlencode($req_event_info['location']);
        $eventStart = $req_event_info['start'];
        $eventEnd = $req_event_info['end'];
# convert the event times to Google Calendar-compatible format
# this includes characters T and Z in the string (\T, \Z)
        $eventStart = gmdate("Ymd\THis\Z", strtotime($eventStart));
        $eventEnd = gmdate("Ymd\THis\Z", strtotime($eventEnd));
        echo "<a href='https://www.google.com/calendar/render?action=TEMPLATE&text=$eventName&dates=$eventStart/$eventEnd&details=$eventDesc&location=$eventLoc&sf=true&output=xml' 
		rel='external' title='Add to your google calendar'><img src='../img/google-calendar--v1.png' height='64' width='64' 
		alt='Gcal' /></a>";
	echo "<a href='https://www.google.com/calendar/render?action=TEMPLATE&text=$eventName&dates=$eventStart/$eventEnd&details=$eventDesc&location=$eventLoc&sf=true&output=xml');
        \"><strong><p style='font-size: 20px;'>Click here to add event to Google Calendar</strong></p></a>";
	
        /*************** USER COMMENTS *********************/
# Display the current list of comments

        ?>

        <script type="text/javascript" >
//ALLOWS DELETE COMMENT BUTTON TO WORK

$(function() {

	$(".delbutton").click(function() {
		var del_id = $(this).attr("id");
		var info = 'id=' + del_id;
		if (confirm("Sure you want to delete your comment? This cannot be undone later.")) {
			$.ajax({
				type : "POST",
                        url : "delete_entry.php", //URL to the delete php script
                        data : info,
                        success : function() {
                        }
                    });
			window.location.reload();
		}
		return false;
	});

});
</script>

<?php

$q = "SELECT C.ID, C.username, C.comment, U.fname, U.lname, C.timestamp FROM `" . TBL_COMMENTS . "` AS C, `" . TBL_USERS . "` AS U WHERE C.eventid = " . $req_event . " AND C.username = U.username ORDER BY C.timestamp ASC";
$result = $database->query($q);
# Only build a table for the comments if there are any comments to display
if (mysql_num_rows($result) > 0) {
	echo "<span class='topContent'><h4>Comments</h4></span>";
	echo "\t\t\t<table id=\"commentTable\" class=\"pretty\">\n";
	echo "\t\t\t\t<thead>\n";
	echo "\t\t\t\t\t<tr>\n";
	echo "\t\t\t\t\t\t<th scope=\"col\" style=\"width:25%\">Name</th>\n";
	echo "\t\t\t\t\t\t<th scope=\"col\">Comment</th>\n";
	echo "\t\t\t\t\t\t<th scope=\"col\" style=\"width:7em\">Time</th>\n";
	echo "\t\t\t\t\t</tr>\n";
	echo "\t\t\t\t</thead>\n";
	echo "\t\t\t\t<tbody>\n";
            $i = 0; // Counter for alternating table row colors
            while ($row = mysql_fetch_array($result)) {
            	$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
            	echo "\t\t\t\t\t<tr" . $zebra . ">\n";
            	echo "\t\t\t\t\t\t<td>" . $row['fname'] . " " . $row['lname'] .

            	"</td>\n";
            	echo "\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t" . convertText($row['comment']);

            	/*DELETE COMMENT BUTTON STUFF*/

            	if ($session->username == $row['username']) {

            		$id = (int) $row[ID];
            		?>

            		<button id="<?php echo $row[ID]; ?>" class="delbutton">Delete Comment</button>

            		<?php

            		if (isset($_POST["delete"])) {
            			echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
            		}
            	}

//edit ends here

            	echo "\t\t\t\t\t\t</td>\n";

            	echo "\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t" . date("M j g:i a", $row['timestamp']) . "\t\t\t\t\t\t</td>\n";
            	echo "\t\t\t\t\t</tr>\n";
            	$i++;
            }
        }
        echo "\t\t\t\t</tbody>\n";
        echo "\t\t\t</table>\n";
    }

# If the user just left a comment
    if (isset($_SESSION['addcomment'])) {
    	unset($_SESSION['addcomment']);
    	echo "<p>Comment added successfully!</p>";
    } else if ($session->status == FROZEN_MEMBER || $session->status == INACTIVE_MEMBER) {
        # Frozen members and inactive members cannot leave comments
    } else {
        # This is the area where the user can leave comments about the event
    	?>
    	<form action="process.php" method="post">
    		<fieldset>
    			<ol>
    				<li class="formatting">
    					<label for="txtarea_CommentBox"><span class="bigg">Comment</span></label><?php echo $form->error("txtarea_CommentBox"); ?>
    					<textarea id="txtarea_CommentBox" name="txtarea_CommentBox" cols="60" rows="3"><?php echo $form->value("txtarea_CommentBox"); ?></textarea>
    				</li>
    				<li>
    					<button type="submit" class="button">Add Comment</button>
    				</li>
    				<div class="slide1" style="cursor: pointer;"><li><p>Formatting Tags (Click to Show)</p></li></div>
    				<div class="view1">
    					<ul>
    						<li>[b] <strong>Enter your bold text here</strong> [/b]</li>
    						<li>[i] <em>Enter your italicized text here</em> [/i]</li>
    						<li>[u] <span class="underlined">Enter your underlined text here</span> [/u]</li>
    						<li>[url=http://www.apousc.org] <a href="/">Enter your URL title here</a> [/url]</li>
    						<li>[list]<ul><li>[item] Enter your bulleted list items here... [/item]</li><li>[item] ...And here. [/item]</li></ul>[/list]</li>
    						<li>[numbered]<ol><li>[item] Enter your numbered list items here... [/item]</li><li>[item] ...And here. [/item]</li></ol>[/numbered]</li>
    					</ul>
    				</div>
    			</ol>
    			<input type="hidden" id="comment_username" name="comment_username" value="<?php echo $session->username; ?>" />
    			<input type="hidden" id="comment_eventid" name="comment_eventid" value="<?php echo $req_event; ?>" />
    			<input type="hidden" id="subaddcomment" name="subaddcomment" value="1" />
    		</fieldset>
    	</form>


    	<?php
    }
}

/*
function waitlistCheck($req_event, $username, $volunteer_count)
{
$volunteer_count = $global_vol;
$database->waitlisted($req_event, $session->username, $volunteer_count);
}*/

?>


<!-- this is the Evaluation Form in html coding -->

<div>
	<a style="text-decoration: none; text-align: center " href="https://docs.google.com/forms/d/150rJ-P-9wlTcwxY2VvjzdXrHLvZmp5KEykqfun0wLUU/viewform?pli=1"> <h2>Evaluate This Event</h2></a>
</div>



<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once "include/sidebarFooterDropdownpanel.php";
?>

