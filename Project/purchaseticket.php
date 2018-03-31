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

    // purchaseticket.php
?>