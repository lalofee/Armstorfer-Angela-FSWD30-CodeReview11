
<?php

 ob_start();

 session_start(); // start a new session or continues the previous

 if( isset($_SESSION['users'])!="" ){

  header("Location: home.php"); // redirects to home.php

 }

 include_once 'dbconnect.php';


 $error = false;


 if ( isset($_POST['btn-signup']) ) {

 

  // sanitize user input to prevent sql injection

  $name = trim($_POST['name']);

  $name = strip_tags($name);

  $name = htmlspecialchars($name);

 

  $email = trim($_POST['email']);

  $email = strip_tags($email);

  $email = htmlspecialchars($email);

 

  $pass = trim($_POST['pass']);

  $pass = strip_tags($pass);

  $pass = htmlspecialchars($pass);

 

  // basic name validation

  if (empty($name)) {

   $error = true;

   $nameError = "Please enter your full name.";

  } else if (strlen($name) < 3) {

   $error = true;

   $nameError = "Name must have atleat 3 characters.";

  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {

   $error = true;

   $nameError = "Name must contain alphabets and space.";

  }

 

  //basic email validation

  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {

   $error = true;

   $emailError = "Please enter valid email address.";

  } else {

   // check whether the email exist or not

   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";

   $result = mysqli_query($conn, $query);

   $count = mysqli_num_rows($result);

   if($count!=0){

    $error = true;

    $emailError = "Provided Email is already in use.";

   }

  }


  // password validation

  if (empty($pass)){

   $error = true;

   $passError = "Please enter password.";

  } else if(strlen($pass) < 6) {

   $error = true;

   $passError = "Password must have atleast 6 characters.";

  }

 

  // password encrypt using SHA256();

  $password = hash('sha256', $pass);

 

  // if there's no error, continue to signup

  if( !$error ) {

   

   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";

   $res = mysqli_query($conn, $query);

   

   if ($res) {

    $errTyp = "success";

    $errMSG = "Successfully registered, you may login now";

    unset($name);

    unset($email);

    unset($pass);

   } else {

    $errTyp = "danger";

    $errMSG = "Something went wrong, try again later...";

   }
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
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
<div class="container" style="margin-top: 4.5em">

<div class="jumbotron text-center">
     <h1 class="float-right">Car Rental Company</h1>  
  </div>

  
  <div class="container col-lg-6 col-m-8 col-sm-10 col-xs-12">

    <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
      <h2>Registration</h2>
      <hr>

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
        <input  type="text" name="name" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $name ?>" />
        <span class="text-danger"><?php echo $nameError; ?></span>
      </div>

      <div class="form-group">
        <input  type="text" name="last_name" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $last_name ?>" />
        <span class="text-danger"><?php echo $last_nameError; ?></span>
      </div>


      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
        <span class="text-danger"><?php echo $emailError; ?></span>
      </div>
      
      <div class="form-group">
        <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
        <span class="text-danger"><?php echo $passError; ?></span>
      </div>

      <hr />

      <button type="submit" class="btn btn-block btn-primary col-8 m-auto" name="btn-signup" onclick="AlertIt()">Register</button>
      <hr />
      <a href="index.php">To Log In, press here...</a>
    </form>
  </div>



  

</div><!-- Endof Container fluid -->

<!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?> 