<!doctype html>


<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_theaterdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Name = "'".$_POST["Name"]."'";
$Num = $_POST["Num"];
$PhoneNum = $_POST["PhoneNum"];
$StreetNum = $_POST["StreetNum"];
$Street = "'".$_POST["Street"]."'";
$City = "'".$_POST["City"]."'";
$Post = "'".$_POST["Postal"]."'";



				
$sql = "INSERT INTO theatercomplex  
VALUES ($Name, $Num, $PhoneNum, $StreetNum, $Street, $City, $Post)";
if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
	header('Location: adminpage.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

