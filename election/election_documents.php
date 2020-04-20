<?php
// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Election-Documents";
$current_page = "home";

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
<?php
	// If user is logged in, show documents
	if ($session->logged_in) {
?>

<!-- for copying and pasting purposes
						<li></li>
							<ul><a href="docs/election/fall13/"></a></ul>
-->
<br />

      <div class="contentBox">
       <p><!--Please review the <a href="docs/Officer Duties_EditedSpring2015.pdf">Officer Descriptions</a>, <a href="docs/APOAKBylawsRevisions.pdf">Bylaws</a>, and <a href="docs/Officer Election Policy (updated 7.6.15).pdf">Officer Election Policy</a> for procedures regarding elections and for a list of each position's responsibilities. If you wish to decline your nomination, please click "[Decline]" next to your name, or email <a href="mailto:webmaster.apousc@gmail.com">webmaster.apousc@gmail.com</a> so that the website administrator may decline on your behalf. <br/><br/><strong>If you are accepting your nominations, please be sure to submit the <a href="docs/F19OQ.docx">E-Board Application</a> by 11:59 PM on Sunday, April 14th. </strong></br></br>--><strong>If you would like to apply for an appointed position, please submit your A-Board Application by 11:59 PM on Monday, May 4. If you would like to apply for an elected position, please send submit your E-Board Application by 11:59pm on Sunday, April 19. They will be available to view here on this page afterwards. Below are Eboard candidate documents from last year as example. </strong></p> 
        
      </div>



			<!--<h2><a href="docs/F19AB.docx">Appointed Board Application</a></h2>-->
   <!--   <h2><a href="docs/F19OQ.docx">Executive Officer Application</a></h2>-->
      

			<h2>Candidate Documents</h2>
          
           <h3>President</h3>
          	<ul>    
           <li><b>Hansuh Lee</b></li>
            <ul><a href = "docs/election/fall20/president/hl_application.pdf"> Application </a></ul>
            <ul><a href = "docs/election/fall20/president/hl_resume.pdf"> Resume NOT SUBMITTED</a></ul>
            <ul><a href = "docs/election/fall20/president/hl_schedule.png"> Schedule NOT SUBMITTED</a></ul>

            </ul>

          <h3>Pledgemaster</h3>

          <h3>VP of Service</h3>
			    <ul>
			        
			     <li><b>Samantha Lei</b></li>
            <ul><a href = "docs/election/fall20/service/sl_application.docx"> Application </a></ul>
            <ul><a href = "docs/election/fall20/service/sl_resume.docx"> Resume </a></ul>
            <ul><a href = "docs/election/fall20/service/sl_schedule.png"> Schedule </a></ul>
             </ul>

          <h3>Co-VP of Membership</h3>
			    <ul>
            <li><b>Andrew LI</b></li>
            <ul><a href = "docs/election/fall20/membership/al_application.pdf"> Application </a></ul>
            <ul><a href = "docs/election/fall20/membership/al_resume.docx"> Resume </a></ul>
            <ul><a href = "docs/election/fall20/membership/al_schedule.pdf"> Schedule </a></ul>
            <li><b>Elliot Cha</b></li>
            <ul><a href = "docs/election/fall20/membership/ec_application.pdf"> Application </a></ul>
            <ul><a href = "docs/election/fall20/membership/ec_resume.pdf"> Resume </a></ul>
            <ul><a href = "docs/election/fall20/membership/ec_schedule.pdf"> Schedule </a></ul>

            </ul>

          <h3>VP of Fellowship</h3>
			  <ul>
             
             <li><b>Naomi Lin</b></li>
            <ul><a href = "docs/election/fall20/fellowship/nl_application.pdf"> Application </a></ul>
            <ul><a href = "docs/election/fall20/fellowship/nl_resume.pdf"> Resume </a></ul>
            <ul><a href = "docs/election/fall20/fellowship/nl_schedule.png"> Schedule </a></ul>

              </ul>

          <h3>Co-VP of Finance</h3>
		    <ul>
		        
           </ul>

          <h3>VP of Communications</h3>
            <ul>
                
            </ul>
                  
          <h3>Interchapter Chair</h3>
          	<ul>
              <li><b>Justin Chang</b></li>
              <ul><a href = "docs/election/fall20/ic/jc_application.pdf"> Application </a></ul>
              <ul><a href = "docs/election/fall20/ic/jc_resume.pdf"> Resume </a></ul>
              <ul><a href = "docs/election/fall20/ic/jc_schedule.png"> Schedule </a></ul>

            </ul>
    
			<p class="bottomNote">Note: <abbr title="Portable Document Format">PDF</abbr> files require the Adobe Reader from Adobe Systems, Incorporated. Adobe and the Adobe logo are trademarks of Adobe Systems, Incorporated. Click on the following link to download.</p>
			<a href="http://get.adobe.com/reader/"><img src="img/get_adobe_reader.png" height="39" width="158" alt="Download Adobe Reader" /></a>
<?php
	// If user is not logged in, display Restricted Area warning
	} else {
		echo "			<h2>Restricted Area</h2>\n";
		echo "			<p>Sorry, but you must be signed in to view this page.</p>\n";
	}
?>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>