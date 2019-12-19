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
//set variables
if (isset($_GET['current_year']))
  $current_year = $_GET['current_year'];
else
  $current_year=2020;
if (isset($_GET['current_semester']))
  $current_semester = $_GET['current_semester'];
else
  $current_semester=0;

//connect to database
$connect = mysqli_connect("localhost", $DB_USER, $DB_PASS, $DB_NAME);
$message = '';


$query = "SELECT * FROM officer as O JOIN users as U ON U.username = O.username JOIN officer_position as P ON O.position = P.rank  JOIN term as T ON O.term = T.term_id WHERE((O.position >=0 && O.position<=20) || (O.position >=29 && O.position<=33)) AND T.year = '".$current_year."' AND T.semester = '".$current_semester."'   " ;;
$result = mysqli_query($connect, $query);
?>

<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################
?>
			  <div>
   <h2 align="center">
    Currently Viewing Executive Committee
    <?php
      if ($current_semester ==0) echo "Spring ";
      else echo "Fall ";
      echo $current_year;
    ?></a></h2>
   <?php echo $message; ?>

  
   <!-- form for changing year/semester to view -->
   <form id = 'tbChangeForm' name='tbChangeForm'  method="GET" action="excomm_past.php">
    <h4>  
      Change Query: year <input type="number" name = "current_year" id="current_year" min="2004" max="2030" value="<?php echo (int)($current_year); ?>">
      semester <input type="number" name = "current_semester" id="current_semester" min="0" max= "1" value="<?php echo (int)($current_semester); ?>">
      <input type="submit" value="submit">
    </h4>
   </form>
   
   <br />
   <div>
    <table id='eventTable' cellspacing='0' class='pretty'>
      <thead>
     <tr>
      <th>Position</th>
      <th>Name</th>
      <?php
        if ($session->logged_in) {echo "<th scope='col'>Phone Number</th>";}
      ?>
     </tr>
     <?php
     $i=0;
     while($row = mysqli_fetch_array($result))
     {
      $zebra = ($i % 2 == 1) ? ' class=\'zebra\'' : '';
      $i++;
      echo '
      <tr '.$zebra.'>
       <td>'.$row["title"].'</td>
       <td>'.$row["fname"]." ".$row["lname"].'</td>
       <td>'.$row["phone"].'</td>

      </tr>
      ';
     }
     ?>
   </thead>
    </table>
   </div>

  </div>

<?php
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>