<?php
// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Pledge Executive Committee";
$current_page = "contact";

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
			<h2>Pledge Executive Committee</h2>
			<noscript><p>If you are reading this message, it means that you do not have JavaScript enabled. Unfortunately, the e-mail addresses on this page are being protected from spam harvesters using JavaScript, so please enable JavaScript, switch Internet browsers, or feel free to use our <a href="contact.php">contact form</a>.</p></noscript>
			<table id="eventTable" cellspacing="0" class="pretty">
				<thead>
					<tr>
						<th scope="col">Position</th>
						<th scope="col">Name</th>
						<th scope="col">E-mail</th>
					</tr>
				</thead>
				<tbody>
					<?php
						//Increment the term value over time.
            $q = "SELECT * FROM officer as O JOIN officer_position as P ON O.position = P.rank JOIN users as U ON O.username = U.username WHERE O.position >20 && O.position <29 AND term = 19";
						$result = mysql_query($q);
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($result)) {
							$username = $row['username'];
							$mail  = $row['email'];
							$first = $row['fname'];
							$last  = $row['lname'];
							$pos   = $row['title'];
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							echo "\t\t\t\t\t<tr".$zebra.">\n";
							echo "\t\t\t\t\t\t<td>$pos</td>\n";
							echo "\t\t\t\t\t\t<td><a href=/userinfo.php?user=$username . >$first $last</a></td>\n";
							//,$mail
							echo "\t\t\t\t\t\t<td>".email_link($mail)."</td>\n";
							echo "\t\t\t\t\t</tr>\n";
							$i++;
						}
					?>
				</tbody>
			</table>
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>