<?php
  ob_start();
  session_start();
  require_once 'dbconnect.php';
  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['users'])!="" ) {
    header("Location: home.php");
    exit;
  }
  $error = false;
  if( isset($_POST['btn-login']) ) {
    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
  
    // prevent sql injections / clear user invalid inputs
    if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }
    if(empty($pass)){
      $error = true;
      $passError = "Please enter your password.";
    }
    // if there's no error, continue to login
    if (!$error) {
      $password = hash('sha256', $pass); // password hashing using SHA256
      $query = "SELECT * FROM users WHERE email='$email'";
      $res = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($res);
      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
      
      // print_r($row); Use it for a fast check to see what is included in $row assoc array!
      
      if( $count != 1 ) {
        $errMSG = "This email is not registered";
      } else if ($row['password']==$password) {
        $_SESSION['user'] = $row['user_id'];
        header("Location: home.php");
      } else {
        $errMSG = "Incorrect Password, Try again...";
      }
    }
  }

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