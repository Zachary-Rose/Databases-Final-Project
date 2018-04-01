<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final_theaterdb";


$today = strtotime("Yesterday"); //???? Why won't it work for today
$gotemail = $_POST["email"];                      
$gotpassword = $_POST["password"];
$_SESSION['email'] = $gotemail;
$_SESSION['current_date'] = date("Y-m-d", $today);
echo $_SESSION['current_date'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$usernum_query_result = $conn->query("select AccountNumber from User where Email = '$gotemail' and Password = '$gotpassword'");
            $accountnumber = mysqli_fetch_array($usernum_query_result)['AccountNumber'];
      $_SESSION['accountnumber'] = $accountnumber;

$isadmin_query_result = $conn->query("select IsAdmin from User where Email = '$gotemail' and Password = '$gotpassword'");
            $isadmin = mysqli_fetch_array($isadmin_query_result)['IsAdmin'];

    if ($isadmin == 0 ){
       echo "successfully login"; 
       header('Location: ../Project/home.php'); 
    }
    else{
        if ($isadmin != 0 ) {
           echo "successfully login"; 
           header('Location: ../Project/adminpage.php'); 
        }
        else {
        header('Location: ../Project/login.html');
        }
    }

$conn->close();
?>