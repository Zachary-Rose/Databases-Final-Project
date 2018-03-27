<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FINAL_theater2db";
$today = strtotime("Yesterday"); //???? Why won't it work for today
$recemail = $_POST["email"];                      
$recpass = $_POST["password"];
$_SESSION["email"] = $recemail;
$_SESSION['current_date'] = date("Y-m-d", $today);
echo $_SESSION['current_date'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$user_id_query = "SELECT AccountNumber FROM User where Email = '$recemail'";
$user_id = $conn->query($user_id_query);
$_SESSION["user_id"] = mysqli_fetch_array($user_id)['member_id'];
$sql = "SELECT email, Password FROM User_Account where Email = '$recemail' and Password = '$recpass' ";
$result = $conn->query($sql);
if ($result->num_rows > 0 and $user_id->num_rows >0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	echo "You have successfully logged into the database"; 
	header('Location: ../git-project/Project/home.html'); 
    }
} else { 
    $user_id_query = "SELECT admin_id FROM Admin where email = '$recemail'";
    $user_id = $conn->query($user_id_query);
    $_SESSION["admin_id"] = mysqli_fetch_array($user_id)['admin_id'];
    $sql = "SELECT email, Password FROM User_Account where email = '$recemail' and Password = '$recpass' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 and $user_id->num_rows >0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
	       echo "You have successfully logged into the database"; 
	       header('Location: ../admin/admin.php'); 
        }
    } else {
        header('Location: ../git-project/Project/home.html?loginInvalid');
    }
}
$conn->close();
?>