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
	//Pre-Set values
    $accountNumberGenerator = mt_rand(10000000, 99999999);
	$adminCheck = 0; 
    // Values from Search
    $fName = "'".$_POST["fName"]. "'";
    $lName = "'".$_POST["lName"]. "'";
    $streetNumber = $_POST["streetNumber"];
    $street ="'". $_POST["street"] . "'";
    $city ="'". $_POST["city"] . "'";
    $phoneNum = $_POST["phoneNum"];
    $email= "'". $_POST["email"] . "'";
    $password ="'". $_POST["password"] . "'";
    $cardNum = "'".$_POST["cardNum"]. "'";
    $cardExp = $_POST["cardExp"];
   

$sql = "INSERT INTO User 
VALUES ($accountNumberGenerator, $fName, $lName, $streetNumber, $street, $city, $phoneNum, $email, $password, $cardNum, $cardExp, $adminCheck)";

if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

#echo "TEST VIEWING INPUTS";
#echo "<br>";
#echo $accountNumberGenerator;
#echo "<br>";
#echo $fName;
#echo "<br>";
#echo $lName;
#echo "<br>";
#echo $streetNumber;
#echo "<br>";
#echo $street;
#echo "<br>";
#echo $city;
#echo "<br>";
#echo $phoneNum;
#echo "<br>";
#echo $email;
#echo "<br>";
#echo $password;
#echo "<br>";
#echo $cardNum;
#echo "<br>";
#echo $cardExp;
#echo "<br>";
#echo $adminCheck;
 header ('Location: profile.php');
?>