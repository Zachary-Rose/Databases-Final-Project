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

    $accountnumber = $_SESSION["accountnumber"];

    $fname_query_result = $conn->query("select FNAME from User where AccountNumber ='$accountnumber'");
    $fname = mysqli_fetch_array($fname_query_result)['FNAME'];

    $lname_query_result = $conn->query("select LNAME from User where AccountNumber ='$accountnumber'");
    $lname = mysqli_fetch_array($lname_query_result)['LNAME'];

    $streetnum_query_result = $conn->query("select StreetNumber from User where AccountNumber ='$accountnumber'");
    $streetnum = mysqli_fetch_array($streetnum_query_result)['StreetNumber'];

    $street_query_result = $conn->query("select Street from User where AccountNumber ='$accountnumber'");
    $street = mysqli_fetch_array($street_query_result)['Street'];

    $city_query_result = $conn->query("select City from User where AccountNumber ='$accountnumber'");
    $city = mysqli_fetch_array($city_query_result)['City'];

    $email_query_result = $conn->query("select Email from User where AccountNumber ='$accountnumber'");
    $email = mysqli_fetch_array($email_query_result)['Email'];

    $phone_query_result = $conn->query("select PhoneNumber from User where AccountNumber ='$accountnumber'");
    $phone = mysqli_fetch_array($phone_query_result)['PhoneNumber'];

    $resnum_query_result = $conn->query("select ReservationNumber from Reservations where AccountNumber ='$accountnumber'");
    //$resnum = mysqli_fetch_array($resnum_query_result)['ReservationNumber'];


    //$resnum_query_result = $conn->query("select distinct ReservationNumber from Reservations where  AccountNumber ='$accountnumber'");



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
        <?php 
        echo "<small>" . $fname . " "  . $lname . "</small>";
        ?>
      </h1>   
      <h4> Address: <?php echo "$streetnum "; echo " $street"; echo  "  $city"; ?> </h4>
      <form>
<input type="button" value="Change User Information" onclick="window.location.href='UserSettings.php'" />
</form>
<br>


<?php
while ($row = mysqli_fetch_array($resnum_query_result)) {

    $resnum = $row['ReservationNumber'];


    $shonum_query_result = $conn->query("select ShowingNumber from Reservations where AccountNumber ='$accountnumber'");
    $shonum = mysqli_fetch_array($shonum_query_result)['ShowingNumber'];

    $quantity_query_result = $conn->query("select Quantity from Reservations where AccountNumber ='$accountnumber'");
    $quantity = mysqli_fetch_array($quantity_query_result)['Quantity'];

    $date_query_result = $conn->query("select StartDate from Showing where ShowingNumber ='$shonum'");
    $date = mysqli_fetch_array($date_query_result)['StartDate'];

    $complex_query_result = $conn->query("select ComplexName from Showing where ShowingNumber ='$shonum'");
    $complex = mysqli_fetch_array($complex_query_result)['ComplexName'];

    $time_query_result = $conn->query("select StartTime from Showing where ShowingNumber ='$shonum'");
    $time = mysqli_fetch_array($time_query_result)['StartTime'];

    $movie_query_result = $conn->query("select MovieTitle from Showing where ShowingNumber ='$shonum'");
    $movie = mysqli_fetch_array($movie_query_result)['MovieTitle'];



?>
    <div class="row">
       <div class="col-sm-4 my-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"> <?php echo  $movie ; ?> </h4>
              <p class="card-text">Showing Day: <?php echo  $date ; ?> </p>
               <p class="card-text">Showing Time: <?php echo $time ; ?> </p>
               <p class="card-text">Location: <?php echo  $complex ; ?> </p>
               <p class="card-text">Number of Tickets: <?php echo  $quantity ; ?> </p>
            </div>
            <div class="card-footer">
            	<?php
            	//<a href="writereview.php" class="btn btn-primary">Review Movie</a>
            	echo "<form method='get' action='cancelticket.php'>";
            	echo "<input type='hidden' name='ReservationNumber' value='" . $resnum . "'>";
                echo "<input type='submit' class='btn btn-primary'  value='Cancel Ticket' >";
                echo "</form>";
                ?>
            </div>
          </div>
        </div>
    </div>
    <!-- /.row -->

<?php
}
?>

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



