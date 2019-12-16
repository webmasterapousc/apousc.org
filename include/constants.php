<?php
/**
 * Constants.php
 *
 * This file is intended to group all constants to
 * make it easier for the site administrator to tweak
 * the login script.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 *
 * Modified by: Brad Ramos (bradleyRamos@gmail.com)
 * Modified by : Nick Chen (nickchen@usc.edu)
 * Last Updated: January 2011
 */

/**
 * Database Constants - these constants are required
 * in order for there to be a successful connection
 * to the MySQL database. Make sure the information is
 * correct.
 */
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "str0ngThec!rcl");
define("DB_NAME", "apousc5_main");

/**
 * Password Salt String
 * Warning: Changing this string will cause all users'
 * passwords to become invalid and everyone's password
 * will need to be reset individually!
 */
define("PASSWORD_SALT", "rZWkXf1tlHTJse00wrvBvLncE");

/**
 * Database Table Constants - these constants
 * hold the names of all the database tables used
 * in the script.
 */
define("TBL_USERS", "users");
define("TBL_ACTIVE_USERS", "active_users");
define("TBL_ACTIVE_GUESTS", "active_guests");
define("TBL_BANNED_USERS", "banned_users");
define("TBL_ANNOUNCEMENTS", "announcements(title,date,body");
define("TBL_EVENTS", "events");
define("TBL_SIGNUPS", "signups");
define("TBL_COMMENTS", "comments");
define("TBL_TRANSFERS", "transfers");
define("TBL_NOMINATIONS", "nominations");
define("TBL_POTW", "potw");
define("TBL_POLLS", "polls");
define("TBL_REMINDER", "reminder_settings");
define("TBL_CALENDAR", "user_calendar");

/**
 * Special Names and Level Constants - the admin
 * page will only be accessible to the user with
 * the admin name and also to those users at the
 * admin user level. Feel free to change the names
 * and level constants as you see fit, you may
 * also add additional level specifications.
 * Levels must be digits between 0-9.
 */
define("ADMIN_NAME", "admin");
define("GUEST_NAME", "Guest");
define("ADMIN_LEVEL", 9);
define("USER_LEVEL", 1);
define("GUEST_LEVEL", 0);

/**
 * This boolean constant controls whether or
 * not the script keeps track of active users
 * and active guests who are visiting the site.
 */
define("TRACK_VISITORS", true);

/**
 * Timeout Constants - these constants refer to
 * the maximum amount of time (in minutes) after
 * their last page fresh that a user and guest
 * are still considered active visitors.
 */
define("USER_TIMEOUT", 30);
define("GUEST_TIMEOUT", 5);

/**
 * Cookie Constants - these are the parameters
 * to the setcookie function call, change them
 * if necessary to fit your website. If you need
 * help, visit www.php.net for more info.
 * <http://www.php.net/manual/en/function.setcookie.php>
 */
define("COOKIE_EXPIRE", 60 * 60 * 24 * 100); //100 days by default
define("COOKIE_PATH", "/"); //Avaible in whole domain

/**
 * Email Constants - these specify what goes in
 * the from field in the emails that the script
 * sends to users, and whether to send a
 * welcome email to newly registered users.
 */
define("EMAIL_FROM_NAME", "Alpha Phi Omega - Alpha Kappa Chapter");
define("EMAIL_FROM_ADDR", "apo@usc.edu"); // WARNING: GoDaddy's servers will not send e-mail from AOL, Gmail, Yahoo, Hotmail, Live, AIM, or MSN, so don't change this to apousc@gmail.com
define("EMAIL_WELCOME", false);

/**
 * This constant forces all users to have
 * lowercase usernames, capital letters are
 * converted automatically.
 */
define("ALL_LOWERCASE", true);

/**
 * Define member statuses. Should correspond to membership categories defined in chapter bylaws.
 */
define("ACTIVE_MEMBER", 0);
define("PLEDGE_MEMBER", 1);
define("ASSOCIATE_MEMBER", 2);
define("INACTIVE_MEMBER", 3);
define("ALUMNI_MEMBER", 4);
define("FROZEN_MEMBER", 5);
define("RUSHEE", 6);
define("ABROAD", 7);
global $memberStatus;
$memberStatus = array(
	ACTIVE_MEMBER => "Active",
	PLEDGE_MEMBER => "Pledge",
	ASSOCIATE_MEMBER => "Associate",
	INACTIVE_MEMBER => "Inactive",
	ALUMNI_MEMBER => "Alumni",
        FROZEN_MEMBER => "Frozen",
		RUSHEE => "Rushee",
		ABROAD => "Abroad"
);

