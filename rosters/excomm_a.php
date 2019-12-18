<?php
// Initiate connection to database and user login session
include_once("include/session.php");

// Set values for page
$page_title = "Active Executive Committee";
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
			<noscript><p>If you are reading this message, it means that you do not have JavaScript enabled. Unfortunately, the e-mail addresses on this page are being protected from spam harvesters using JavaScript, so please enable JavaScript, switch Internet browsers, or feel free to use our <a href="contact.php">contact form</a>.</p></noscript>
					<?php   
					echo "<h3 style= \"margin-top : 0\"><a href='excomm_past.php' style= \"color:#890000\">View All Past Executive Committees >></a></h3>";
					echo "<h2>Active Executive Committee</h2>";
					if(date("n")>=0&&date("n")<5){$current_semester=0;}else{$current_semester=1;}
						$q = "SELECT * FROM officer as O JOIN users as U ON U.username = O.username JOIN officer_position as P ON O.position = P.rank  JOIN term as T ON O.term = T.term_id WHERE((O.position >=0 && O.position<=20) || (O.position >=29 && O.position<=33)) AND T.year = YEAR(CURRENT_TIMESTAMP) AND T.semester = '".$current_semester."'   " ; // Retrieve the officers for the current year (such as 2012) and current semester (such as 0, which means spring)
						$result = mysql_query($q);
						echo"<table id='eventTable' cellspacing='0' class='pretty'>
							<thead>
						<tr>
						<th scope='col'>Position</th>
						<th scope='col'>Name</th>
						<th scope='col'>E-mail</th>";
						if ($session->logged_in) {echo "<th scope='col'>Phone Number</th>";}
						echo "</tr>
						</thead>
						<tbody>";
						$i = 0; // Counter used for alternating table row colors
						while ($row = mysql_fetch_array($result)) {
							$mail  = $row['email'];
							$username = $row['username'];
							$first = $row['fname'];
							$last  = $row['lname'];
							$pos   = $row['title'];
							$phone = $row['phone'];
							$zebra = ($i % 2 == 1) ? " class=\"zebra\"" : "";
							echo "\t\t\t\t\t<tr".$zebra.">\n";
							echo "\t\t\t\t\t\t<td>$pos</td>\n";
							echo "\t\t\t\t\t\t<td><a href=/members/userinfo.php?user=$username . >$first $last</a></td>\n";
							//commented out ($mail,$mail)
							echo "\t\t\t\t\t\t<td>".$mail."</td>\n";
							if ($session->logged_in) {
								echo "\t\t\t\t\t\t<td>";
									echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
								echo "</td>\n";}

							echo "\t\t\t\t\t</tr>\n";
							$i++;
						}
						echo "</tbody>
						</table>";

					?>
				
<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>
