
<?php
session_start();
$dbname = "FINAL_theaterdb";
$servername = "localhost";
$username = "root";
$password = "";


//create connection
$conn = new mysqli($servername, $username, $password,$dbname);
//check connection
if ($conn -> connect_error) {
  die("connection failed: " . $conn->connect_error);
}


$fName = $lName = $street = $streetNumber = $phoneNum = $city = $email =$password =$cardNum = $cardExp = "";

                 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }  

?>

<html lang="en" >
<head>
  <meta charset="UTF-8">

  <title>Change User Information</title>
   <form class="d-flex justify-content-around" action="updatesUserSettings.php" method="POST">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">

</head>

<body>


<div class="container">
  <form>
    <div class="row">
      <h4>Create Account</h4>
      </div>
    
      <div class="input-group input-group-icon">
        <input type="text" placeholder="First Name" name = "fName" required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="text" placeholder="Last Name" name = "lName"  required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group">
        <input type="text" placeholder="street"  name = "street" required/>
        <div class="input-icon"></div>
      </div>

       <div class="input-group">
        <input type="text" placeholder="Street Number"  name = "streetNumber" required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group">
        <input type="text" placeholder="Phone Number"  name = "phoneNum"required/>
        <div class="input-icon"></div>
      </div>

        <div class="input-group">
        <input type="text" placeholder="City"  name = "city" required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Adress"  name = "email" required/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password"  name = "password"   required/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>

    </div>

    <div class="row">
      <h4>Payment Details</h4>

      <div class="input-group input-group-icon">
        <input type="text" placeholder="Card Number"  name = "cardNum" required/>
        <div class="input-icon"><i class="fa fa-credit-card"></i></div>
      </div>
      <div class="col-half">
        <div class="input-group input-group-icon">
          <input type="text" placeholder="ExpiraryDate"  name = "cardExp"   required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
      </div>
      <div class="col-half">


       <center><button class="btn btn-primary pb-2" type="submit">Submit Information &raquo;</button><center>
    
  </form>


</body>
</html>

