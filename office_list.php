
<?php

 ob_start();

 session_start();

 require_once 'dbconnect.php';

 

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {

  header("Location: index.php");

  exit;

 }

 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);

 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>location</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<!--#####################################################################################-->
<!--                             Navbar                                                  -->
<!--#####################################################################################-->

<!-- html/head/ -->
<?php include('navbar.php'); ?> 


<!--#####################################################################################-->
<!--                             Main Container                                          -->
<!--#####################################################################################-->
<div class="container-fluid" style="margin-top: 4.5em">
	<div class="row">
        
<?php

$sql = "SELECT location.location_name, location.street, location.PLZ
        FROM location";
    
$result = mysqli_query($conn, $sql);


echo

"<div class='col'>
<table class='table'>
  <thead>
    <tr>
      
      <th scope='col'>Name</th>
      <th scope='col'>Adress</th>
      <th scope='col'>District</th>
    </tr>
  </thead>";
  
// fetch a next row (as long as there are some) into $row
while($row = mysqli_fetch_assoc($result)) {

  echo

    "<tbody>
      <tr>
        <td>" . $row["location_name"] . "</td>        
        <td>" . $row["street"] . "</td>
        <td>" . $row["PLZ"] . "</td>        
      </tr>";
}

echo "</tbody></table></div>";

// Free result set
mysqli_free_result($result);
// Close connection
mysqli_close($conn);

?>


</div> <!-- endof row -->
</div><!-- endof Container fluid -->

</body>
</html>

<?php ob_end_flush(); ?>
