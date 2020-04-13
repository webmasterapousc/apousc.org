
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

//uploadpledges
if(isset($_POST["uploadpledges"]))
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
      $username = $data[0];
      $password = $data[1];
      $status = $data[2];
      $email = $data[3];
      $fname = $data[4];
      $lname = $data[5];
      $semester = $data[6];
      $year = $data[7];

      $position = 0;
      $big = NULL;
      $phone = $data[8]; //NULL;
      $uscid = $data[9]; //NULL;
      $address = NULL;
      $shirtsize = $data[10]; //NULL;
      $family = NULL;

      $alumail = "";
      $userid =  md5(uniqid($username, true));
      error_log("userid: ".$userid);

      //add new user to database
      $time = time();
      /* If admin sign up, give admin user level */
      if (strcasecmp($username, ADMIN_NAME) == 0) {
        $ulevel = ADMIN_LEVEL;
      } else {
        $ulevel = USER_LEVEL;
      }
      //"INSERT INTO `users`(`username`, `password`, `userid`, `status`, `email`, `alumail`, `timestamp`, `fname`, `lname`, `semester`, `year`, `shirt_size`) VALUES ('abcd', 'abc', 1, 1, '1', '1', 1, 'ab', 'cd', 0, 2020, 'M' )"
      $ps = $mysqli->prepare("INSERT INTO `users`(`username`, `password`, `userid`, `status`, `email`, `alumail`, `timestamp`, `fname`, `lname`, `semester`, `year`, `phone`, `uscid`, `shirt_size`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $ps->bind_param("sssississiisss", $username, $password, $userid, $status, $email, $alumail, $time, $fname, $lname, $semester, $year, $phone, $uscid, $shirtsize);
      $ps->execute();
      
      //if (mysql_query($q, $this->connection)) {
        //if ($this->configureDefaultUser($username)) {
        //  return true;
        //}
      //}

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
 $message = '<label class="text-success">Eboard Updating Done</label>';
}

$query = "SELECT * FROM officer as O JOIN users as U ON U.username = O.username JOIN officer_position as P ON O.position = P.rank  JOIN term as T ON O.term = T.term_id WHERE((O.position >=0 && O.position<=20) || (O.position >=29 && O.position<=33)) AND T.year = '".$current_year."' AND T.semester = '".$current_semester."'   " ;;
$result = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>CROSS PLEDGES</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
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
  
 </body>
</html>