/**
 * Define officer positions
 */
define("PRESIDENT", 1);
define("PLEDGE_MASTER", 2);
define("VP_SERVICE", 3);
define("VP_FELLOWSHIP", 4);
define("VP_MEMBERSHIP", 5);
define("VP_FINANCE", 6);
define("VP_COMMUNICATIONS", 7);
define("FUNDRAISING_CHAIR", 8);
define("INTERCHAPTER_CHAIR", 9);
define("SPECIAL_EVENTS", 10);
define("ALUMNI_LIAISON", 11);
define("SERGEANT_AT_ARMS", 12);
define("PUBLIC_RELATIONS", 13);
define("HISTORIAN", 14);
define("WEBMASTER", 15);
define("FUNDING_CHAIR", 16);
define("PHILANTHROPY_CHAIR", 17);
define("RUSH_CHAIR", 18);
define("EMERITUS", 19);
define("PLEDGE_AUNCLE", 20);
define("ALPHA_HEAD", 21);
define("PHI_HEAD", 22);
define("OMEGA_HEAD", 23);
define("PLEDGE_PRESIDENT", 24);
define("PLEDGE_VP_SERVICE", 25);
define("PLEDGE_VP_FELLOWSHIP", 26);
define("PLEDGE_FUNDRAISING_CHAIR", 27);
define("PLEDGE_INTERCHAPTER_CHAIR", 28);
define("FALL_FELLOWSHIP_CHAIR", 29);

global $officers;
$officers = array(
	PRESIDENT => "President",
	PLEDGE_MASTER => "Pledge Master",
	VP_SERVICE => "VP of Service",
	VP_FELLOWSHIP => "VP of Fellowship",
	VP_MEMBERSHIP => "VP of Membership",
	VP_FINANCE => "VP of Finance",
	VP_COMMUNICATIONS => "VP of Communications",
	FUNDRAISING_CHAIR => "Fundraising Chair",
	INTERCHAPTER_CHAIR => "Interchapter Chair",
	SPECIAL_EVENTS => "Special Events Coordinator",
	ALUMNI_LIAISON => "Alumni Liaison",
	SERGEANT_AT_ARMS => "Sergeant-at-Arms",
	PUBLIC_RELATIONS => "Public Relations Chair",
	HISTORIAN => "Historian",
	WEBMASTER => "Webmaster",
	FUNDING_CHAIR => "Funding Chair",
	PHILANTHROPY_CHAIR => "Philanthropy Co-Chair",
	RUSH_CHAIR => "Rush Co-Chair",
	EMERITUS => "Emeritus",
	ALPHA_HEAD => "Alpha Family Head",
	PHI_HEAD => "Phi Family Head",
	OMEGA_HEAD => "Omega Family Head",
        PLEDGE_AUNCLE => "Pledge Class Aunt / Uncle",
        PLEDGE_PRESIDENT => "Pledge Class President",
        PLEDGE_VP_SERVICE => "Pledge Class VP of Service",
        PLEDGE_VP_FELLOWSHIP => "Pledge Class VP of Fellowship",
        PLEDGE_FUNDRAISING_CHAIR => "Pledge Class Fundraising Chair",
        PLEDGE_INTERCHAPTER_CHAIR => "Pledge Class Interchapter Chair",
	FALL_FELLOWSHIP_CHAIR => "Fall Fellowship Co-Chair"
);


/**
 * Define pledge officer positions
 */
define("PLEDGE_PRESIDENT", 1);
define("PLEDGE_VP_SERVICE", 2);
define("PLEDGE_VP_FELLOWSHIP", 3);
define("PLEDGE_SECRETARY", 4);
define("PLEDGE_FUNDRAISING_CHAIR", 5);
define("PLEDGE_INTERCHAPTER_CHAIR", 6);
define("PLEDGE_HISTORIAN", 7);

