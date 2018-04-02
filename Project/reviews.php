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

    $accountnumber = $_SESSION["accountnumber"];

    // Get all movie names
    //$movie_query_result = $conn->query("select distinct MovieTitle from Showing");

    $moviecValue = $_GET['Title'];
    $_SESSION['moviename'] = $moviecValue;
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
      
      
      //<!-- Portfolio Item Heading -->
      echo "<h1 class='my-4'> " . $moviecValue . "</h1>";
      echo "<br>";

            // Get all reviews for that movie names
            $reviews_query_result = $conn->query("select Review from Reviews where MovieTitle ='$moviecValue'");
            
      // <!-- Single Comment -->
      while ($row = mysqli_fetch_array($reviews_query_result)) {

        $review = $row['Review'];

          echo "<div class='media mb-4'>";
            echo "<img class='d-flex mr-3 rounded-circle' width='60' height='60' src='images/user.png' alt=''>";
            echo "<div class='media-body'>";
              echo "<h5 class='mt-0'> Ticket Hub User </h5>";
              echo "<p> " . $review . " <p>";
            echo "</div>";
          echo "</div>";

      }
  ?>

   <br>

<?php
    $acount_query_result = $conn->query("select Review from Reviews where MovieTitle ='$moviecValue' and AccountNumber = '$accountnumber' ");
    $exists = mysqli_fetch_array($acount_query_result)['Review'];


        if ($exists == NULL ) {


?>
                <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Review:</h5>
            <div class="card-body">
              <form class="d-flex justify-content-around" action="writereview.php" method="POST">
                <div class="input-group">
                  <input type="text" placeholder="Write a review!"  name = "review" rows="2"  class="form-control" required/>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" >Submit Review </button>
              </form>
            </div>
          </div>

    <?php
        }
        else {
        
        }

 
// <center><button type="submit" class="btn btn-primary" href="home.php">Back Home</button><center>

   ?>
      <br>  

   </div>


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