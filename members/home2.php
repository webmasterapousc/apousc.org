<?php session_start(); ?> 
<?php
// Initiate connection to database and user login session
include("include/session.php");

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







<!-- start of announcements sections -->


<?php
echo "<div class='status'>";
echo "<br /><div class='highlight'><a href='announcements.php'>Announcements</a></div><ul>";
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






<div class='highlight' > <span src='http://www.apousc.posterous.com'><span></div>
<!--Youtube channel-->
<h2>APO Youtube Channel</h2>
<iframe src="http://www.youtube.com/embed/?listType=user_uploads&list=apousc" width="480" height="400"></iframe>   
<!--<iframe id="iframecode" onload="" scrolling="no" marginheight="0" frameborder="0" width="480" src="http://ytchannelembed.com/gallery.php?vids=3&amp;user=apousc&amp;row=3&amp;width=150&amp;hd=1&amp;margin_right=15&amp;desc=100&amp;desc_color=9E9E9E&amp;title=30&amp;title_color=000000&amp;views=1&amp;likes=1&amp;dislikes=1&amp;fav=1&amp;playlist=" style="height: 250px;"></iframe>-->

<!--Flickr Stream-->
<h2>APO Flickr</h2>
<object width="400" height="310" class=""> <param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to="></param> <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=109615"></param> <param name="allowFullScreen" value="true"></param><embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=109615" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to=" width="320" height="240"></embed></object>

<!--Start of Events Sign Ups -->


<?php

echo "</ul><br /><div class='highlight'>Events</div><ul>";
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

echo "</ul><br /><div class='highlight'>Comments</div><ul>";
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


echo "</ul><br /><div class='highlight'>Signups</div><ul>";
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
<object width="320" height="240" class="floatright"> <param name="flashvars" value="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to="></param> <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=109615"></param> <param name="allowFullScreen" value="true"></param><embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/slideshow/show.swf?v=109615" allowFullScreen="true" flashvars="offsite=true&lang=en-us&page_show_url=%2Fphotos%2F74876704%40N08%2Fshow%2F&page_show_back_url=%2Fphotos%2F74876704%40N08%2F&user_id=74876704@N08&jump_to=" width="320" height="240"></embed></object>
			<p>Welcome to the home page of the Alpha&nbsp;Kappa Chapter of Alpha&nbsp;Phi&nbsp;Omega at the University of Southern California.</p>
			<p><strong>Alpha Phi Omega</strong> is an international, co-educational service fraternity that has set the standard for college campus-based volunteerism since 1925. With active chapters on over 375 American campuses, Alpha Phi Omega is the largest collegiate fraternity in the United States. We strive to help each individual member develop leadership skills, experience friendship on many levels, and provide service to others. With an active membership of approximately 21,000 students and over 350,000 alumni members, the Alpha Phi Omega family is here for you.</p>
			<p>Alpha Phi Omega &ndash; Alpha Kappa Chapter is <abbr title="University of Southern California">USC</abbr>'s premier co-ed community service-based leadership fraternity, derived from the ideals and principles of the Boys Scouts of America. All undergraduate and graduate students of any major are invited to check us out! If you have any questions, please feel free to <a href="contact.php">contact us</a>.</p>

<?php } ?>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>





