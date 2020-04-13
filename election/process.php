<?php
/**
 * Process.php
 * 
 * The Process class is meant to simplify the task of processing
 * user submitted forms, redirecting the user to the correct
 * pages if errors are found, or if form is successful, either
 * way. Also handles the logout procedure.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 *
 * Modified by: Brad Ramos (bradleyRamos@gmail.com)
 * Last Updated: November 2011
 */
include_once("include/session.php");

class Process
{
	/* Class constructor */
	function Process()
	{
		global $session;
		/* User submitted login form */
		if (isset($_POST['sublogin'])) {
			$this->procLogin();
		}
		
		/* User submitted rush login form - Added 9/1 */
		if (isset($_POST['subrushlogin'])) {
			$this->procRushLogin();
		}
		
		/* User submitted rush registration form */
		else if (isset($_POST['subrushjoin'])) {
			$this->procRushRegister();
		}
		
		/* User submitted registration form */
		else if (isset($_POST['subjoin'])) {
			$this->procRegister();
		}
		/* User submitted forgot password form */
		else if (isset($_POST['subforgot'])) {
			$this->procForgotPass();
		}
		/* User submitted edit account form */
		else if (isset($_POST['subedit'])) {
			$this->procEditAccount();
		}
		/* Admin submitted user account edit form */
		else if (isset($_POST['subadminedit'])) {
			$this->procAdminEditAccount();
		}
		/* User submitted add event form */
		else if (isset($_POST['subaddevent'])) {
			$this->procAddEvent();
		}
		/* User submitted edit event form */
		else if (isset($_POST['subeditevent'])) {
			$this->procEditEvent();
		}
		/* User submitted edit event form */
		else if (isset($_GET['subdeleteevent'])) {
			$this->procDeleteEvent();
		}
		/* User submitted event signup form */
		else if (isset($_POST['subeventsignup'])) {
			$this->procEventSignup();
		}
		
			/* User submitted rush event signup form */
		else if (isset($_POST['subrusheventsignup'])) {
			$this->procRushEventSignup();
		}
		
		/* Assign flake (-0.5) credit for serice event sign-up */
		else if (isset($_GET['subflake'])) {
			$this->procFlake();
		}
		/* Assign flake (-1) credit for non-service event sign-up */
		else if (isset($_GET['subflakeother'])) {
			$this->procFlakeOther();
		}
		/* User submitted remove signup form */
		else if (isset($_GET['subdeletesignup'])) {
			$this->procDeleteSignup();
		}
		
		/* User submitted remove rush signup form */
		else if (isset($_GET['subrushdeletesignup'])) {
			$this->procRushDeleteSignup();
		}
		
		/* Assign half (0.5) credit for event sign-up */
		else if (isset($_GET['subweighthalf'])) {
			$this->procWeightHalf();
		}
		/* Assign full (1.0) credit for event sign-up */
		else if (isset($_GET['subweightnormal'])) {
			$this->procWeightNormal();
		}
		/* Assign double (2.0) credit for event sign-up */
		else if (isset($_GET['subweightdouble'])) {
			$this->procWeightDouble();
		}
		/* User submitted add announcement form */
		else if (isset($_POST['subaddannouncement'])) {
			$this->procAddAnnouncement();
		}
		/* User submitted edit announcement form */
		else if (isset($_POST['subeditannouncement'])) {
			$this->procEditAnnouncement();
		}
		/* User clicked delete announcement link */
		else if (isset($_GET['subdeleteannouncement'])) {
			$this->procDeleteAnnouncement();
		}
		/* User clicked delete announcement link */
		else if (isset($_GET['subdrive'])) {
			$this->procEditDrive();
		}
		/* User clicked delete announcement link */
		else if (isset($_GET['suballowguest'])) {
			$this->procAllowGuest();
		}
		/* User clicked delete announcement link */
		else if (isset($_GET['subguest'])) {
			$this->procEditGuest();
		}
		/* User clicked delete announcement link */
		else if (isset($_GET['sublead'])) {
			$this->procEditLead();
		}
		/* User submitted add comment form */
		else if (isset($_POST['subaddcomment'])) {
			$this->procAddComment();
		}
		/* User submitted contact form */
		else if (isset($_POST['subcontactus'])) {
			$this->procContactUs();
		}
		else if (isset($_POST['subreminder'])) {
			$this->procReminder();
		}
		/* User submitted nomination form */
		else if (isset($_POST['subaddnomination'])) {
			$this->procAddNomination();
		}
		/* User clicked second nomination link */
		else if (isset($_GET['subsecondnomination'])) {
			$this->procSecondNomination();
		}
		/* User clicked decline nomination link */
		else if (isset($_GET['subdeclinenomination'])) {
			$this->procDeclineNomination();
		}
		/* User submitted new POTW */
		else if (isset($_POST['subaddpotw'])) {
			$this->procAddPOTW();
		}
		/**
		 * The only other reason user should be directed here
		 * is if he wants to logout, which means user is
		 * logged in currently.
		 */
		else if ($session->logged_in) {
			$this->procLogout();
		}
		
		/**
		 * The only other reason user should be directed here
		 * is if he wants to logout, which means user is
		 * logged in currently. Added 9/1 to control where the 
		 *	user is redirected to.
		 */
		else if ($session->logged_in && isset($_POST['subrushlogout'])) {
			$this->procRushLogout();
		}
		
		/**
		 * Should not get here, which means user is viewing this page
		 * by mistake and therefore is redirected.
		 */
		else {
			header("Location: home.php");
		}
	}
	