global $officers_pledge;
$officers_pledge = array(
        PLEDGE_PRESIDENT => "Pledge Class President",
        PLEDGE_VP_SERVICE => "Pledge Class VP of Service",
        PLEDGE_VP_FELLOWSHIP => "Pledge Class VP of Fellowship",
        PLEDGE_SECRETARY => "Pledge Class Secretary",
        PLEDGE_FUNDRAISING_CHAIR => "Pledge Class Fundraising Chair",
        PLEDGE_INTERCHAPTER_CHAIR => "Pledge Class Interchapter Chair",
        PLEDGE_HISTORIAN => "Pledge Class Historian"
);


/**
 * Define APO Families
 */
define("ALPHA_FAMILY", 0);
define("PHI_FAMILY", 1);
define("OMEGA_FAMILY", 2);
define("RUSH", 3);
global $families;
$families = array(
	ALPHA_FAMILY => "Alpha",
	PHI_FAMILY => "Phi",
	OMEGA_FAMILY => "Omega",
	RUSH => "Rushee - No Family"
);

/**
 * Months of the year
 */
global $monthsOfTheYear;
$monthsOfTheYear = array(
	1 => "January",
	2 => "February",
	3 => "March",
	4 => "April",
	5 => "May",
	6 => "June",
	7 => "July",
	8 => "August",
	9 => "September",
	10 => "October",
	11 => "November",
	12 => "December"
);

/**
 * Abbreviated months of the year
 */
global $abbrevMonthsOfTheYear;
$abbrevMonthsOfTheYear = array(
	1 => "Jan.",
	2 => "Feb.",
	3 => "Mar.",
	4 => "Apr.",
	5 => "May",
	6 => "Jun.",
	7 => "Jul.",
	8 => "Aug.",
	9 => "Sep.",
	10 => "Oct.",
	11 => "Nov.",
	12 => "Dec."
);
/**
 * Days of the week
 */
global $daysOfTheWeek;
$daysOfTheWeek = array(
	"Sunday",
	"Monday",
	"Tuesday",
	"Wednesday",
	"Thursday",
	"Friday",
	"Saturday"
);

/**
 * Event types
 */
global $eventType;
$eventType = array(
	0 => "Service",
	1 => "Fellowship",
	2 => "Fundraising",
	3 => "Interchapter",
	4 => "Membership",
        5 => "Other",
        6 => "Alumni",
        7 => "Philanthropy",
        8 => "Publicity",
        9 => "Special",
        10 => "Alpha Family",
        11 => "Phi Family",
        12 => "Omega Family",
        13 => "ICervice",
        14 => "Pledge Membership",
        15 => "Canceled",
        16 => "Diversity & Inclusion"
);

/**
 * Pledge Classes
 */
global $pledgeClasses;
$pledgeClasses = array(
20000 => "Alpha",
20011 => "Beta",
20010 => "Gamma",
20021 => "Delta",
20020 => "Epsilon",
20031 => "Zeta",
20030 => "Eta",
20041 => "Theta",
20040 => "Iota",
20051 => "Kappa",
20050 => "Lambda",
20061 => "Mu",
20060 => "Nu",
20071 => "Xi",
20070 => "Omicron",
20081 => "Pi",
20080 => "Rho",
20091 => "Sigma",
20090 => "Tau",
20101 => "Upsilon",
20100 => "Phi",
20111 => "Chi",
20110 => "Psi",
20121 => "Omega",
20120 => "Alpha Alpha",
20131 => "Alpha Beta",
20130 => "Alpha Gamma",
20141 => "Alpha Delta",
20140 => "Alpha Epsilon",
20151 => "Alpha Zeta",
20150 => "Alpha Eta",
20161 => "Alpha Theta",
20160 => "Alpha Iota",
20171 => "Alpha Kappa",
20170 => "Alpha Lambda",
20181 => "Alpha Mu",
20180 => "Alpha Nu",
20191 => "Alpha Xi",
20190 => "Alpha Omicron",
20201 => "Alpha Pi",
20200 => "Alpha Rho",
20211 => "Alpha Sigma",
20210 => "Alpha Tau",
20221 => "Alpha Upsilon",
20220 => "Alpha Phi",
20231 => "Alpha Chi",
20230 => "Alpha Psi",
20241 => "Alpha Omega"
);
?>
