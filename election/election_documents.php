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
       <p><!--Please review the <a href="docs/Officer Duties_EditedSpring2015.pdf">Officer Descriptions</a>, <a href="docs/APOAKBylawsRevisions.pdf">Bylaws</a>, and <a href="docs/Officer Election Policy (updated 7.6.15).pdf">Officer Election Policy</a> for procedures regarding elections and for a list of each position's responsibilities. If you wish to decline your nomination, please click "[Decline]" next to your name, or email <a href="mailto:webmaster.apousc@gmail.com">webmaster.apousc@gmail.com</a> so that the website administrator may decline on your behalf. <br/><br/><strong>If you are accepting your nominations, please be sure to submit the <a href="docs/F19OQ.docx">E-Board Application</a> by 11:59 PM on Sunday, April 14th. </strong></br></br>-->
	<strong>If you would like to apply for an appointed position, please submit your <a href="https://docs.google.com/document/d/18Vd460lAekF7P-1RoF9GFa0hEsk1FhFu/edit?usp=sharing&ouid=114849692149195937267&rtpof=true&sd=true">A-Board Application </a> 
						by 12:00 PM on TUESDAY, NOVEMBER 30.</strong></p>
        
      </div>



			<!--<h2><a href="docs/F19AB.docx">Appointed Board Application</a></h2>-->
   <!--   <h2><a href="docs/F19OQ.docx">Executive Officer Application</a></h2>-->
      

			<h2>Candidate Documents</h2>
          
           <h3>President</h3>
	    <ul> 
            <li><b>Trinity Yang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1evR2r8htlauzaDQf0QjMEWSitStkVqjT/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1uYpyCvgIiw4XmOmW7PzW9m89yLFAbh9j/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1XUt2-sANKqcjtHhg7PUjChBBVmsk4L3a/view?usp=sharing"> Schedule </a></ul>
		    
	    <li><b>Andrew Li</b></li>
            <ul><a href = "https://drive.google.com/file/d/1nW6NyKnoOTJXHDU1KSMj1ysjV-9aYUGG/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1CAkiqxQYZr-czlny3W3CzN0BKfcwcKrl/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1sLe3QlN91dUEIftqySy-5XzCPmAewxrT/view?usp=sharing"> Schedule </a></ul>
            </ul>
           

          <h3>New Member Educator</h3>
           <ul>    
           <li><b>Tam Hoang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1LvfMRHL20uRzkwvjm2rwjt6lE3yP-T-6/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1xzdE1kY03FRa4Nn9ewAAzKEqtxqABl2Q/view?usp=sharing"> Resume</a></ul>
	  <ul><a href = "https://drive.google.com/file/d/1hu_IvJwyLBF-URhVU6sR546PXAUJPbWG/view?usp=sharing"> Schedule </a></ul>
          </ul> 

          <h3>VP of Service</h3>
