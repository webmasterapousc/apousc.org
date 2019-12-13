	<!-- Google Analytics Script -->
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		"use strict";
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-20815281-1']);
		_gaq.push(['_trackPageview']);
	
		(function() {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') 

+ 

'.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();
	//--><!]]>
	
	</script>
<style>
// This adds a shadow to the top header photo
// Pls don't add, it's ugly lol
/*.shadow {*/
/*-moz-box-shadow: 0px 0px 20px 0px #333 ;*/
/*-webkit-box-shadow: 0px 0px 20px 0px #333;*/
/*box-shadow: 0px 0px 20px 0px #333;*/
/*}*/
.headerWrapper {
	text-align: center;
}
</style>	
</head>

<body>
<?php
error_reporting(0);

$file_array = file("hits/topnav".date("ymd").".txt");
$opener = fopen("hits/topnav".date("ymd").".txt","w");
$file_array[0] ++;
fputs($opener,$file_array[0]);

$file_array = file("hits/".$current_page.date("ymd").".txt");
$opener = fopen("hits/".$current_page.date("ymd").".txt","w");
$file_array[0] ++;
fputs($opener,$file_array[0]);

?>
<br /> <br/>
<div class = "headerWrapper" style= "text-align:center;"><a href="home.php"><img class="shadow" src="img/banner1.jpg" style="width:940px; height:296px"></a></div>
<br />
<div id="content" >

<?php if(!($session->logged_in)){?>
	<div id="header" >
		<ul id="menu" class="shadow">
			<li><a href="home.php"<?php if ($current_page == "home") { ?> 

class="current"<?php 

} ?>><span>Home</span></a></li>
			<li><a href="../" class="sub<?php if ($current_page == "about") { ?> 

current<?php } ?>"><span>About Us</a><!--[if gte IE 7]><!--></a><!--<![endif]-->
				<ul>
					<!--<li><a href="main">About Alpha Phi Omega</a></li>-->
					<!--<li><a href="about_ak.php">About Alpha Kappa Chapter</a></li>
					<li><a href="join.php"><strong>How to Join Us</strong></a></li>-->
				</ul>
			</li>
			<li><a href="events.php?span=soon" class="sub<?php if ($current_page == 

"events") { 

?> current<?php } ?>"><span>Events</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
				<ul>
					<li><a href="events.php?span=soon">Event Listing</a></li>
					<li><a href="calendar.php">Calendar View</a></li>
				</ul>
			</li>
			<!--<li><a href="donate.php"<?php if ($current_page == "donate") { ?> 

class="current"<?php } ?>><span>Donate</span></a></li>-->
			<li><a href="contact.php" class="sub<?php if ($current_page == "contact") { ?> 

current<?php } ?>"><span>Contact Us</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
				<!--<ul>
					<li><a href="contact.php">Contact Form</a></li>
					<li><a href="excomm_a.php">Executive Committee</a></li>
				</ul>-->
			</li>
			<li><a href="https://www.instagram.com/apousc/?hl=en"><span>Follow Us</span></a></li>
			<!--<li class="special"><a href="/recruitment/"><span>Recruitment</span></a></li>-->
			
		</ul>
        
	</div>
	<div id="mainContent-Wrapper">
		<?php } ?>

		<div id="topCap"></div>
		<div id="mainContent"><?php echo "\n" ?>
