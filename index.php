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
  <title>Landing Page</title>
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
<?php include('navbar.php'); ?>


<!--#####################################################################################-->
<!--                             Main Container                                          -->
<!--#####################################################################################-->
<div class="container-fluid" style="margin-top: 4.5em">



  <div class="jumbotron text-center">
    <h1>Car Rental Company</h1> 
    <p>rent your car!</p> 
  </div>
  

    <div class="container col-lg-4 col-md-10 col-sm-10 m-auto my-auto">

    <?php 
      if( isset($_GET['success'])) { ?>
        <div class="alert alert-success">
          <strong>Successfully registered</strong>
        </div>
      <?php 
        }
      ?>

      <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <h2>Log In.</h2>
        <hr />
        <?php
          if ( isset($errMSG) ) {
        ?>

          <div class="alert text-danger">
            <?php echo $errMSG; ?>
          </div>

        <?php
        }
        ?>
        
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
          <span class="text-danger"><?php echo $emailError; ?></span>
        </div>
        <div class="form-group">
          <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
          <span class="text-danger"><?php echo $passError; ?></span>
        </div>
        
        <hr />
        <button class="btn btn-block btn-primary col-8 m-auto" type="submit" name="btn-login">Log In</button>
        <hr />
        <a href="register.php">New to site? Create an account here...</a>
      </form>
    </div>

</div><!-- Endof Container fluid -->    




</body>
</html>

<?php ob_end_flush(); ?>