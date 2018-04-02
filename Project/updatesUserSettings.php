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
    $accountNumberGenerator = $_SESSION["accountnumber"];
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
   

$sql = "UPDATE User 
SET AccountNumber = $accountNumberGenerator,
FNAME = $fName,
LNAME = $lName,
StreetNumber = $streetNumber,
Street = $street,
City = $city,
PhoneNumber = $phoneNum,
Email = $email,
Password = $password,
CreditCardNumber = $cardNum,
ExpDate = $cardExp,
IsAdmin = $adminCheck 
WHERE ACCOUNTNUMBER = $accountNumberGenerator";
//THIS LAST LINE MUCH CHANGED WHERE ACCOUNT NUMBER = GLOBAL VARIABLE USERS ACCOUNT NUMBER

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