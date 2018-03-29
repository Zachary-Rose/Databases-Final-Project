
<?php
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "FINAL_theater2db";
$fname = $_POST["FNAME"]; 
$lname = $_POST["LNAME"]; 
$email = $_POST["Email"]; 
$phonenumber = $_POST["PhoneNumber"]; 
$password =  $_POST["Password"];
$confirmpassword = $_POST["rePassword"]; 
$streetnumber = $_POST["StreetNumber"]; 
$streetname = $_POST["Street"]; 
$city = $_POST["City"]; 
$creditcardnumber = $_POST["CreditCardNumber"];  
$expiration = $_POST["ExpDate"]; 
 
// Create connection
$conn = new mysqli($servername, $username, $passworddb, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$sql = "select max(email) from User";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $nextuser = mysqli_fetch_array($result)['max(Email)'] + 1;
}
else {
    $nextuser = 1;
}
$sql = "insert into User (Email, Password, FNAME, LNAME, Street, StreetNumber,
City, PhoneNumber) values
('$email','$password','$fname', '$lname','$streetname',$streetnumber,'$city', '$phonenumber');";
$sql .= "insert into User ( Email, CreditCardNumber, ExpDate) values
('$email','$creditcardnumber','$expiration')";
if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header('Location: ../Project/home.html?success'); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>