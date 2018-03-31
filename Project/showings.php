<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final_theaterdb";
    
    // Connect to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection_failed:" . $conn->connect_error);
    }

    // Values from Search
    $theaterVal = $_GET['Title'];
    $movieVal = $_GET['Title'];
    $dayVal = $_GET['Title'];

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Showing showings of Search</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/portfolio-item.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/half-slider.css" rel="stylesheet">

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
      <h1 class="my-4">Showings<small>What time works best for you?</small></h1>

 <?php

echo "<div class='row'>";


    // Get all showings of searched params
    $showing_query_result = $conn->query("select distinct ShowingNumber from Showing where MovieTitle ='$moviecVal' and ComplexName = '$theaterVal' and StartDate = 'dayVal' ");

 while ($row = mysqli_fetch_array($showing_query_result)) {

        $showing = $row['ShowingNumber'];
        $movie = $row['MovieTitle'];
        $complex = $row['ComplexName']; 
        $time = $row['StartTime'];
        $theater = $row['TheaterNumber'];
        $numseat = $row['NumberOfSeatsAvailable'];
        $date = $row['StartDate'];     
        

            echo "<div class='col-lg-4 col-md-6 mb-4'>";
              echo "<div class='card h-100'>";
                echo "<div class='card-body'>";
                  echo "<h4 class='card-title'><a href=''>" . $movie . "</a></h4>";
                  echo "<h5>Complex: " . $complex . "</h5>";
                  echo "<h5>Theater Number: " . $theater . "</h5>";
                  echo "<h5>Day: " . $date . "</h5>";
                  echo "<h5>Time: " . $time . "</h5>";
                  echo "<h5>Number of Seats Available: " . $numseat . "</h5>";
                  echo "<h5>Cost per Seat:  10$ </h5>";
                  echo "<div class='col-md-4 mb-3'>";
      
    echo "<form method='get' action='buy.php'>";
    echo "<input type='hidden' name='Title' value='$movie'>";
    echo "<input type='submit' value = 'Purchase'>";
    echo "</form>";
  
                    echo "</div>";
                    echo "</div>";
                echo "</div>";
              echo "</div>";
            //echo "</div>";

            
      }
       echo "<br>";
      echo "</div>";
 ?>

   </div>

<br>
<center><a class="btn btn-primary" href="search.php">Change Search</a><center>
<br>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Theater Hub Corp</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>