<!-- 	    <ul>
            <li><b>Trinity Yang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1FvvIqhDjcImx8eYYw-Fpp72-7yFC1wBN/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1KR2Iu5EFQ2b35Xp-Xnni7800bvNpcD6f/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/12nVmdWAt0nlgl3lwxVfhCMuP1tFbUovL/view?usp=sharing"> Schedule </a></ul>
             </ul>  -->

          <h3>Co-VP of Membership</h3>
	    <ul>
            <li><b>Matthew Torres</b></li>
            <ul><a href = "https://docs.google.com/document/d/1twLV5lghJ-yR1xB-mbP3Gc5Vpg-iKED8/edit?usp=sharing&ouid=114849692149195937267&rtpof=true&sd=true"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/158SowpdM8SDbnsVOZFiW2W8d6t0JX3WJ/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1eznMk1fU7659T75gqgl4wyPRMi0mKBIW/view?usp=sharing"> Schedule </a></ul>
            <li><b>Samantha Lei</b></li>
            <ul><a href = "https://docs.google.com/document/d/1upnmr4XvqA7G9soBS67qfoyF45N_NkbY/edit?usp=sharing&ouid=114849692149195937267&rtpof=true&sd=true"> Application </a></ul>
            <ul><a href = "https://docs.google.com/document/d/1ZrLnS7EczpGz1qZ1TgMFcQtpvv3FGS3j/edit?usp=sharing&ouid=114849692149195937267&rtpof=true&sd=true"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/185F2vzMZVjE58C1v2g5IFGUYeFa_fD7p/view?usp=sharing"> Schedule </a></ul>
            </ul>

          <h3>VP of Fellowship</h3>
	    <ul>
             <li><b>Michelle Wu</b></li>
            <ul><a href = "https://drive.google.com/file/d/1wKbJJL-bYSawci0QurKAycug43b1t0wF/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1YVvSDj15aTAxrT3e36G-3pu6GMDBJat-/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1xktOQVQa8tqhGLEtNKK6suoVeYygZY-9/view?usp=sharing"> Schedule </a></ul>
	</ul>

          <h3>Co-VP of Finance</h3>
		<ul>
		  <li><b>Queenie Quan</b></li>
		<ul><a href = "https://docs.google.com/document/d/1kQvHvPVbdSezIm2k497dVSngfgG4Wwn-/edit?usp=sharing&ouid=114849692149195937267&rtpof=true&sd=true"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1MYan1ft6it8CwmsVGet5pH_Bj-m0z0D4/view?usp=sharing"> Resume </a></ul>
	   	<ul><a href = "https://drive.google.com/file/d/16tXhZc3AWGx_VRACP8nj5qIivCFXixL3/view?usp=sharing"> Schedule </a></ul>
                <li><b>Lilly Tran</b></li>
                <ul><a href = "https://drive.google.com/file/d/1jd_tdzhfwJwIfTplYeWIdMVcrrcoN_DX/view?usp=sharing"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1FD5yk2XuOkXcPuZrglPgMsoA1C8ATuwD/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1mGQKw5GJDyHhO1_hfuA_6xko9Jn4NIbW/view?usp=sharing"> Schedule </a></ul>
              </ul>

          <h3>VP of Communications</h3>
		<ul>
                <li><b>Gabriel Genito</b></li>
                <ul><a href = "https://docs.google.com/document/d/1BPri0Mb3OIM5lQhA5kISNgbMRIqjQMep/edit?usp=sharing&ouid=114849692149195937267&rtpof=true&sd=true"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1n260JjPxLnMk6OzDsS79bCD902TAvjki/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1w7gk4bIqnqXGpeFI89L4QaVGx9qu7cjL/view?usp=sharing"> Schedule </a></ul>
              </ul>
            
                  
          <h3>Interchapter Chair</h3>
           	<ul>
              <li><b>Ryan Tsang</b></li>
              <ul><a href = "https://drive.google.com/file/d/1rU24fyqA0tqY31UX3U3chqr6J5AchVIs/view?usp=sharing"> Application </a></ul>
              <ul><a href = "https://drive.google.com/file/d/1dy3k2f5sf7RJ2ulPtvl4B4g6glvc8BOh/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1vfZ7iXP66LW2gAVaW7dsy0sfeAQH6MHv/view?usp=sharing"> Schedule </a></ul>
            </ul> 

<h3>Diversity and Inclusion Chair</h3>
		<ul>
              <li><b>Jonathan Fu</b></li>
              <ul><a href = "https://drive.google.com/file/d/1K1B5vYCLJJ0lSePdKSRpHy4w7wO4h3Lo/view?usp=sharing"> Application </a></ul>
              <ul><a href = "https://drive.google.com/file/d/1sBh4lOnogW9WV4qelWQ-TH8oNeRUq-jZ/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1DYWGTulMg15kW-GuLyYhU7FE_ic5O539/view?usp=sharing"> Schedule </a></ul>
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
