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

    // Get all movie names
    $movie_query_result = $conn->query("select distinct MovieTitle from Showing");
    //$num_movies = count($movies);


    ///$movieValue = $_SESSION['moviecName'];
    //$moviecValue = 'Black Panther';
    //echo $movieValue;
?>

      <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reviews of a Movie</title>

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

<?php

            $moviecValue = $_GET['Title'];


                  //<!-- Portfolio Item Heading -->
      echo "<h1 class='my-4'> " . $moviecValue . "</h1>";
      echo "<br>";

            // Get all reviews for that movie names
            $reviews_query_result = $conn->query("select Review from Reviews where MovieTitle ='$moviecValue'");
            
      // <!-- Single Comment -->
      while ($row = mysqli_fetch_array($reviews_query_result)) {

        $review = $row['Review'];

          echo "<div class='media mb-4'>";
            echo "<img class='d-flex mr-3 rounded-circle' src='images/user.png' alt=''>";
            echo "<div class='media-body'>";
              echo "<h5 class='mt-0'> Ticket Hub User </h5>";
              echo "<p> " . $review . " <p>";
            echo "</div>";
          echo "</div>";

      }
  ?>

   <br>
   </div>

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