
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

//uploadpledges
if(isset($_POST["addbiglittle"]))
{
 if($_FILES['uploaded_file']['name'])
 {
  $filename = explode(".", $_FILES['uploaded_file']['name']);
  //echo $_FILES['uploaded_file']['name'];
  if(end($filename) == "csv")
  {
    $handle = fopen($_FILES['uploaded_file']['tmp_name'], "r");
    // go through each row of the read csv
    while($data = fgetcsv($handle))
    {
      $big_un = $data[1];
      $little_un = $data[3];
      $fam_num = $data[5];
      $ps = $mysqli->prepare("update `users` set `big` = ?, `family` = ? where `username` = ?;");
      $ps->bind_param("sis", $big_un, $fam_num, $little_un);
      $ps->execute();
    }
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
 $message = '<label class="text-success">Adding Bigs and Littles done!</label>';
}

$query = "SELECT * FROM officer as O JOIN users as U ON U.username = O.username JOIN officer_position as P ON O.position = P.rank  JOIN term as T ON O.term = T.term_id WHERE((O.position >=0 && O.position<=20) || (O.position >=29 && O.position<=33)) AND T.year = '".$current_year."' AND T.semester = '".$current_semester."'   " ;;
$result = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Add Big Little Pairings</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  </div>

  <div class="container">
   <h3 align="center">Add Big Little Pairings</a></h3>
   <br />
   <p> Please complete the csv template found in the google drive then upload it here to add new big little pairings</p>
   <!-- form for adding pledges -->
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Format)</label>
    <input type="file" name="uploaded_file" /></p>
    <br />
    <input type="submit" name="addbiglittle" class="btn btn-info" value="Upload" onclick=
    "confirm('Are you sure you want to add new pledges? This will be a pain in the ass to correct if something\'s wrong...');
      confirm('OK. You should check over each entry and make sure there are no mispellings');
      return confirm('Last Chance to cancel.');"/>
   </form>
   <br />
   <?php echo $message; ?>
 </body>
</html>

