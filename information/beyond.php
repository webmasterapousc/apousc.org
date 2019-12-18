<?php
// Google Analytics
include_once("include/analytics.php");

// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Beyond Alpha Kappa";
$current_page = "beyond";

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
?>
			<h2>Beyond Alpha Kappa</h2>
			<p>Here you'll find information on our section, region, and national chapter.</p>
			<h3>Interchapter Web Sites</h3>
			<ul>
				<li><a href="http://www.apo.org/" rel="external">Alpha Phi Omega&mdash;United States</a></li>
				<ul>
					<li><a href="http://www.apor10.org/" rel="external">Alpha Phi Omega &mdash; Region X</a></li>
					<ul>
						<li>Alpha Phi Omega - Section One</li>
						<ul>
							<li><a href="http://www.aposdsu.org/" rel="external">Alpha Delta Chapter</a> &mdash; <abbr title="San Diego State University">SDSU</abbr></li>
							<li><a href="http://www.aphioadt.com/" rel="external">Alpha Delta Theta Chapter</a> &mdash; <abbr title="University of California, Riverside">UCR</abbr></li>
							<li><a href="http://apounlv.org/" rel="external">Alpha Zeta Upsilon Chapter</a> &mdash; <abbr title="University of Nevada, Las Vegas">UNLV</abbr></li>
							<li><a href="http://www.apo-x.org/" rel="external">Chi Chapter</a> &mdash; <abbr title="University of California, Los Angeles">UCLA</abbr></li>
							<li><a href="http://apoee.weebly.com/" rel="external">Eta Eta Chapter</a> &mdash; <abbr title="Arizona State University">ASU</abbr></li>
							<li><a href="http://www.iotaphi.org/" rel="external">Iota Phi Chapter</a> &mdash; <abbr title="University of California, Davis">UCD</abbr></li>
							<li><a href="http://www.calstatela.edu/orgs/apocsla/" rel="external">Lambda Mu Chapter</a> &mdash; <abbr title="California State University, Los Angeles">CSULA</abbr></li>
							<li><a href="http://www.apocsuf.org/" rel="external">Omega Sigma Chapter</a> &mdash; <abbr title="California State University, Fullerton">CSUF</abbr></li>
							<li><a href="http://ucsbaphio.webs.com/" rel="external">Psi Chapter</a> &mdash; <abbr title="University of California, Santa Barbara">UCSB</abbr></li>
							<li><a href="http://www.csulb.edu/greek/apo/" rel="external">Rho Gamma Chapter</a> &mdash; <abbr title="California State University, Long Beach">CSULB</abbr></li>
							<li><a href="http://www.aporhopi.org/" rel="external">Rho Phi Chapter</a> &mdash; <abbr title="University of California, San Diego">UCSD</abbr></li>
							<li><a href="http://www.clubs.uci.edu/aphio/" rel="external">Rho Rho Chapter</a> &mdash; <abbr title="University of California, Irvine">UCI</abbr></li>
							<li><a href="http://www.apoti.org/" rel="external">Theta Iota Chapter</a> &mdash; <abbr title="University of Arizona">UA</abbr></li>
							<li><a href="http://www.apo-zo.com/" rel="external">Zeta Omicron Chapter</a> &mdash; <abbr title="California Polytechnic State University, San Luis Obispo">Cal Poly SLO</abbr></li>

						</ul>
					</ul>
				</ul>
				<li><a href="http://www.apoonline.org/community/" rel="external">APO Online</a> &mdash; APO online community</li>
				<li><a href="http://www.apo.org.ph/" rel="external">Alpha Phi Omega&mdash;Philippines</a></li>
			</ul>
			<h3>Volunteering Opportunities</h3>
			<ul>
				<li><a href="http://www.trojandm.org/" rel="external">Dance Marathon at USC</a></li>
				<li><a href="http://www.habitat.org/" rel="external">Habitat for Humanity</a></li>
				<li><a href="http://www.laworks.com/" rel="external">L.A. Works</a></li>
				<li><a href="http://www.midnightmission.org/" rel="external">The Midnight Mission</a></li>
				<li><a href="http://www.pancakesforparkinsons.org/" rel="external">Pancakes for Parkinson's</a>
				<li><a href="http://readingtokids.org/" rel="external">Reading to Kids</a></li>
				<li><a href="http://www.relayforlife.org/relay/" rel="external">Relay for Life</a></li>
				<li><a href="http://swimwithmike.org/" rel="external">Swim with Mike</a></li>
				<li><a href="http://sait.usc.edu/volunteer/" rel="external">USC Volunteer Center</a></li>
			</ul>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>