
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

<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">

     <!-- navbar links when signed in -->
      <ul class="navbar-nav mr-auto">
        <?php if(isset($_SESSION['user'])) { ?> 

          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact US</a>
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
            <a class="nav-link" href="aboutus.php">Kontakt</a>
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
</nav>  


<!--#####################################################################################-->
<!--                             Main Container                                          -->
<!--#####################################################################################-->
<div class="container-fluid">
	<div class="row">
        
        <!-- Sidebar -->
        <div class="col">
        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                    <li class="sidebar-brand">
                        <a href="#home"><span class="fa fa-home solo">Home</span></a>
                    </li>
                    <li>
                        <a href="#anch1" data-scroll>
                            <span class="fa fa-anchor solo">Anchor 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#anch2" data-scroll>
                            <span class="fa fa-anchor solo">Anchor 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#anch3" data-scroll>
                            <span class="fa fa-anchor solo">Anchor 3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#anch4" data-scroll>
                            <span class="fa fa-anchor solo">Anchor 4</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        </div><!-- endof Sidebar -->

<!-- Table -->
<div class="col">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div><!-- endof Table -->

</div> <!-- endof row -->
</div><!-- endof Container fluid -->

</body>
</html>

<?php ob_end_flush(); ?>
