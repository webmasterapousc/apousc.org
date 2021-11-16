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
<!-- 		<ul> 
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
            </ul> -->

          <h3>New Member Educator</h3>
<!--            <ul>    
           <li><b>James Liu Tang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1PDgZl34wteJc7dXAkR_iiLZAgYV0uacW/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1FsxIir6xgBzG8hNnphiTOWukMkkhk4lW/view?usp=sharing"> Resume</a></ul>
	  <ul><a href = "https://drive.google.com/file/d/184MjOQOWRfTnRcEc4s6R8Jj-2brnw8cq/view?usp=sharing"> Schedule </a></ul>
          </ul>  -->

          <h3>VP of Service</h3>
<!-- 	    <ul>
            <li><b>Trinity Yang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1FvvIqhDjcImx8eYYw-Fpp72-7yFC1wBN/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1KR2Iu5EFQ2b35Xp-Xnni7800bvNpcD6f/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/12nVmdWAt0nlgl3lwxVfhCMuP1tFbUovL/view?usp=sharing"> Schedule </a></ul>
             </ul>  -->

          <h3>Co-VP of Membership</h3>
<!-- 	    <ul>
            <li><b>Andrew Li</b></li>
            <ul><a href = "https://drive.google.com/file/d/1xZHHwOTjRQpDgSBPf1SAue2PI7TCkyVC/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1OiSou1hWbBqKuJjWnp20wF6BtuMc1uqs/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1qWQgE_EbMmr6IGQug3VTlWQ0i7VPaKfZ/view?usp=sharing"> Schedule </a></ul>
            <li><b>Michelle Liang</b></li>
            <ul><a href = "https://drive.google.com/file/d/1MURYleX_KyVrxAj-fjn0S-LhIMvMHM8b/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1OkIZsNs76J5DW3pDw1gDjgXMNg1YHvrz/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1x3_wyek0fKFm1ef4yWFSdrkI0Qc9S6Q9/view?usp=sharing"> Schedule </a></ul>
            </ul> -->

          <h3>VP of Fellowship</h3>
<!-- 	    <ul>
             <li><b>Felicia Tejawinata</b></li>
            <ul><a href = "https://drive.google.com/file/d/13QJ18fx7zojjOaByL9LutTpX-uJFqty0/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1-5U0DKMt4sEce1wfmEWr8morWpsVd1WY/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1zGr51TV88-So8fL27vBspQOLot4xHCqg/view?usp=sharing"> Schedule </a></ul>
		    
             <li><b>Raymond Machado</b></li>
            <ul><a href = "https://drive.google.com/file/d/1qyHe6DXqImoalu66qxl1KGTIYrRcxJur/view?usp=sharing"> Application </a></ul>
            <ul><a href = "https://drive.google.com/file/d/1T6zKHw_DH2iRZulo7P3J_sgT8Lvj1apr/view?usp=sharing"> Resume </a></ul>
	    <ul><a href = "https://drive.google.com/file/d/1nRHLvdOL7Czj_FsZkepDcbbgIS7I_e7B/view?usp=sharing"> Schedule </a></ul>
              </ul>
 -->
          <h3>Co-VP of Finance</h3>
<!-- 		<ul>
		  <li><b>Michelle Ramos</b></li>
		<ul><a href = "https://docs.google.com/document/d/1Zggv78WXo3X-_wb5FNda2h2krrIfFVyDCQi5eYoP7lc/edit?usp=sharing"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1j47yhz2ismsXEEghvEQCNmMQdVmsjK4_/view?usp=sharing"> Resume </a></ul>
	   	<ul><a href = "https://drive.google.com/file/d/1mUpj6C4wiRSqVDND0focmkcuZvTfz150/view?usp=sharing"> Schedule </a></ul>
                <li><b>Shania Wang</b></li>
                <ul><a href = "https://drive.google.com/file/d/1V_hmv4e6jUDED9GCKZz014g_RLWYR1HK/view?usp=sharing"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/18dHoeIaYhG-W7qsIf2P9wAuUMY_N0o2Q/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1G8j9tRgW4tinYxfH7sDfQzZrQ2Aqcts5/view?usp=sharing"> Schedule </a></ul>
              </ul>
            </ul>  -->

          <h3>VP of Communications</h3>
<!-- 		<ul>
                <li><b>Lindsey Yu</b></li>
                <ul><a href = "https://drive.google.com/file/d/1NxKBNGzbFXrVBpD_QFpIG_44uRb-lw5n/view?usp=sharing"> Application </a></ul>
                <ul><a href = "https://drive.google.com/file/d/1tbjIQAfDTMCC7YoX7oGZixh7KhG5hhhR/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/15SZ_ww7PvCv-TgGRigu73LIl_vFeWjf-/view?usp=sharing"> Schedule </a></ul>
              </ul> -->
            
                  
          <h3>Interchapter Chair</h3>
<!--            	<ul>
              <li><b>Brian Chau</b></li>
              <ul><a href = "https://docs.google.com/document/d/1neVt5xFtXFFk1wS4LZUU-UdWURVgahSLk6Ywfowcxxo/edit?usp=sharing"> Application </a></ul>
              <ul><a href = "https://docs.google.com/document/d/14vcmaUlaoCy4URSNAuaazGRmJIV3dlIOnONt4T1PYHE/edit?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1vQKUk-L9DjuZ8n9OA5DAFqlrRCxuyYxM/view?usp=sharing"> Schedule </a></ul>
            </ul>  -->

<h3>Diversity and Inclusion Chair</h3>
<!-- 		<ul>
              <li><b>Jonathan Fu</b></li>
              <ul><a href = "https://drive.google.com/file/d/1ks10Q51rXWWRIgGyVtDNsaEyEzd8hIoC/view?usp=sharing"> Application </a></ul>
              <ul><a href = "https://drive.google.com/file/d/1yiZWDzxuQ0WRLPz69Hsc0m3G2R3s_aCh/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1J-HE8YdDpJKbjqZHgMQdYeYvcczrWA1N/view?usp=sharing"> Schedule </a></ul>
			
		<li><b>Mel Wang</b></li>
              <ul><a href = "https://drive.google.com/file/d/1ej_p0V0jN7BKd8-sHkVCfEu5ET2V1loC/view?usp=sharing"> Application </a></ul>
              <ul><a href = "https://drive.google.com/file/d/1sW1Wvnutlkf0XAwQ8V0Ob0pDPPDUT60M/view?usp=sharing"> Resume </a></ul>
	    	<ul><a href = "https://drive.google.com/file/d/1BlfRl6OPGULTuafT1kKLnJMJ0Lxvlr6z/view?usp=sharing"> Schedule </a></ul>
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
