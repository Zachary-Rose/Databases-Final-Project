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
    $movieValue = $_SESSION["moviename"];
    $newreview  = "'".$_POST["review"]. "'";

    //echo $accountnumber;
    //echo $moviecValue;
    //echo $newreview;

$review_insert = "INSERT INTO Reviews VALUES ($movieValue, $accountnumber, $newreview)";

if ($conn->query($review_insert) === TRUE) {
   echo "New review created successfully";
} else {
    echo "Error: " . $review_insert . "<br>" . $conn->error;
}

 header ('Location: home.php');
 // make reviews.php if it works

?>

