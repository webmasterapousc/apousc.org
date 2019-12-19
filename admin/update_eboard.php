
<?php
//temporary
if (isset($_GET['current_year']))
  $current_year = $_GET['current_year'];
else
  $current_year=2020;
if (isset($_GET['current_semester']))
  $current_semester = $_GET['current_semester'];
else
  $current_semester=0;

//index.php
$connect = mysqli_connect("localhost", "root", "str0ngThec!rcl", "apousc5_main");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$message = '';

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
   while($data = fgetcsv($handle))
   {
    $position_id = $data[0];
    //$position_name = mysqli_real_escape_string($connect, $data[1]); //unused here
    $officer_fname = $data[2];
    $officer_lname = $data[3];
    // figure out term once
    /**if ($term == null) {
      // these two only needs to be set once since term same for all entries
      $semester = $data[5];
      $year = $data[4];
      //query for the term from the year semester combination
      $query = "
      SELECT * 
      FROM `term` as T 
      WHERE T.year == $year AND T.semester == $semester
      ";
      //echo $query;
      //get the term id
      $result = mysqli_query($connect, $query);
      //$value = $result->fetch_object();
      $row= $result->fetch_array();//->term_id;
      $term = $row['term_id'];
      echo ($term . " " . $position_id . " " . $officer_fname . " " . $officer_lname);

    }**/
    $term = 20;
    $query = "
      SELECT * 
      FROM `users` 
      WHERE fname = '$officer_fname' AND lname = '$officer_lname'
      ";
    $result = mysqli_query($connect, $query);
    echo ("Errorcode: ".$connect->errno);
    $row = $result->fetch_array();
    $username = $row['username'];
    $query= "
    INSERT INTO `officer`(`username`, `term`, `position`) 
    VALUES (
      $username,
      $term,
      $position_id)
    ";      
    //echo $query;


    mysqli_query($connect, $query);

    // Might need to update users table with positions?
    // If so, fix below (WARNING: QUERY IS NOT RIGHT)
    /**
    $query = "
     UPDATE users 
     SET product_category = '$product_category', 
     product_name = '$product_name', 
     product_price = '$product_price' 
     WHERE product_id = '$product_id'
    ";
    mysqli_query($connect, $query);**/
   }
   fclose($handle);
   header("location: update_eboard.php?updating=1");
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
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Update Mysql Database through Upload CSV File using PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Update Mysql Database through Upload CSV File using PHP</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="uploaded_file" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">
   Currently Viewing Executive Committee
    <?php
      if ($current_semester ==0) echo "Spring ";
      else echo "Fall ";
      echo $current_year;
    ?></a></h3>

  <!-- code for changing the table -->
  <script type="text/javascript"></script>
  <script>
    function doSearch() {
      $.ajax({
        url: "update_eboard.php",
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
   <form id = 'tbChangeForm' name='tbChangeForm'  method="GET" action="update_eboard.php">
    <h4>  
      year <input type="number" name = "current_year" id="current_year" min="2004" max="2030" value="<?php echo (int)($current_year); ?>">
      semester <input type="number" name = "current_semester" id="current_semester" min="0" max= "1" value="<?php echo (int)($current_semester); ?>">
      <input type="button" value="submit"   onclick="doSearch();">
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
     ?>
    </table>
   </div>
  </div>
  
 </body>
</html>

