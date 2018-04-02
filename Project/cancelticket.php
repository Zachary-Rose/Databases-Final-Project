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

    $resnum = $_GET['ReservationNumber'];
    //echo $resnum;


$sql = "DELETE FROM Reservations WHERE ReservationNumber = $resnum";

if ($conn->query($sql) === TRUE) {
   echo "New review deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

 header ('Location: profile.php');

?>