<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "About Alpha Phi Omega";
$current_page = "about";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";
	//--><!]]>
	</script>
	<style type="text/css" media="screen">
	</style>
<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
			<h2>About Alpha Phi Omega</h2>
			<img src="img/apo_logo.png" width="238" height="170" alt="APO torch logo" class="floatright" />
			<p><a href="http://www.apo.org/show/Guest_Home" rel="external">Alpha Phi Omega</a> (&Alpha;&Phi;&Omega;, commonly abbreviated APO) is a national coeducational service fraternity founded on the cardinal principles of Leadership, Friendship, and Service. It provides its members the opportunity to develop leadership skills as they provide service to their campus, to youth and the community, to the nation, and to members of the Fraternity.</p>
			<p>The basis of the Fraternity's brotherhood comes from a foundation of shared beliefs, experiences, and an understanding of our fraternal history and goals.</p>
			<p>Alpha Phi Omega National Service Fraternity has more than 21,000 male and female student members on over 375 college campuses nationwide. Its mission is to prepare campus and community leaders through service. Its purpose is to develop Leadership, to promote Friendship, and to provide Service to humanity. Founded at <a href="http://www.lafayette.edu/" rel="external">Lafayette College</a> in <a href="http://www.easton-pa.com/" rel="external">Easton, Pennsylvania</a> in 1925, it is a <a href="http://www.irs.gov/charities/charitable/article/0,,id=96099,00.html" rel="external">501(c)(3)</a> not-for-profit organization headquartered in <a href="http://www.ci.independence.mo.us/" rel="external">Independence, Missouri</a>. More than 375,000 members have joined Alpha Phi Omega since its founding.
			<p>Alpha Phi Omega has a very large membership, not only in America, but in Australia, the Philippines, and Canada, as well. We are the largest fraternity in the world, and even though we use a word like &quot;fraternity,&quot; female members have officially been included in the Alpha Phi Omega brotherhood since 1976.</p>
			<p>For more information about Alpha Phi Omega, please visit their official website at <a href="http://www.apo.org/" rel="external">www.apo.org</a>.</p>
			<p>The official purpose of the Fraternity is:</p>
			<blockquote>
				<p>&hellip; to assemble college students in a National Service Fraternity in the fellowship of principles derived from the <a href="http://www.scouting.org/sitecore/content/scoutparents/scouting%20basics/what%20scouting%20is/scout%20oath%20and%20law.aspx" rel="external">Scout Oath and Scout Law</a> of the <a href="http://www.scouting.org/" rel="external">Boy Scouts of America</a>; to develop Leadership, to promote Friendship, and to provide Service to humanity; and to further the freedom that is our national, educational, and intellectual heritage.</p>
			</blockquote>			
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>