	/**
	 * procLogin - Processes the user submitted login form, if errors
	 * are found, the user is redirected to correct the information,
	 * if not, the user is effectively logged in to the system.
	 */
	function procLogin()
	{
		global $session, $form;
		/* Login attempt */
		$retval = $session->login($_POST['user'], $_POST['pass'], isset($_POST['remember']));
		
		/* Login successful */
		if ($retval) {
			header("Location: " . $session->referrer);
		}
		/* Login failed */
		else {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
	}
	
	/**
	 * procLogout - Simply attempts to log the user out of the system
	 * given that there is no logout form to process.
	 */
	function procLogout()
	{
		global $session;
		$retval = $session->logout();
		header("Location: home.php");
	}
	
	/**
	 * procLogin - Processes the user submitted login form, if errors
	 * are found, the user is redirected to correct the information,
	 * if not, the user is effectively logged in to the system.
	 */
	function procRushLogin()
	{
		global $session, $form;
		/* Login attempt */
		$retval = $session->login($_POST['user'], $_POST['pass'], isset($_POST['remember']));
		
		/* Login successful */
		if ($retval) {
			header("Location: http://www.apousc.org/fallrush.php#Sign-in");
		}
		/* Login failed */
		else {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: http://www.apousc.org/fallrush.php#Sign-in");
		}
	}
	
	/**
	 * procLogout - Simply attempts to log the user out of the system
	 * given that there is no logout form to process.
	 */
	function procRushLogout()
	{
		global $session;
		$retval = $session->logout();
		header("Location: http://www.apousc.org/fallrush.php#Sign-in");
	}
	
	/**
	 * procRegister - Processes the user submitted registration form,
	 * if errors are found, the user is redirected to correct the
	 * information, if not, the user is effectively registered with
	 * the system and an email is (optionally) sent to the newly
	 * created user.
	 */
	function procRushRegister()
	{
		global $session, $form;
		/* Convert username to all lowercase (by option) */
		if (ALL_LOWERCASE) {
			$_POST['txt_User'] = strtolower($_POST['txt_User']);
		}
		/* Registration attempt */
		$retval = $session->rushregister($_POST['txt_User'], $substatus = $_POST[6], $_POST['txt_Email'], $_POST['txt_Fname'], $_POST['txt_Lname'], $subfamily = $_POST[NULL], $subsemester = $_POST[0], $subyear = $_POST[2012], $subposition = $_POST[NULL], $subbig = $_POST[NULL], $_POST['tel_Phone'], $_POST['txt_USCID'], $subaddress = $_POST[NULL], $subshirt = $_POST[NULL]);
		
		/* Registration Successful */
		if ($retval == 0) {
			$_SESSION['reguname']   = $_POST['txt_User'];
			$_SESSION['regsuccess'] = true;
			header("Location: http://www.apousc.org/fallrush.php");
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: http://www.google.com");
		}
		/* Registration attempt failed */
		else if ($retval == 2) {
			$_SESSION['reguname']   = $_POST['txt_User'];
			$_SESSION['regsuccess'] = false;
			header("Location: http://www.apousc.org/index.php");
		}
	}
	
	/**
	 * procRegister - Processes the user submitted registration form,
	 * if errors are found, the user is redirected to correct the
	 * information, if not, the user is effectively registered with
	 * the system and an email is (optionally) sent to the newly
	 * created user.
	 */
	function procRegister()
	{
		global $session, $form;
		/* Convert username to all lowercase (by option) */
		if (ALL_LOWERCASE) {
			$_POST['txt_User'] = strtolower($_POST['txt_User']);
		}
		/* Registration attempt */
		$retval = $session->register($_POST['txt_User'], $_POST['sel_Status'], $_POST['txt_Email'], $_POST['txt_Fname'], $_POST['txt_Lname'], $_POST['sel_Family'], $_POST['sel_Semester'], $_POST['txt_Year'], $_POST['sel_Position'], $_POST['sel_Big'], $_POST['tel_Phone'], $_POST['txt_USCID'], $_POST['txtarea_Address'], $_POST['sel_Shirt']);
		
		/* Registration Successful */
		if ($retval == 0) {
			$_SESSION['reguname']   = $_POST['txt_User'];
			$_SESSION['regsuccess'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Registration attempt failed */
		else if ($retval == 2) {
			$_SESSION['reguname']   = $_POST['txt_User'];
			$_SESSION['regsuccess'] = false;
			header("Location: " . $session->referrer);
		}
	}
	
	/**
	 * procForgotPass - Validates the given username then if
	 * everything is fine, a new password is generated and
	 * emailed to the address the user gave on sign up.
	 */
	function procForgotPass()
	{
		global $database, $session, $mailer, $form;
		/* Username error checking */
		$subuser = $_POST['uname'];
		$field   = "uname"; //Use field name for username
		if (!$subuser || strlen($subuser = trim($subuser)) == 0) {
			$form->setError($field, "* Username not entered");
		} else {
			/* Make sure username is in database */
			$subuser = stripslashes($subuser);
			if (!$database->usernameTaken($subuser)) {
				$form->setError($field, "* Username does not exist");
			}
		}
		
		/* Errors exist, have user correct them */
		if ($form->num_errors > 0) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
		}
		/* Generate new password and email it to user */
		else {
			/* Generate new password */
			$newpass = $session->generateRandStr(8);
			
			/* Get e-mail and first name of user */
			$usrinf = $database->getUserInfo($subuser);
			$email  = $usrinf['email'];
			$first  = $usrinf['fname'];
			/* Attempt to send the email with new password */
			if ($mailer->sendNewPass($subuser, $email, $newpass, $first)) {
				/* Email sent, update database */
				$database->updateUserField($subuser, "password", md5(sha1($newpass.PASSWORD_SALT)));
				$_SESSION['forgotpass'] = true;
			}
			/* Email failure, do not change password */
			else {
				$_SESSION['forgotpass'] = false;
			}
		}
		
		header("Location: " . $session->referrer);
	}
	
	/**
	 * procEditAccount - Attempts to edit the user's account
	 * information, including the password, which must be verified
	 * before a change is made.
	 */
	function procEditAccount()
	{
		global $session, $form;
		/* Account edit attempt */
		$retval = $session->editAccount($_POST['pass_Curpass'], $_POST['pass_Newpass'], $_POST['pass_Newpass2'], $_POST['txt_Email'], $_POST['tel_Phone'], $_POST['txtarea_Address'], $_POST['sel_Tshirt'], $_POST['graduation'], isset($_POST['reminder']), isset($_POST['calendar']));
		
		/* Account edit successful */
		if ($retval) {
			$_SESSION['useredit'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
	}

	/**
	 * procAdminEditAccount - Attempts to edit a user account
	 */
	function procAdminEditAccount()
	{
		global $session, $form;
		/* Account edit attempt */
		$retval = $session->adminEditAccount($_POST['hidden_req_user'], $_POST['sel_Family'], $_POST['sel_Semester'], $_POST['txt_Year'], $_POST['sel_Position'], $_POST['sel_Big'], $_POST['txt_USCID'], $_POST['txt_Email'], $_POST['tel_Phone'], $_POST['txtarea_Address'], $_POST['sel_Tshirt']);
		
		/* Account edit successful */
		if ($retval) {
			$_SESSION['adminuseredit'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
	}

	/* 
	 * procAddEvent - Validates and processes requests to add
	 * an event to the events database.
	 */
	function procAddEvent()
	{
		global $session, $form;
		
		/* Account add attempt */
		$retval = $session->addEvent($_POST['txt_Name'], $_POST['sel_Type'], $_POST['txtarea_eventDesc'], $_POST['sel_StartMo'], $_POST['sel_StartDay'], $_POST['sel_StartYear'], $_POST['sel_StartHr'], $_POST['sel_StartMin'], $_POST['sel_StartAmPm'], $_POST['sel_EndMo'], $_POST['sel_EndDay'], $_POST['sel_EndYear'], $_POST['sel_EndHr'], $_POST['sel_EndMin'], $_POST['sel_EndAmPm'], $_POST['sel_Hours'], $_POST['txt_Spaces'], (isset($_POST['chk_end']) ? "TRUE" : "FALSE"), (isset($_POST['chk_limited']) ? "TRUE" : "FALSE"), (isset($_POST['chk_walk']) ? "TRUE" : "FALSE"), $_POST['txt_Meet_Location'], $_POST['txt_Actual_Location'], $_POST['txt_Actual_Address'], (isset($_POST['chk_repeat']) ? "TRUE" : "FALSE"), $_POST['sel_StartMo2'], $_POST['sel_StartDay2'], $_POST['sel_StartMo3'], $_POST['sel_StartDay3'], $_POST['sel_StartMo4'], $_POST['sel_StartDay4'], $_POST['sel_StartMo5'], $_POST['sel_StartDay5']);
		/* Account Add Successful */
		if ($retval == 0) {
			$_SESSION['addevent'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Account add attempt failed */
		else if ($retval == 2) {
			$_SESSION['addevent'] = false;
			header("Location: " . $session->referrer);
		}
	}
	
	/* 
	 * procEditEvent - Validates and processes requests to edit
	 * an event currently in the events database.
	 */
	function procEditEvent()
	{
		global $session, $form;
		
		/* Event edit attempt */
		$retval = $session->editEvent($_POST['eventid'], $_POST['txt_Name'], $_POST['sel_Type'], $_POST['txtarea_eventDesc'], $_POST['sel_StartMo'], $_POST['sel_StartDay'], $_POST['sel_StartYear'], $_POST['sel_StartHr'], $_POST['sel_StartMin'], $_POST['sel_StartAmPm'], $_POST['sel_EndMo'], $_POST['sel_EndDay'], $_POST['sel_EndYear'], $_POST['sel_EndHr'], $_POST['sel_EndMin'], $_POST['sel_EndAmPm'], $_POST['sel_Hours'], $_POST['txt_Spaces'], (isset($_POST['chk_end']) ? "TRUE" : "FALSE"), (isset($_POST['chk_limited']) ? "TRUE" : "FALSE"), (isset($_POST['chk_walk']) ? "TRUE" : "FALSE"), $_POST['txt_Meet_Location'], $_POST['txt_Actual_Location'], $_POST['txt_Actual_Address']);
		/* Event Edit Successful */
		if ($retval == 0) {
			$_SESSION['editevent'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Event edit attempt failed */
		else if ($retval == 2) {
			$_SESSION['editevent'] = false;
			header("Location: " . $session->referrer);
		}
	}

	/**
	 * procDeleteEvent - Validates and processes requests to delete event
	 */
	function procDeleteEvent()
	{
		global $session;
		$session->delEvent($_GET['event']);
		header("Location: " . $session->referrer);
	}
	
	/* 
	 * procEventSignup - Validates and processes requests to sign
	 * up for an event.
	 */
	function procEventSignup()
	{
		global $session, $form;
		
		/* Event signup add attempt */
		$retval = $session->eventSignup($_POST['sel_Name'], $_POST['eventID'], $_POST['txt_Drive'], isset($_POST['chk_Lead']), $_POST['weight'], $_POST['txt_Guest']);
		
		/* Event signup Successful */
		if ($retval == 0) {
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Event signup attempt failed */
		else if ($retval == 2) {
			header("Location: " . $session->referrer);
		}
	}
	
		/* 
	 * procEventSignup - Validates and processes requests to sign
	 * up for an event.
	 */
	function procRushEventSignup()
	{
		global $session, $form;
		
		/* Event signup add attempt */
		$retval = $session->eventSignup($_POST['sel_Name'], $_POST['eventID'], $_POST['txt_Drive'], isset($_POST['chk_Lead']), $_POST['weight'], $_POST['txt_Guest']);
		
		/* Event signup Successful */
		if ($retval == 0) {
			header("Location: http://www.apousc.org/fallrush.php");
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: http://www.apousc.org/fallrush.php");
		}
		/* Event signup attempt failed */
		else if ($retval == 2) {
			header("Location: http://www.apousc.org/fallrush.php");
		}
	}

	/**
	 * procEditDrive - Validates and processes requests to flake users from a specified SERVICE event sign-up
	 */
	function procEditDrive()
	{
		global $session;
		$session->changeDrive($_GET['event'],$_GET['user'],$_GET['drive']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procEditDrive - Validates and processes requests to flake users from a specified SERVICE event sign-up
	 */
	function procAllowGuest()
	{
		global $session;
		$session->guestAllow($_GET['event'],$_GET['allowguest']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procEditDrive - Validates and processes requests to flake users from a specified SERVICE event sign-up
	 */
	function procEditGuest()
	{
		global $session;
		$session->changeGuest($_GET['event'],$_GET['user'],$_GET['guest']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procEditDrive - Validates and processes requests to flake users from a specified SERVICE event sign-up
	 */
	function procEditLead()
	{
		global $session;
		$session->changeLead($_GET['event'],$_GET['user'],$_GET['lead']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procFlake - Validates and processes requests to flake users from a specified SERVICE event sign-up
	 */
	function procFlake()
	{
		global $session;
		$session->flake($_GET['event'],$_GET['user']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procFlakeOther - Validates and processes requests to flake users from a specified NON-SERVICE event sign-up
	 */
	function procFlakeOther()
	{
		global $session;
		$session->flakeOther($_GET['event'],$_GET['user']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procDeleteSignup - Validates and processes requests to remove users from a specified event sign-up
	 */
	function procDeleteSignup()
	{
		global $session;
		$session->deleteSignup($_GET['event'],$_GET['user']);
		header("Location: " . $session->referrer);
	}


	/**
	 * procDeleteSignup - Validates and processes requests to remove users from a specified event sign-up
	 */
	function procRushDeleteSignup()
	{
		global $session;
		$session->deleteSignup($_GET['event'],$_GET['user']);
		header("Location: http://www.apousc.org/fallrush.php");
	}

	/**
	 * procWeightHalf - Validates and processes requests to give half credit to user for a specified event sign-up
	 */
	function procWeightHalf()
	{
		global $session;
		$session->weightHalf($_GET['event'],$_GET['user']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procWeightNormal - Validates and processes requests to give normal credit to user for a specified event sign-up
	 */
	function procWeightNormal()
	{
		global $session;
		$session->weightNormal($_GET['event'],$_GET['user']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procWeightDouble - Validates and processes requests to give double credit to user for a specified event sign-up
	 */
	function procWeightDouble()
	{
		global $session;
		$session->weightDouble($_GET['event'],$_GET['user']);
		header("Location: " . $session->referrer);
	}

	/*
	 * procAddAnnouncement - Validates and processes requests to add an announcement to the database
	 */
	function procAddAnnouncement()
	{
		global $session, $form;
		
		/* Announcement add attempt */
		$retval = $session->addAnnouncement($_POST['txt_Title'], $_POST['txtarea_Body']);

		/* Announcement Add Successful */
		if ($retval == 0) {
			$_SESSION['addannouncement'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Announcement add attempt failed */
		else if ($retval == 2) {
			$_SESSION['addannouncement'] = false;
			header("Location: " . $session->referrer);
		}
	}

	/**
	 * procEditAnnouncement - Validates and processes requests to edit an existing announcement
	 */
	function procEditAnnouncement()
	{
		global $session, $form;

		/* Announcement edit attempt */
		$retval = $session->editAnnouncement($_POST['txt_Title'], $_POST['txtarea_Body'], $_POST['announcementid']);

		/* Announcement Edit Successful */
		if ($retval == 0) {
			$_SESSION['editannouncement'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Announcement add attempt failed */
		else if ($retval == 2) {
			$_SESSION['editannouncement'] = false;
			header("Location: " . $session->referrer);
		}
	}

	/**
	 * procDeleteAnnouncement - Validates and processes request to delete an existing announcement
	 */
	function procDeleteAnnouncement()
	{
		global $session;
		$session->deleteAnnouncement($_GET['announcementid']);
		header("Location: " . $session->referrer);
	}

	/**
	 * procAddComment - Validates and processes requests to add event comments
	 */
	function procAddComment()
	{
		global $session, $form;

		/* Comment add attempt */
		$retval = $session->addComment($_POST['comment_username'],$_POST['comment_eventid'],$_POST['txtarea_CommentBox']);

		/* Comment Add Successful */
		if ($retval == 0) {
			$_SESSION['addcomment'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Comment add attempt failed */
		else if ($retval == 2) {
			$_SESSION['addcomment'] = false;
			header("Location: " . $session->referrer);
		}
	}

	/**
	 * procContactUs - Validates and processes requests to "Contact Us"
	 */
	function procContactUs()
	{
		global $session, $form;
		
		/* Contact Us attempt */
		$retval = $session->contactUs($_POST['txt_Name'],$_POST['txt_Email'],$_POST['tel_Phone'],$_POST['sel_Subject'],$_POST['txtarea_Message']);
		
		/* Contact message submit Successful */
		if ($retval == 0) {
			$_SESSION['submitcontact'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Contact message attempt failed */
		else if ($retval == 2) {
			$_SESSION['submitcontact'] = false;
			header("Location: " . $session->referrer);
		}
	}
	
	
		function procReminder()
	{
		global $session, $form;
		
		/* Contact Us attempt */
		$retval = $session->reminder($_POST['email']);
		
	}
	

					
	
	/**
	 * procAddNomination
	 */
	function procAddNomination()
	{
		global $session, $form;

		/* Nomination attempt */
		$retval = $session->addNomination($_POST['sel_Member'],$_POST['sel_Position']);
		
		/* Nomination Successful */
		if ($retval == 0) {
			$_SESSION['addnomination'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Nomination attempt failed */
		else if ($retval == 2) {
			$_SESSION['addnomination'] = false;
			header("Location: " . $session->referrer);
		}
	}
	function procSecondNomination()
	{
		global $session;
		$session->secondNomination($_GET['user'], $_GET['position']);
		header("Location: " . $session->referrer);
	}
	function procDeclineNomination()
	{
		global $session;
		$session->declineNomination($_GET['user'], $_GET['position']);
		header("Location: " . $session->referrer);
	}
	
	/*
	** procAddPOTW
	*/
	function procAddPOTW()
	{
		global $session, $form;

		/* Add POTW attempt */
		$retval = $session->addPOTW($_POST['txt_Week'],$_POST['txt_Title'],$_POST['txt_Caption'],$_POST['txt_SubmittedBy']);
		
		/* Add POTW Successful */
		if ($retval == 0) {
			$_SESSION['addpotw'] = true;
			header("Location: " . $session->referrer);
		}
		/* Error found with form */
		else if ($retval == 1) {
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: " . $session->referrer);
		}
		/* Add POTW attempt failed */
		else if ($retval == 2) {
			$_SESSION['addpotw'] = false;
			header("Location: " . $session->referrer);
		}
	}
}

/* Initialize process */
$process = new Process;
?>