<?php
// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Help Us Give Back: Donating to Alpha Phi Omega";
$current_page = "donate";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";

		var validateAmount = function (amount) {
			if (amount.value.match(/^[0-9]+(\.([0-9]+))?$/)) {
				return true;
			} else {
				alert('You must enter a valid donation.');
				amount.focus();
				return false;
			}
		};

		$(document).ready(function () {
			makeRound("#mainContent .adr","10","10","10","10");
			$("#item_price_1").focus(function () {
				if (this.value == this.defaultValue) {
					this.value = '';
				}
				if (this.value != this.defaultValue) {
					this.select();
				}
			}).blur(function () {
				if ($.trim(this.value) == '') {
					this.value = (this.defaultValue ? this.defaultValue : '');
				}
			});
		});
	//--><!]]>
	</script>
	<style type="text/css" media="screen">
	<!--
		ul.dollar{list-style-type:none !important}
		ul.dollar li{margin-bottom:2em}
		ul.dollar ol li{margin-bottom:0.1em;margin-left:1.5em}
		strong.dollar{font-size:3em;color:#fb0}
		em.dollar{color:#900;font-weight:700}
		.floatleft{margin:0.5em 1.5em 1.5em 0}
		.floatright{margin:0.5em 0 1.5em 1.5em}
		#mainContent .adr{background:#ff9;border:1px solid #fc0;color:#333;margin:1em 2em;padding:1em 1.5em;width:18em}
	-->
	</style>
<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
			<h2>Donating to Alpha Phi Omega</h2>
			<p>Please, help us help others. <a href="#methods">Donate now</a>!</p>
			<h3>What Your Money Can Do</h3>
			<ul class="dollar">
				<li><img src="img/donate11.png" height="197" width="241" alt="PB&amp;J sandwich making" class="floatleft" /><strong class="dollar">$5</strong> will <em class="dollar">help</em> us to provide 20 <abbr title="Peanut Butter &amp; Jelly">PB&amp;J</abbr> sandwiches for the homeless on L.A.'s Skid Row</li>
				<li><strong class="dollar">$10</strong> will <em class="dollar">allow</em> us to purchase a semester's worth of beach/park cleanup materials (trash bags, rubber gloves, etc.)</li>
				<li class="clear"><img src="img/donate5.png" height="186" width="215" alt="Greeting cards" class="floatright" /><strong class="dollar">$25</strong> will <em class="dollar">fully supply</em> us with arts &amp; crafts supplies to make special cards for people such as terminally ill children or our troops abroad</li>
				<li><strong class="dollar">$50</strong> will <em class="dollar">enable</em> us to fund a pancake fundraiser and raise hundreds of dollars for <a href="http://www.teamfox.org/" rel="external">Team Fox's</a> <a href="http://www.pancakesforparkinsons.org/" rel="external">Pancakes for Parkinson's</a></li>
				<li class="clear"><img src="img/donate10.png" height="174" width="223" alt="Playing with kids" class="floatleft" /><strong class="dollar">$100</strong> will <em class="dollar">aid</em> us in purchasing all the paint and tools necessary to re-paint and repair a poor, under-funded school in the local community</li>
				<li><strong class="dollar">$500</strong> will <em class="dollar">fully fund</em> our <em class="dollar">signature annual philanthropy event</em> &mdash; the campus community-wide <a href="http://www.trojanyardsale.com" rel="external">USC Yard Sale</a> where we:
					<ol class="clear">
						<li><img src="img/donate1.png" height="168" width="191" alt="USC Yard Sale" class="floatright" />Serve USC students by giving them a <em class="dollar">FREE</em> opportunity to sell unwanted items for a profit, instead of throwing them into the trash</li>
						<li>Serve those in need in the local community (and help save the environment) by donating used items in good condition to deserving community organizations</li>
						<li>Serve and show our appreciation to the members of the campus community</li>
					</ol>
				</li>
			</ul>
			<h3>Why Support Us?</h3>
			<ol>
				<li>We are a <em class="dollar">100% non-profit organization</em> serving in the USC community and around the world, performing community service and humanitarian works without compensation</li>
				<li><img src="img/donate4.png" height="186" width="219" alt="Building wheelchairs" class="floatright" />We are a <em class="dollar">widely-recognized</em> college service organization consisting of <em class="dollar">eager volunteers</em> and <em class="dollar">supported</em> by our university and thousands of dedicated alumni</li>
				<li>We <em class="dollar">push our potential</em> each year, doing <em class="dollar">more and more</em> for the community. While our members perform thousands of community services hours each semester without monetary compensation, the cold hard truth is that many of our planned events are <em class="dollar">not possible without adequate funding</em>.</li>
				<li>We are a certified 501(c)(3) not-for-profit organization, which means that your donation to Alpha Phi Omega - Alpha Kappa Chapter is <em class="dollar">tax deductible</em></li>
				<li>We <em class="dollar">promise</em> in return to do our best to give back and to provide <em class="dollar">service to the Campus, Community, and Country</em></li>
			</ol>
			<h3 id="methods">Donation Methods</h3>
			<ul>
				<li>
					<strong>Check</strong>: Make checks payable to &quot;<em>Alpha Phi Omega &ndash; Alpha Kappa</em>&quot; and mail to
					<div class="adr">
						<div class="org fn">
							<div class="organization-name">Alpha Phi Omega</div>
						</div>
						<div class="street-address">3607 Trousdale Parkway, <abbr title="Ronald Tutor Campus Center">TCC</abbr> 330</div>
						<span class="locality">Los Angeles</span>, 
						<span class="region">CA</span>
						<span class="postal-code">90089</span>
					</div>
				</li>
				<li><strong>Other</strong>: If you would like to help us in volunteering by making a non-monetary donation of food, materials, etc., please <a href="contact.php">contact us</a>.</li>
			</ul>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>