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

$Title = "'".$_POST["Title"]."'";
$Runtime = $_POST["Runtime"];
$Rating = "'".$_POST["Rating"]."'";
$Plot = "'".$_POST["Plot"]."'";
$Dir = "'".$_POST["Dir"]."'";
$Pro = "'".$_POST["Pro"]."'";
$Sup = "'".$_POST["Sup"]."'";
$Start = $_POST["Start"];
$End = $_POST["End"];

echo $Title;
echo "<br>";
echo $Runtime;
echo "<br>";
echo $Rating;
echo "<br>";
echo $Plot;
echo "<br>";
echo $Dir;
echo "<br>";
echo $Pro;
echo "<br>";



				
$sql = "INSERT INTO movie 
VALUES ($Title, $Runtime, $Rating, $Plot, $Dir, $Pro, $Sup, $Start, $End)";
if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
	header('Location: adminpage.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

