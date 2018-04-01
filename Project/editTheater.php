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

$Theater = "'".$_POST["Theater"]."'";
$NumTheater = $_POST["ENum"];
$PhoneNum = $_POST["EPhoneNum"];
$StreetNum = $_POST["EStreetNum"];
$Street = "'".$_POST["EStreet"]."'";
$City = "'".$_POST["ECity"]."'";
$Post = "'".$_POST["EPostal"]."'";




echo $Theater;
echo "<br>";
echo $NumTheater;
echo "<br>";
echo $PhoneNum;
echo "<br>";
echo $StreetNum;
echo "<br>";
echo $Street;
echo "<br>";
echo $City;
echo "<br>";
echo $Post;


$sql = "UPDATE theatercomplex SET NumberOfTheaters = $NumTheater, PhoneNumber = $PhoneNum, StreetNumber = $StreetNum, Street = $Street, City = $City, PostalCode = $Post WHERE ComplexName = $Theater";
				
if ($conn->query($sql) === TRUE) {
   					echo "Update successful";
					header('Location: adminpage.php');
				} 					
				else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
					}
?>

