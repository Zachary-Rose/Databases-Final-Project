<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "FINAL_theater2db";
    
    // Connect to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection_failed:" . $conn->connect_error);
    }

    // Get all movie names
    $movie_query_result = $conn->query("select distinct MovieTitle from Showing");
    //$num_movies = count($movies);

    $_SESSION['moviecName'] = $movieValue;
    
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page of TheaterHub</title>

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
        <a class="navbar-brand" href="#">Theater 332</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.html">Home
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
      <h1 class="my-4">Welcome <small>Check out movies playing in theaters!</small></h1>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('popcorn.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Popcorn SALE!</h3>
              <p>15% OFF Popcorn on Wednesdays!</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('movietheater.jpg')">
             <div class="carousel-caption d-none d-md-block">
              <h3>What will you see next?</h3>
              
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('newtheater.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>New IMAX Theater!</h3>
              <p>Open now in Kingston</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
   
<br>
   

<div class="row">

 <?php
      while ($row = mysqli_fetch_array($movie_query_result)) {

            $movie = $row['MovieTitle'];
            $plot_query_result = $conn->query("select PlotSynopsis from Movie where MovieTitle ='$movie'");
            $plot = mysqli_fetch_array($plot_query_result)['PlotSynopsis'];

            $rating_query_result = $conn->query("select Rating from Movie where MovieTitle ='$movie'");
            $rating = mysqli_fetch_array($rating_query_result)['Rating'];

            $runtime_query_result = $conn->query("select RunningTime from Movie where MovieTitle ='$movie'");
            $runtime = mysqli_fetch_array($runtime_query_result)['RunningTime'];

            $image_query_result = $conn->query("select ImageURL from Movie where MovieTitle ='$movie'");
            $image = mysqli_fetch_array($image_query_result)['ImageURL'];

            echo "<div class='col-lg-4 col-md-6 mb-4'>";
              echo "<div class='card h-100'>";
                echo "<a> <img class= 'card-img-top' src='../images/" . $ImageURL . " alt='' > </a>";
                echo "<div class='card-body'>";
                  echo "<h4 class='card-title'><a href=''>" . $movie . "</a></h4>";
                  echo "<h5>Rating: " . $rating . "</h5>";
                  echo "<h5>Runtime: " . $runtime . "</h5>";
                  echo "<p class='card-text'>" . $plot ."</p>";
                    echo "<div class='col-md-4 mb-3'>";
                    
                    echo "<p><a name = ''class='btn btn-secondary' href='../Project/reviews.php?'" . $row['MovieTitle'] . "' role='button'>Reviews &raquo;</a></p>";
                    echo "</div>";
                    echo "</div>";
                echo "</div>";
              echo "</div>";
            echo "</div>";

            echo "<br>";
      }
 ?>

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
