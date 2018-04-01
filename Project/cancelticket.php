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
    echo $resnum;


?>