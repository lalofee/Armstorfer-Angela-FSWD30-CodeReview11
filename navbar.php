



  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
  
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <!-- navbar links when signed in -->
      <ul class="navbar-nav mr-auto">
        <?php if(isset($_SESSION['users'])) { ?> 

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

  

