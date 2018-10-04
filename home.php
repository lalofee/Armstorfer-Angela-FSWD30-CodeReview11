
<?php

 ob_start();

 session_start();

 require_once 'dbconnect.php';

 

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['users']) ) {

  header("Location: index.php");

  exit;

 }

 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['users']);

 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
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
<div class="container" style="margin-top: 4.5em">
	
        
  <div class="jumbotron">
    <h1 class="float-right">Car Rental Company</h1>  
  </div>


<div class="row">
  
<div class="col-md-4">
  <div class="card" style="width:100%">
  <img class="card-img-top" src="img/office.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Offices</h4>
    <p class="card-text">our offices in vienna</p>
    <a href="office_list.php" class="btn btn-primary">link</a>
  </div>
</div>
</div>

<div class="col-md-4">
  <div class="card" style="width:100%">
  <img class="card-img-top" src="img/cars.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">Cars</h4>
    <p class="card-text">our cars</p>
    <a href="cars_list.php" class="btn btn-primary">link</a>
  </div>
</div>
</div>

<div class="col-md-4">
  <div class="card" style="width:100%">
  <img class="card-img-top" src="img/street.jpg" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">rent!</h4>
    <p class="card-text">available cars</p>
    <a href="cars_locations.php" class="btn btn-primary">link</a>
  </div>
</div>
</div>




</div><!-- endof row -->


</div><!-- endof Container -->

<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?> 

