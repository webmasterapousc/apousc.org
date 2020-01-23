<?php
/**
 * Database.php
 * 
 * The Database class is meant to simplify the task of accessing
 * information from the website's database.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 17, 2004
 *
 * Modified by: Brad Ramos (bradleyRamos@gmail.com)
 * Last Updated: January 2011
 */
include_once("constants.php");
include_once('fix_mysql.inc.php');
include_once('mail.php');
class MySQLDB
{
	var $connection; //The MySQL database connection
	var $num_active_users; //Number of active users viewing site
	var $num_active_guests; //Number of active guests viewing site
	var $num_members; //Number of signed-up users
	
	/* Note: call getNumMembers() to access $num_members! */
	
	/* Class constructor */
	function MySQLDB()
	{
		/* Make connection to database */
		$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME, $this->connection) or die(mysql_error());
		
		/**
		 * Only query database to find out number of members
		 * when getNumMembers() is called for the first time,
		 * until then, default value set.
		 */
		$this->num_members = -1;
		
		if (TRACK_VISITORS) {
			/* Calculate number of users at site */
			$this->calcNumActiveUsers();
			
			/* Calculate number of guests at site */
			$this->calcNumActiveGuests();
		}
	}
	
	/**
	 * confirmUserPass - Checks whether or not the given
	 * username is in the database, if so it checks if the
	 * given password is the same password in the database
	 * for that user. If the user doesn't exist or if the
	 * passwords don't match up, it returns an error code
	 * (1 or 2). On success it returns 0.
	 */
	function confirmUserPass($username, $password)
	{
		/* Add slashes if necessary (for query) */
		if (!get_magic_quotes_gpc()) {
			$username = addslashes($username);
		}
		
		/* Verify that user is in database */
		$q      = "SELECT `password` FROM `" . TBL_USERS . "` WHERE `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		if (!$result || (mysql_numrows($result) < 1)) {
			return 1; //Indicates username failure
		}
		
		/* Retrieve password from result, strip slashes */
		$dbarray             = mysql_fetch_array($result);
		$dbarray['password'] = stripslashes($dbarray['password']);
		$password            = stripslashes($password);
		
		/* Validate that password is correct */
		if ($password == $dbarray['password']) {
			return 0; //Success! Username and password confirmed
		} else {
			return 2; //Indicates password failure
		}
	}
	
	/**
	 * confirmUserID - Checks whether or not the given
	 * username is in the database, if so it checks if the
	 * given userid is the same userid in the database
	 * for that user. If the user doesn't exist or if the
	 * userids don't match up, it returns an error code
	 * (1 or 2). On success it returns 0.
	 */
	function confirmUserID($username, $userid)
	{
		/* Add slashes if necessary (for query) */
		if (!get_magic_quotes_gpc()) {
			$username = addslashes($username);
		}
		
		/* Verify that user is in database */
		$q      = "SELECT `userid` FROM `" . TBL_USERS . "` WHERE `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		if (!$result || (mysql_numrows($result) < 1)) {
			return 1; //Indicates username failure
		}
		
		/* Retrieve userid from result, strip slashes */
		$dbarray           = mysql_fetch_array($result);
		$dbarray['userid'] = stripslashes($dbarray['userid']);
		$userid            = stripslashes($userid);
		
		/* Validate that userid is correct */
		if ($userid == $dbarray['userid']) {
			return 0; //Success! Username and userid confirmed
		} else {
			return 2; //Indicates userid invalid
		}
	}
	
	/**
	 * usernameTaken - Returns true if the username has
	 * been taken by another user, false otherwise.
	 */
	function usernameTaken($username)
	{
		if (!get_magic_quotes_gpc()) {
			$username = addslashes($username);
		}
		$q      = "SELECT `username` FROM `" . TBL_USERS . "` WHERE `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		return (mysql_numrows($result) > 0);
	}
	
	/**
	 * usernameBanned - Returns true if the username has
	 * been banned by the administrator.
	 */
	function usernameBanned($username)
	{
		if (!get_magic_quotes_gpc()) {
			$username = addslashes($username);
		}
		$q      = "SELECT `username` FROM `" . TBL_BANNED_USERS . "` WHERE `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		return (mysql_numrows($result) > 0);
	}
	
	/**
	 * addNewUser - Inserts the given (username, password, email, etc.)
	 * info into the database. Appropriate user level is set.
	 * Returns true on success, false otherwise.
	 */
	function addNewUser($username, $status, $email, $fname, $lname, $family, $semester, $year, $position, $big, $phone, $uscid, $address, $shirtsize, $password)
	{
		$time = time();
		/* If admin sign up, give admin user level */
		if (strcasecmp($username, ADMIN_NAME) == 0) {
			$ulevel = ADMIN_LEVEL;
		} else {
			$ulevel = USER_LEVEL;
		}
		$q = "INSERT INTO `" . TBL_USERS . "` VALUES ('$username', '$password', '0', $ulevel, $status, '$email', $time, '$fname', '$lname', $family, $semester, $year, $position, '$big', '$phone', '$uscid', '$address', '$shirtsize')";
		if (mysql_query($q, $this->connection)) {
			if ($this->configureDefaultUser($username)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * configureUser - Inserts the default values for different
	 * configuration tables that depend on `users`.
	 */

	function configureDefaultUser($username) {
		$q1 = "INSERT INTO `" . TBL_CALENDAR . "` VALUES ('$username', '0')";
		mysql_query($q1, $this->connection);		
		$q2 = "INSERT INTO `" . TBL_REMINDER . "` VALUES ('$username', '0')";
		return mysql_query($q2, $this->connection);
	}
	
	/**
	 * updateUserField - Updates a field, specified by the field
	 * parameter, in the user's row of the database.
	 */
	function updateUserField($username, $field, $value)
	{
		$q = "UPDATE `" . TBL_USERS . "` SET `" . $field . "` = '$value' WHERE `username` = '$username'";
		return mysql_query($q, $this->connection);
	}
	
	function updateGraduation($username, $value)
	{
		$query=mysql_query("SELECT * FROM user_graduation WHERE username = '$username'");
		$result=mysql_fetch_array($query);
		if(mysql_num_rows($query)==0){$q = "INSERT INTO user_graduation (graduation_term, username) VALUES($value,'$username')";
	}
		else {$q="UPDATE user_graduation SET graduation_term = $value WHERE username = '$username'";}
		return mysql_query($q, $this->connection);
	}
	
	/**
	 * getUserInfo - Returns the result array from a mysql
	 * query asking for all information stored regarding
	 * the given username. If query fails, NULL is returned.
	 */
	function getUserInfo($username)
	{
		$q      = "SELECT * FROM `" . TBL_USERS . "` WHERE `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		/* Error occurred, return given name by default */
		if (!$result || (mysql_numrows($result) < 1)) {
			return NULL;
		}
		/* Return result array */
		$dbarray = mysql_fetch_array($result);
		return $dbarray;
	}
	
	function getOfficerInfo($username){
		$q = "SELECT * FROM users JOIN officer ON officer.username = users.username WHERE username = '$username'";
		$result = mysql_query($q, $this->connection);
				if (!$result || (mysql_numrows($result) < 1)) {
			return NULL;
		}
		$dbarray = mysql_fetch_array($result);
		return $dbarray;
	}

	/* 
		The following two functions take care of email reminder settings
		My first attempt at MySQL/php so probably not the best structure.
		By: Nikita Zolotykh (nzolotykh@gmail.com).
	*/

	function getReminderSettings($username){
		$q = "SELECT * FROM `reminder_settings` WHERE `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		if (!result || (mysql_numrows($result) < 1)) {
			return NULL;
		}
		$dbarray = mysql_fetch_array($result);
		return $dbarray;
	}

	function updateReminder($username, $reminder) {
		$query=mysql_query("SELECT * FROM reminder_settings WHERE username = '$username'");
		if(mysql_num_rows($query)==0){
			if ($reminder) {
				$q = "INSERT INTO reminder_settings (notify, username) VALUES('1','$username')";
			} else {
				$q = "INSERT INTO reminder_settings (notify, username) VALUES('0','$username')";
			}
		} else {
			if ($reminder){
				$q = "UPDATE reminder_settings SET notify = '1' WHERE username = '$username'";
			} else {
				$q = "UPDATE reminder_settings SET notify = '0' WHERE username = '$username'";
			}
		}
		return mysql_query($q, $this->connection);
	}

	/* 
		By: Nikita Zolotykh (nzolotykh@gmail.com).
	*/

	function getCalendarSettings($username){
		$q = "SELECT * FROM `user_calendar` WHERE `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		if (!result || (mysql_numrows($result) < 1)) {
			return NULL;
		}
		$dbarray = mysql_fetch_array($result);
		return $dbarray;
	}

	function updateCalendarSettings($username, $calendar) {
		$query=mysql_query("SELECT * FROM user_calendar WHERE username = '$username'");
		if(mysql_num_rows($query)==0){
			if ($calendar) {
				$q = "INSERT INTO user_calendar (calendar_setting, username) VALUES('1','$username')";
			} else {
				$q = "INSERT INTO user_calendar (calendar_setting, username) VALUES('0','$username')";
			}
		} else {
			if ($calendar){
				$q = "UPDATE user_calendar SET calendar_setting = '1' WHERE username = '$username'";
			} else {
				$q = "UPDATE user_calendar SET calendar_setting = '0' WHERE username = '$username'";
			}
		}
		return mysql_query($q, $this->connection);
	}
	
	/**
	 * getNumMembers - Returns the number of signed-up users
	 * of the website, banned members not included. The first
	 * time the function is called on page load, the database
	 * is queried, on subsequent calls, the stored result
	 * is returned. This is to improve efficiency, effectively
	 * not querying the database when no call is made.
	 */
	function getNumMembers()
	{
		if ($this->num_members < 0) {
			$q                 = "SELECT * FROM `" . TBL_USERS . "`";
			$result            = mysql_query($q, $this->connection);
			$this->num_members = mysql_numrows($result);
		}
		return $this->num_members;
	}
	
	/**
	 * calcNumActiveUsers - Finds out how many active users
	 * are viewing site and sets class variable accordingly.
	 */
	function calcNumActiveUsers()
	{
		/* Calculate number of users at site */
		$q                      = "SELECT * FROM `" . TBL_ACTIVE_USERS . "`";
		$result                 = mysql_query($q, $this->connection);
		$this->num_active_users = mysql_numrows($result);
	}
	
	/**
	 * calcNumActiveGuests - Finds out how many active guests
	 * are viewing site and sets class variable accordingly.
	 */
	function calcNumActiveGuests()
	{
		/* Calculate number of guests at site */
		$q                       = "SELECT * FROM `" . TBL_ACTIVE_GUESTS . "`";
		$result                  = mysql_query($q, $this->connection);
		$this->num_active_guests = mysql_numrows($result);
	}
	
	/**
	 * addActiveUser - Updates username's last active timestamp
	 * in the database, and also adds him to the table of
	 * active users, or updates timestamp if already there.
	 */
	function addActiveUser($username, $time)
	{
		$q = "UPDATE `" . TBL_USERS . "` SET `timestamp` = '$time' WHERE `username` = '$username'";
		mysql_query($q, $this->connection);
		
		if (!TRACK_VISITORS) {
			return;
		}
		$q = "REPLACE INTO `" . TBL_ACTIVE_USERS . "` VALUES ('$username', '$time')";
		mysql_query($q, $this->connection);
		$this->calcNumActiveUsers();
	}
	
	/* addActiveGuest - Adds guest to active guests table */
	function addActiveGuest($ip, $time)
	{
		if (!TRACK_VISITORS) {
			return;
		}
		$q = "REPLACE INTO `" . TBL_ACTIVE_GUESTS . "` VALUES ('$ip', '$time')";
		mysql_query($q, $this->connection);
		$this->calcNumActiveGuests();
	}
	
	/* These functions are self explanatory, no need for comments */
	
	/* removeActiveUser */
	function removeActiveUser($username)
	{
		if (!TRACK_VISITORS) {
			return;
		}
		$q = "DELETE FROM `" . TBL_ACTIVE_USERS . "` WHERE `username` = '$username'";
		mysql_query($q, $this->connection);
		$this->calcNumActiveUsers();
	}
	
	/* removeActiveGuest */
	function removeActiveGuest($ip)
	{
		if (!TRACK_VISITORS) {
			return;
		}
		$q = "DELETE FROM `" . TBL_ACTIVE_GUESTS . "` WHERE `ip` = '$ip'";
		mysql_query($q, $this->connection);
		$this->calcNumActiveGuests();
	}
	
	/* removeInactiveUsers */
	function removeInactiveUsers()
	{
		if (!TRACK_VISITORS) {
			return;
		}
		$timeout = time() - USER_TIMEOUT * 60;
		$q       = "DELETE FROM `" . TBL_ACTIVE_USERS . "` WHERE `timestamp` < $timeout";
		mysql_query($q, $this->connection);
		$this->calcNumActiveUsers();
	}
	
	/* removeInactiveGuests */
	function removeInactiveGuests()
	{
		if (!TRACK_VISITORS) {
			return;
		}
		$timeout = time() - GUEST_TIMEOUT * 60;
		$q       = "DELETE FROM `" . TBL_ACTIVE_GUESTS . "` WHERE `timestamp` < $timeout";
		mysql_query($q, $this->connection);
		$this->calcNumActiveGuests();
	}
	
	/**
	 * addNewEvent - Inserts the given (event name, type, description, start, end, max)
	 * info into the database.
	 * Returns true on success, false otherwise.
	 */
	function addNewEvent($name, $type, $desc, $start, $end, $hours, $max, $walk, $meet, $location, $address)
	{
		$q = "INSERT INTO `" . TBL_EVENTS . "` VALUES (NULL,'$name',$type,'$desc','$start','$end',$hours,$max,$walk,'$meet','$location',0,0,'$address')";
		return mysql_query($q, $this->connection);
	}

	/**
	 * editExistingEvent - Edits the given (event name, type, description, start, end, max)
	 * info into the database.
	 * Returns true on success, false otherwise.
	 */
	function editExistingEvent($eventid, $name, $type, $desc, $start, $end, $hours, $max, $walk, $meet, $location, $address)
	{
		$q = "UPDATE `" . TBL_EVENTS . "` SET `name` = '$name', `type` = $type, `desc` = '$desc', `start` = '$start', `end` = '$end', `hours` = $hours, `max` = $max, `walk` = $walk, `meet` = '$meet', `location` = '$location', `address` = '$address', `rush` = 0, `pledge` = 0 WHERE `ID` = $eventid";
		return mysql_query($q, $this->connection);
	}

	/**
	 * getEventInfo - Returns the result array from a mysql
	 * query asking for all information stored regarding
	 * the given event ID. If query fails, NULL is returned.
	 */
	function getEventInfo($eventid)
	{
		$q      = "SELECT * FROM `" . TBL_EVENTS . "` WHERE `ID` = $eventid";
		$result = mysql_query($q, $this->connection);
		/* Error occurred, return given name by default */
		if (!$result || (mysql_numrows($result) < 1)) {
			return NULL;
		}
		/* Return result array */
		$dbarray = mysql_fetch_array($result);
		return $dbarray;
	}
	
	/**
	 * eventExists - Returns true if the requested event ID
	 * exists in the database, false otherwise.
	 */
	function eventExists($eventid)
	{
		$q      = "SELECT `ID` FROM `" . TBL_EVENTS . "` WHERE `ID` = '$eventid'";
		$result = mysql_query($q, $this->connection);
		return (mysql_num_rows($result) > 0);
	}
	
	/**
	 * addEventSignup - Inserts given (username, drive?, lead?,  event ID) info
	 * into the database
	 * Returns true on success, false otherwise
	 */
	function addEventSignup($username, $eventid, $drive, $lead, $weight, $guest, $time)
	{
		$q = "INSERT INTO `" . TBL_SIGNUPS . "` VALUES ('$username',$eventid,$drive,$lead,$weight,$guest,$time,0)";
		return mysql_query($q, $this->connection);
	}

	/**
	 * flakeUser - Assigns weight of -0.5 to SERVICE event sign-up
	 */
	function flakeUser($eventid, $username)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `weight` = -0.5 WHERE `username` = '$username' AND `eventid` = $eventid";
		return mysql_query($q, $this->connection);
	}

	/**
	 * flakeOtherUser - Assigns weight of -1 to NON-SERVICE event sign-up
	 */
	function flakeOtherUser($eventid, $username)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `weight` = -1 WHERE `username` = '$username' AND `eventid` = $eventid";
		return mysql_query($q, $this->connection);
	}

	/**
	 * rmEvent - Deletes existing event from the database
	 */
	function rmEvent($eventid)
	{
		$q = "DELETE FROM `" . TBL_EVENTS . "` WHERE `ID` = $eventid";
		return mysql_query($q, $this->connection);
	}


	/**
	 *  - Deletes existing event from the database
	 */
	function diffDrive($eventid, $username, $drive)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `drive` = $drive WHERE `username` = '$username' AND `eventid` = $eventid LIMIT 1";
		return mysql_query($q, $this->connection);
	}

	function guestAllowance($eventid, $guestallow)
	{
		if      ($guestallow == 1) {$q = "INSERT INTO event_guest (event_id) VALUES         (".$eventid.")";}
		else if ($guestallow == 0) {$q = "DELETE FROM event_guest WHERE event_id= '$eventid'  LIMIT 1";}
		return mysql_query($q, $this->connection);
	}

	/**
	 *  - Deletes existing event from the database
	 */
	function diffGuest($eventid, $username, $guest)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `guest` = $guest WHERE `username` = '$username' AND `eventid` = $eventid LIMIT 1";
		return mysql_query($q, $this->connection);
	}

	/**
	 *  - Deletes existing event from the database
	 */
	function diffLead($eventid, $username, $lead)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `lead` = $lead WHERE `username` = '$username' AND `eventid` = $eventid LIMIT 1";
		return mysql_query($q, $this->connection);
	}

	/**
	 * removeSignup - Deletes existing event signup from the database
	 */
	function removeSignup($eventid, $username)
	{
		//delete
		$q = "DELETE FROM `" . TBL_SIGNUPS . "` WHERE `username` = '$username' AND `eventid` = $eventid";
		mysql_query($q, $this->connection);

		/**
		 * Nick's code for getting off waitlist email alerts
		 */
		$mysqli = $this->connection;
		//check max for event
		$ps = $mysqli->prepare("SELECT max FROM events WHERE id = ?");
		$ps->bind_param("i", $eventid);
		$ps->execute();
		$result = $ps->get_result();
		$event_max = $result->fetch_row()[0];
		if ($event_max == 0) return; //no limit

		//check number of signups
		$param = "timestamp";	
		$ps = $mysqli->prepare("SELECT * FROM signups WHERE eventid = ? ORDER BY timestamp ASC");
		$ps->bind_param("i", $eventid); 
		
		$ps->execute();
		$result = $ps->get_result();

		//check to see if user is in the waitlist
		$result2 = $ps->get_result();
		$index = 0;
		while( $row = mysqli_fetch_assoc( $result2)){
		    if ($row["username"] == $username)
		    	break;
		    else {
		    	$index += 1;
		    }
		}
		//if need be, email the person who's most recent on the waitlist
		//signups order by timestamp, index of max
		if ($index < $event_max && mysqli_num_rows($result) > $event_max) {
			$rows = mysqli_fetch_all($result);
			$username = $rows[$event_max - 1][0];
			//find email of user
			$ps = $mysqli->prepare("SELECT email FROM users WHERE `username` = ?");
			$ps->bind_param("s", $username);
			$ps->execute();
			$result = $ps->get_result();
			$email = $result->fetch_row()[0];
			//find firstname of user
			$ps = $mysqli->prepare("SELECT fname FROM users WHERE `username` = ?");
			$ps->bind_param("s", $username);
			$ps->execute();
			$result = $ps->get_result();
			$fname = $result->fetch_row()[0];
			//get name of event
			$ps = $mysqli->prepare("SELECT name FROM events WHERE id = ?");
			$ps->bind_param("i", $eventid);
			$ps->execute();
			$result = $ps->get_result();
			$event_name = $result->fetch_row()[0];
			//construct $mail_subject and $mail_msg
			$mail_subject = "Congratulations! You're off the Waitlist";
			$mail_msg = "Hi ".$fname.", you've been taken off the waitlist for event \"".$event_name."\". Please show up on time! Your attendance is expected.";
			//send email
			sendMail($email, $mail_subject, $mail_msg);
		}
		return;
	}

	/**
	 * assignWeightHalf - Assigns weight of 0.5 (half credit) to sign-up
	 */
	function assignWeightHalf($eventid, $username)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `weight` = 0.5 WHERE `username` = '$username' AND `eventid` = $eventid";
		return mysql_query($q, $this->connection);
	}

	/**
	 * assignWeightNormal - Assigns weight of 1.0 (normal, full credit) to sign-up
	 */
	function assignWeightNormal($eventid, $username)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `weight` = 1 WHERE `username` = '$username' AND `eventid` = $eventid";
		return mysql_query($q, $this->connection);
	}

	/**
	 * assignWeightDouble - Assigns weight of 2.0 (double credit) to sign-up
	 */
	function assignWeightDouble($eventid, $username)
	{
		$q = "UPDATE `" . TBL_SIGNUPS . "` SET `weight` = 2 WHERE `username` = '$username' AND `eventid` = $eventid";
		return mysql_query($q, $this->connection);
	}

	/**
	 * signedUp - Returns true if user is signed up for selected event
	 * in signups table, false otherwise.
	 */
	function signedUp($eventid, $username)
	{
		$q = "SELECT * FROM `" . TBL_SIGNUPS . "` WHERE `eventid` = '$eventid' AND `username` = '$username'";
		$result = mysql_query($q, $this->connection);
		return (mysql_num_rows($result) > 0);
	}

	/**
	 * waitlist - Returns true if user is signed up for selected event
	 * but is on the waitlist, false otherwise.
	 */
	function waitlisted($eventid, $username, $volunteer_c)
	{
		$q = "SELECT E.max FROM events as E, signups as S WHERE $eventid = ID AND S.eventid = E.ID AND S.username = $session->username";
		$result = mysql_query($q, $this->connection);
		if($volunteer_c > $result['max']){
		return TRUE;};
	}

	/**
	 * addNewAnnouncement - Inserts announcement title, body, and post date into the database
	 */
	function addNewAnnouncement($title, $body, $date)
	{
		$q = "INSERT INTO `" . TBL_ANNOUNCEMENTS . "` VALUES (NULL,'$title','$date','$body')";
		$result = mysql_query($q, $this->connection);
		return $result;
	}

	/**
	 * editExistingAnnouncement - Edits title and body of existing announcement in the database
	 */
	function editExistingAnnouncement($title, $body, $id)
	{
		$q = "UPDATE `" . TBL_ANNOUNCEMENTS . "` SET `title` = '$title', `body` = '$body' WHERE `ID` = $id";
		return mysql_query($q, $this->connection);
	}

	/**
	 * removeAnnouncement - Deletes existing announcement from the database
	 */
	function removeAnnouncement($id)
	{
		$q = "DELETE FROM `" . TBL_ANNOUNCEMENTS . "` WHERE `ID` = $id LIMIT 1";
		return mysql_query($q, $this->connection);
	}

	/**
	 * addNewComment - Inserts comment, username, eventid, and timestamp into database
	 */
	function addNewComment($username, $eventid, $comment, $timestamp)
	{
		$q = "INSERT INTO `" . TBL_COMMENTS . "` VALUES (NULL,'$username',$eventid,'$comment',$timestamp)";
		return mysql_query($q, $this->connection);
	}

	/**
	 * addNewNomination - Inserts nomination username and position into database
	 */
	function addNewNomination($username, $position)
	{
		$q = "INSERT INTO `" . TBL_NOMINATIONS . "` VALUES (NULL,'$username',$position,'','')";
		return mysql_query($q, $this->connection);
	}
	/**
	 * checkNomination
	 */
	function checkNomination($username, $position)
	{
		$q = "SELECT * FROM `" . TBL_NOMINATIONS . "` WHERE `name` = '$username' AND `position` = $position";
		$result = mysql_query($q, $this->connection);
		return (mysql_num_rows($result) > 0);
	}
	/**
	 * editSecondField
	 */
	function editSecondField($username, $position)
	{
		$q = "UPDATE `" . TBL_NOMINATIONS . "` SET `second` = 1 WHERE `name` = '$username' AND `position` = $position";
		return mysql_query($q, $this->connection);
	}
	/**
	 * editDeclineField
	 */
	function editDeclineField($username, $position)
	{
		$q = "UPDATE `" . TBL_NOMINATIONS . "` SET `decline` = 1 WHERE `name` = '$username' AND `position` = $position";
		return mysql_query($q, $this->connection);
	}

	/**
	 * addNewPOTW - Inserts the given (event name, type, description, start, end, max)
	 * info into the database.
	 * Returns true on success, false otherwise.
	 */
	function addNewPOTW($date, $title, $caption, $submitter, $filepath)
	{
		print "I reached here ok."; die;
		$q = "INSERT INTO `" . TBL_POTW . "` VALUES (NULL,'$date','$title','$caption','$submitter','$filepath')";
		return mysql_query($q, $this->connection);
	}

	/**
	 * getPolls
	 * Get all the polls
	*/
	function getPolls(){
		$q = "SELECT * FROM `". TBL_POLLS . "` ORDER BY poll_start DESC";
		return mysql_query($q, $this->connection);
	}

	function addPoll($name, $type, $start, $end, $url){
		$q = "INSERT INTO `". TBL_POLLS . "` VALUES('', '{$name}', '{$type}', '{$start}', '{$end}', '{$url}')";
		return mysql_query($q, $this->connection);
	}

	/**
	 * query - Performs the given query on the database and
	 * returns the result, which may be false, true or a
	 * resource identifier.
	 */
	function query($query)
	{
		return mysql_query($query, $this->connection);
	}

	function getDriversAndAtt($eventid) {
		$drivas  = "SELECT S.username, U.fname, U.lname, COUNT(S.username) AS nAtt, SUM(S.drive) as nDrivers, SUM(S.guest) as nGuest, S.lead, S.weight, S.timestamp FROM `" . TBL_SIGNUPS . "` AS S, `" . TBL_USERS . "` AS U WHERE S.eventid = '$eventid' AND S.username = U.username";
		return mysql_query($drivas);
	}

	function hasLead($eventid) {
		$q = "SELECT * FROM (SELECT S.username, U.fname, U.lname, U.status, S.drive, S.lead FROM `" . TBL_SIGNUPS . "` AS S, `" . TBL_USERS . "` AS U WHERE S.eventid = '$eventid' AND S.username = U.username) AS T1";
		$q2 = "SELECT * FROM (SELECT S.lead FROM `" . TBL_SIGNUPS . "` AS S WHERE S.eventid = '$eventid')";
		return mysql_query($q, $this->connection);
	}
}

/* Create database connection */
$database = new MySQLDB;

?>
