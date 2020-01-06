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
<div class = "headerWrapper" style= "text-align:center;"><a href="../members/home.php"><img class="shadow" src="img/banner1.jpg" style="width:940px; height:296px"></a></div>
<div id="content" >

<?php if(!($session->logged_in)){?>
	
	<div id="mainContent-Wrapper">
		<?php } ?>

		<div id="topCap"></div>
		<div id="mainContent"><?php echo "\n" ?>
