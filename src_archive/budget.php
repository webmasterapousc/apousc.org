<?php 

include_once("include/session.php");

$page_title = "Alpha Kappa Budget";
$current_page = "budget";

// Load Header
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

<h3 style="margin-top:0">Submitted Budget for Spring 2019</h3>
<iframe src="https://docs.google.com/spreadsheets/d/e/2PACX-1vT7XZZWkhtClHrlCB6P5iF8tZI0g6eY0ulonNn3V3ikFGrjaORMEztuzI_Oeoo9ZQpt_i2ebXVIbJKM/pubhtml?gid=1809411573&amp;single=true&amp;widget=true&amp;headers=false" width="100%" height= "977"></iframe>


<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>