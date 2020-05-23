
<?php
include_once("include/session.php");
include_once("include/database.php");
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
   
   //reset old eboard's positions
   $ps = $mysqli->prepare("UPDATE users SET position = 0 WHERE position > 0");
   $ps->execute();

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

    //update new eboard's positions
    if ($position_id == 0) { //president is special
      $ps = $mysqli->prepare("UPDATE users SET position = -1 WHERE username = ?");
      $ps->bind_param("s", $username);
      $ps->execute(); 
    } else {
      $ps = $mysqli->prepare("UPDATE users SET position = ? WHERE username = ?");
      $ps->bind_param("is", $position_id, $username);
      $ps->execute(); 
    }
    

   }
   fclose($handle);
   header("location: add_pledge_excomm.php?updating=1");
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

//uploadpledges
if(isset($_POST["uploadpledges"]))
{
 if($_FILES['uploaded_file']['name'])
 {
  $filename = explode(".", $_FILES['uploaded_file']['name']);
  //echo $_FILES['uploaded_file']['name'];
  if(end($filename) == "csv")
  {}
   fclose($handle);
   header("location: add_pledge_excomm.php?updating=1");
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
 $message = '<label class="text-success">adding pledge excomm done</label>';
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>ADD PLEDGE EXCOMM</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  </div>
<?php
  if(isset($_GET["crossing"]))
  {
    echo '<div class="container"><label class="text-success">All Pledges Are Now Actives</label></div>';
  }
?>

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


  </div>
  <img src="sleepy.gif" style="display: block;
                               margin-left: auto;
                               margin-right: auto;
                               width: 40%;">
 </body>
</html>

