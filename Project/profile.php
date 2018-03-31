<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final_theaterdb";
    
    // Connect Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check Connection
    if ($conn->connect_error) {
        die("Connection_failed:" . $conn->connect_error);
    }


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Profil page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Theater Hub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Search</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

 <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Hi
        <small>Username</small>
      </h1>   


<br>



<div class="row">



       <div class="col-sm-4 my-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Batman</h4>
              <p class="card-text">Number of Tickets: 5 </p>
              <p class="card-text">Showing Day: 27th </p>
               <p class="card-text">Showing Time: 19:30 </p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Cancel Purchase</a>
            </div>
          </div>
        </div>


        <div class="col-sm-4 my-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Peter Rabbit</h4>
              <p class="card-text">Number of Tickets: 1 </p>
              <p class="card-text">Showing Day: 24th </p>
               <p class="card-text">Showing Time: 18:10 </p>
            </div>
            <div class="card-footer">
              <a href="reviews.html" class="btn btn-primary">Review Movie</a>
            </div>
          </div>
        </div>


      </div>
      <!-- /.row -->

      <br>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Theater 332</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>



