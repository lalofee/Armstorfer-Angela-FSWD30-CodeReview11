
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Big Library</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
  <meta http-equiv="refresh" content="index.php">
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
  
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <!-- navbar links when signed in -->
      <ul class="navbar-nav mr-auto">
        <?php if(isset($_SESSION['user'])) { ?> 

          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Kontakt</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="account.php">Hi, 
              <?php echo ucwords($userRow['first_name']); ?> (Account) - <i class="fas fa-shopping-cart"></i> <?php echo $borrowedRows;  ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php?logout">Sign Out</a>
          </li>
        

        <!-- navbar links when signed out -->

        <?php } else { ?>    

          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">Contact Us</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        
        <?php } ?>
        
      </ul>
    </div>

  </nav>

  

