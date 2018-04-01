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

$ShowNum = $_POST["Showing"];
$SMovie = "'".$_POST["Movie"]."'";
$STheater= "'".$_POST["Theater"]."'";
$StartTime = "'".$_POST["EStartTime"]."'";
$SStartDate = "'".$_POST["EStartDate"]."'";
$STheaterNum = $_POST["ETNum"];
$Seats = $_POST["ESeats"];



$sql = "UPDATE Showing SET StartTime = $StartTime, StartDate = $SStartDate, TheaterNumber = $STheaterNum, NumberOfSeatsAvailable = $Seats 

WHERE ShowingNumber = $ShowNum";
				
if ($conn->query($sql) === TRUE) {
   					echo "Update successful";
					header('Location: adminpage.php');
				} 					
				else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
					}

?>

