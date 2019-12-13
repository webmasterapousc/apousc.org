<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Hit Administration";
$current_page = "hit_admin";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>

<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################

if($session->isOfficer()){
echo "<h2>Hit Administration</h2><strong>Warning</strong>: This page may take a very long time (several minutes) to load, especially at the beginning of a new day when a new of set of hit logs are indexed.<br />Recording began on 2012 April 6.<br />Dates are formatted as YYMMDD.<br /><br /><br />";

$url = "topnav";
echo "<strong>".$url."</strong><br/>Note: This tracks the total number of visits to the site (all pages with the navigation bar at the top). If this number if higher than the sum of individual page totals below, then one of the individual pages is missing from the list.<ul>";
for($y=12;$y<20;$y++){
    for($m=00;$m<13;$m++){
        if($m=="0"){$m="00";}else if($m=="1"){$m="01";}else if($m=="2"){$m="02";}if($m=="3"){$m="03";}else if($m=="4"){$m="04";}else if($m=="5"){$m="05";}else if($m=="6"){$m="06";}else if($m=="7"){$m="07";}else if($m=="8"){$m="08";}else if($m=="9"){$m="09";};
        for($d=00;$d<32;$d++){
            if($d=="0"){$d="00";}else if($d=="1"){$d="01";}else if($d=="2"){$d="02";}else if($d=="3"){$d="03";}else if($d=="4"){$d="04";}else if($d=="5"){$d="05";}else if($d=="6"){$d="06";}else if($d=="7"){$d="07";}else if($d=="8"){$d="08";}else if($d=="9"){$d="09";};
            if(file_exists("hits/".$url.date($y.$m.$d).".txt")){
                $file_array = file("hits/".$url.date($y.$m.$d).".txt");
                fputs(fopen("hits/".$url.date($y.$m.$d).".txt","w"),$file_array[0]);
                echo "<li>".$y.$m.$d.": <strong>".$file_array[0]."</strong></li>";
            };
        }
    }
}
echo "</ul>";

$url = "about_ak";
include("hit_admin_entry.php");

$url = "about_apo";
include("hit_admin_entry.php");

$url = "add_announcement";
include("hit_admin_entry.php");

$url = "add_event";
include("hit_admin_entry.php");

$url = "add_pic";
include("hit_admin_entry.php");

$url = "admin";
include("hit_admin_entry.php");

$url = "admin_manual";
include("hit_admin_entry.php");

$url = "admin_useredit";
include("hit_admin_entry.php");

$url = "adminprocess";
include("hit_admin_entry.php");

$url = "ak_history";
include("hit_admin_entry.php");

$url = "alumni";
include("hit_admin_entry.php");

$url = "alumni_newsletter";
include("hit_admin_entry.php");

$url = "announcements";
include("hit_admin_entry.php");

$url = "attend";
include("hit_admin_entry.php");

$url = "attend_fam";
include("hit_admin_entry.php");

$url = "attend_fel";
include("hit_admin_entry.php");

$url = "attend_fun";
include("hit_admin_entry.php");

$url = "attend_int";
include("hit_admin_entry.php");

$url = "attend_ser";
include("hit_admin_entry.php");

$url = "beyond";
include("hit_admin_entry.php");

$url = "calendar";
include("hit_admin_entry.php");

$url = "calendar_form";
include("hit_admin_entry.php");

$url = "contact";
include("hit_admin_entry.php");

$url = "discover";
include("hit_admin_entry.php");

$url = "documents";
include("hit_admin_entry.php");

$url = "donate";
include("hit_admin_entry.php");

$url = "edit_announcement";
include("hit_admin_entry.php");

$url = "edit_event";
include("hit_admin_entry.php");

$url = "error";
include("hit_admin_entry.php");

$url = "event_page";
include("hit_admin_entry.php");

$url = "events";
include("hit_admin_entry.php");

$url = "excomm_a";
include("hit_admin_entry.php");

$url = "excomm_p";
include("hit_admin_entry.php");

$url = "forgotpass";
include("hit_admin_entry.php");

$url = "gdform";
include("hit_admin_entry.php");

$url = "history";
include("hit_admin_entry.php");

$url = "history_ecomm";
include("hit_admin_entry.php");

$url = "history_general";
include("hit_admin_entry.php");

$url = "history_pledge";
include("hit_admin_entry.php");

$url = "history_pledge_test";
include("hit_admin_entry.php");

$url = "history_rush";
include("hit_admin_entry.php");

$url = "hit_admin";
include("hit_admin_entry.php");

$url = "index";
include("hit_admin_entry.php");

$url = "join";
include("hit_admin_entry.php");

$url = "nominations";
include("hit_admin_entry.php");

$url = "officers_a";
include("hit_admin_entry.php");

$url = "officers_p";
include("hit_admin_entry.php");

$url = "pledge_info";
include("hit_admin_entry.php");

$url = "recent_activity";
include("hit_admin_entry.php");

$url = "register";
include("hit_admin_entry.php");

$url = "req_a";
include("hit_admin_entry.php");

$url = "req_assoc";
include("hit_admin_entry.php");

$url = "req_p";
include("hit_admin_entry.php");

$url = "requirements";
include("hit_admin_entry.php");

$url = "requirements_a";
include("hit_admin_entry.php");

$url = "requirements_assoc";
include("hit_admin_entry.php");

$url = "requirements_p";
include("hit_admin_entry.php");

$url = "resources";
include("hit_admin_entry.php");

$url = "roster";
include("hit_admin_entry.php");

$url = "useredit";
include("hit_admin_entry.php");

$url = "userinfo";
include("hit_admin_entry.php");

$url = "userinfo_mutual";
include("hit_admin_entry.php");

$url = "videos";
include("hit_admin_entry.php");

$url = "webformmailer";
include("hit_admin_entry.php");

$url = "webmaster_info";
include("hit_admin_entry.php");

echo "<br /><br /><strong>Note to the webmaster</strong>: If this list does not include all the pages on the web site, please cross-reference this page with the list of all files in the FTP directory and add new listings to this page using the existing syntax. Also, make sure that the current_page variable at the top of every page accurately reflects the actual name of that page on the server. For example, the current_page value for events.php should be \"events\". If the current_page value is inaccurate, hits for that page will be directed to the incorrect counter.";
}
else{echo"Sorry! You must be an officer to view this page.";}
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>