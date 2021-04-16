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
       <p><!--Please review the <a href="docs/Officer Duties_EditedSpring2015.pdf">Officer Descriptions</a>, <a href="docs/APOAKBylawsRevisions.pdf">Bylaws</a>, and <a href="docs/Officer Election Policy (updated 7.6.15).pdf">Officer Election Policy</a> for procedures regarding elections and for a list of each position's responsibilities. If you wish to decline your nomination, please click "[Decline]" next to your name, or email <a href="mailto:webmaster.apousc@gmail.com">webmaster.apousc@gmail.com</a> so that the website administrator may decline on your behalf. <br/><br/><strong>If you are accepting your nominations, please be sure to submit the <a href="docs/F19OQ.docx">E-Board Application</a> by 11:59 PM on Sunday, April 14th. </strong></br></br>--><strong>If you would like to apply for an appointed position, please submit your A-Board Application by 11:59 PM on Monday, October 19. </strong></p> 
        
      </div>



			<!--<h2><a href="docs/F19AB.docx">Appointed Board Application</a></h2>-->
   <!--   <h2><a href="docs/F19OQ.docx">Executive Officer Application</a></h2>-->
      

			<h2>Candidate Documents</h2>
          
           <h3>President</h3>
		<ul> 
            <li><b>Anjelica Tan</b></li>
            <ul><a href = "https://drive.google.com/file/d/1MWG7oedVf61mQj1kYpXqpOPzTTvZjw2V/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://docs.google.com/document/d/1cO-PSsJKSALIVsk9aPAwIN6hvAMjhZOjSEjBScGtRJE/edit?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/19zC_fNy_TwUL1VT3D8KxMA2fRxf65_pl/view?usp=sharing"> Schedule </a></ul>
            </ul>
            
          <ul> 
            <li><b>Joshua Zhu</b></li>
            <ul><a href = "https://drive.google.com/file/d/1e5qZcwPOF8N7tYkMhGdWqRJrpfPHrf3P/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1i_OYovUURjGeaKd13qRShv3HFYvcPMFD/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1Gxaryl-PZv81ssUlFdgyUAArYRMyCymp/view?usp=sharing"> Schedule </a></ul>
            </ul>

          <ul> 
            <li><b>Matthew Ayala</b></li>
            <ul><a href = "https://drive.google.com/file/d/10dytc9w-hkdKg2wZWNOLs35Lw_xkyx_b/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1ffDDdPCDBVJeTAP-BDouv5RwicSXmnZM/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1PSvbIOHkyASdIIknRseJJfJuLyO39VnX/view?usp=sharing"> Schedule </a></ul>
            </ul>

          <h3>New Member Educator</h3>
           <ul>    
           <li><b>James Liu Tang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1PDgZl34wteJc7dXAkR_iiLZAgYV0uacW/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1FsxIir6xgBzG8hNnphiTOWukMkkhk4lW/view?usp=sharing"> Resume</a></ul>
	  <ul><a href = "https://drive.google.com/file/d/184MjOQOWRfTnRcEc4s6R8Jj-2brnw8cq/view?usp=sharing"> Schedule </a></ul>
          </ul> 

          <h3>VP of Service</h3>
	    <ul>
            <li><b>Trinity Yang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1FvvIqhDjcImx8eYYw-Fpp72-7yFC1wBN/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1KR2Iu5EFQ2b35Xp-Xnni7800bvNpcD6f/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/12nVmdWAt0nlgl3lwxVfhCMuP1tFbUovL/view?usp=sharing"> Schedule </a></ul>
             </ul> 

          <h3>Co-VP of Membership</h3>
<!-- 	<ul>
            <li><b>Naomi Lin</b></li>
            <ul><a href = "https://drive.google.com/file/d/1lwxHF1P4F--wXtkA-0mCq9xzRXUnW2Bl/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1E3oqEgHy-BOdhiCE7gRV7NSZQzlDiHF6/view?usp=sharing"> Resume </a></ul>
            <li><b>Joshua Zhu</b></li>
            <ul><a href = "https://drive.google.com/file/d/19AGS_Z3Hbrg0SBDdDh6sNFdZBHzm8Ew_/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1WxLGyazPLn525lWQE1eMYZIL-Ps80lVR/view?usp=sharing"> Resume </a></ul>

            </ul> -->

          <h3>VP of Fellowship</h3>
<!-- 			  <ul>
             
             <li><b>Anne Gao</b></li>
            <ul><a href = "https://drive.google.com/file/d/1tiC1YcrFogP-MWH_uUe7q7If8NrOm5v2/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1PiL1EfA6QoucmJz3XPHj2UeMs77Mqk5Y/view?usp=sharing"> Resume </a></ul>

              </ul> -->

          <h3>Co-VP of Finance</h3>
<!--  		        <ul>
		          <li><b>Felicia Tejawinata</b></li>
                <ul><a href = "https://drive.google.com/file/d/1y3imK-_r_fqTzokucpnrq5bcf-KwhejV/view?usp=sharing"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1Rs9MGj904qA7Gr79fnuC8BV-ju9poen-/view?usp=sharing"> Resume </a></ul>
                <li><b>Lindsey Yu</b></li>
                <ul><a href = "https://drive.google.com/file/d/1tcC7GIqU59jAmwKUmuO3o3pY7sg0Dl9G/view?usp=sharing"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1rXCT-zkvsZ-inx4I9IH7kAIkrKoeVgcU/view?usp=sharing"> Resume </a></ul>
              </ul>
            </ul>  -->

          <h3>VP of Communications</h3>
<!-- 		<ul>
                <li><b>Shania Wang</b></li>
                <ul><a href = "https://drive.google.com/file/d/1lIEUozGSWaHEygV_BN3WcK5VJX6xBB-B/view?usp=sharing"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1HWPtnrvGcxRtoahsiXhqm1bqLqvcCSZ9/view?usp=sharing"> Resume </a></ul>
              </ul> -->
            
                  
          <h3>Interchapter Chair</h3>
<!--            	<ul>
              <li><b>Lillian Ye</b></li>
              <ul><a href = "https://drive.google.com/file/d/1ChkuSaZOFJ1TGCF0BjSYJaPSI0wdwG8o/view?usp=sharing"> Application </a></ul>
              <ul><a href = "https://drive.google.com/file/d/1tcAMbM98OWiqi37fbA6tmFiV1eJ2mLRo/view?usp=sharing"> Resume </a></ul>
            </ul>  -->

<h3>Diversity and Inclusion Chair</h3>
<!-- 		<ul>
              <li><b>Jun Kim</b></li>
              <ul><a href = "https://drive.google.com/file/d/1IKhFLgPhiUuHIJR84R0oLhN9qsDfWCt_/view?usp=sharing"> Application </a></ul>
              <ul><a href = "https://drive.google.com/file/d/1TzfbIcSnDH3oyRAnlii8_2tJ_vSkbW7d/view?usp=sharing"> Resume </a></ul>
            </ul> -->
    
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
