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

$UserVal = $_POST["AccNum"];
$sql = "DELETE FROM user WHERE AccountNumber = $UserVal";
				if ($conn->query($sql) === TRUE) {
   					echo "New record created successfully";
					header('Location: adminpage.php');
				} 					
				else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
					}


?>

