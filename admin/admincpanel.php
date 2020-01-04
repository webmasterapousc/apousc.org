
<?php
include_once("include/session.php");
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if (!$session->isAdmin()) {
  echo "<h2>Restricted Area</h2>\n";
  echo "<p>Sorry, but this page is a restricted area. You must be logged in as the site administrator in order to gain access.</p>\n";
} else {
  /**
   * Administrator is viewing page, so display all
   * forms.
   */

if (isset($_GET['current_year']))
  $current_year = $_GET['current_year'];
else
  $current_year=2020;
if (isset($_GET['current_semester']))
  $current_semester = $_GET['current_semester'];
else
  $current_semester=0;

//index.php
$mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$message = '';

//cross
if(isset($_POST["crossing"]))
{
  //update all pledges to actives by changing status from 1 to 0
  $ps = $mysqli->prepare("UPDATE users SET `status` = 0 WHERE `status`=1");
  $ps->execute();
  header("location: admincpanel.php?crossing=1"); 
}

//upload
if(isset($_POST["upload"]))
{
 if($_FILES['uploaded_file']['name'])
 {
  $filename = explode(".", $_FILES['uploaded_file']['name']);
  //echo $_FILES['uploaded_file']['name'];
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['uploaded_file']['tmp_name'], "r");
   $semester = null;
   $year = null;
   $term = null;
   $data = fgetcsv($handle);
   //get term from upload_year and upload_semester
   $upload_year = $_POST['upload_year'];
   $upload_semester = $_POST['upload_semester'];
   
   while($data = fgetcsv($handle))
   {
    $position_id = $data[0];
    $officer_fname = $data[2];
    $officer_lname = $data[3];

    if (empty($term)) {
      $year = $data[4];
      $semester = $data[5];
      $ps = $mysqli->prepare("SELECT * FROM term WHERE year = ? AND semester = ?");
      $ps->bind_param("ii", $year, $semester);
      $ps->execute();
      $result = $ps->get_result();
      $row = $result->fetch_array();
      $term = $row['term_id'];
    }
    
    $ps = $mysqli->prepare("SELECT * FROM users WHERE fname = ? AND lname = ?");
    $ps->bind_param("ss", $officer_fname, $officer_lname);
    $ps->execute();
    $result = $ps->get_result();

    $row = $result->fetch_array();
    $username = $row['username'];

    $ps = $mysqli->prepare("INSERT INTO officer(username, term, position) VALUES (?, ?, ?)");
    $ps->bind_param("sii", $username, $term, $position_id);
    $ps->execute();
   }
   fclose($handle);
   header("location: admincpanel.php?updating=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  } 
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updating"]))
{
 $message = '<label class="text-success">Eboard Updating Done</label>';
}

$query = "SELECT * FROM officer as O JOIN users as U ON U.username = O.username JOIN officer_position as P ON O.position = P.rank  JOIN term as T ON O.term = T.term_id WHERE((O.position >=0 && O.position<=20) || (O.position >=29 && O.position<=33)) AND T.year = '".$current_year."' AND T.semester = '".$current_semester."'   " ;;
$result = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>APOUSC Admin Control Panel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />

  <div class="container">
   <h2 align="center">ALL POWERFUL APOUSC ADMIN CONTROL PANEL</a></h2>
   <img src="laughs.gif" style="display: block;
                               margin-left: auto;
                               margin-right: auto;
                               width: 50%;">
   <p></p>
   <p>Hello, welcome to the APOUSC Admin Control Panel. On this page, you'll be able to</p>
   <ul>
    <li>change all current pledges to actives</li>
    <li>change graduating actives to alumni (TODO) </li>
    <li>add new pledge excomm</li>
    <li>add new excomm</li>
    <li>view current/past excomm</li>
   </ul>
  </div>

  </div>

  <div class="container"> 
    <h3 align="center">Change Pledges to Actives</h3>
    <p> Press the button to turn all pledges to actives! </p>
    <!-- form for changing pledges to actives -->
    <form method="post" enctype='multipart/form-data'>
      <input type="submit" name="crossing" value="Cross their asses" class="btn btn-info" onclick=
    "confirm('Ya sure u wanna turn these pledges into actives?');
      return confirm('Aight.');"/>
   </form>
  </div>
<?php
  if(isset($_GET["crossing"]))
  {
    echo '<div class="container"><label class="text-success">All Pledges Are Now Actives</label></div>';
  }
?>
  <div class="container">
   <h3 align="center">Change Graduating Actives to Alumni (TODO)</a></h3>
   <br />
   <p> Please complete the csv template found in the google drive then upload it here to turn graduating Actives to Alumni</p>
   <!-- form for graduating actives -->
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Format)</label>
    <input type="file" name="uploaded_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
  </div>

  <div class="container">
   <h3 align="center">Add Pledge Excomm</a></h3>
   <br />
   <p> Please complete the csv template found in the google drive then upload it here to add new Pledge Excomm</p>
   <!-- form for adding excomm -->
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Format)</label>
    <input type="file" name="uploaded_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" onclick=
    "confirm('Are you sure you want to add new PLEDGE excomm? This will be a pain in the ass to correct if something\'s wrong...');
      confirm('YO! THIS IS PLEDGE EXCOMM!! NOT NORMAL EXCOMM!! That is what you\'re trying to add right?');
      confirm('OK. You should check over each entry and make sure there are no mispellings');
      return confirm('Last Chance to cancel.');"/>
   </form>
   </h3>
  </div>

  <div class="container">
   <h3 align="center">Add Excomm</a></h3>
   <br />
   <p> Please complete the csv template found in the google drive then upload it here to add new Excomm</p>
   <!-- form for adding excomm -->
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Format)</label>
    <input type="file" name="uploaded_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" onclick=
    "confirm('Are you sure you want to add new excomm? This will be a pain in the ass to correct if something\'s wrong...');
      confirm('OK. You should check over each entry and make sure there are no mispellings');
      return confirm('Last Chance to cancel.');"/>
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">
   Viewing Executive Committee
    <?php
      if ($current_semester ==0) echo "Spring ";
      else echo "Fall ";
      echo $current_year;
    ?></a>
   </h3>

  <!-- code for changing the table -->
  <script type="text/javascript"></script>
  <script>
    function doSearch() {
      $.ajax({
        url: "admincpanel.php",
        data: {
          current_year: $("#current_year").val(),
          current_semester: $("#current_semester").val()
        },
        success: function(result) {
          $("html").empty();
          $("html").append(result);
        }
      })
    }
  </script>

   <!-- form for changing year/semester to view -->
   <form id = 'tbChangeForm' name='tbChangeForm'  method="GET" action="admincpanel.php">
    <h4>  
      year <input type="number" name = "current_year" id="current_year" min="2004" max="2030" value="<?php echo (int)($current_year); ?>">
      semester <input type="number" name = "current_semester" id="current_semester" min="0" max= "1" value="<?php echo (int)($current_semester); ?>">
      <input type="button" value="submit" onclick="doSearch();">
    </h4>
   </form>
   
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Position</th>
      <th>Name</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["title"].'</td>
       <td>'.$row["fname"]." ".$row["lname"].'</td>
      </tr>
      ';
     }
   }
     ?>
    </table>
   </div>
  </div>
  <img src="sleepy.gif" style="display: block;
                               margin-left: auto;
                               margin-right: auto;
                               width: 30%;">
   <p></p>
 </body>
</html>

