
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["fName"])) {
    $fName = "";
  } else {
    $fName = "'". test_input($_POST["fName"]."'");
  }

  if (empty($_POST["lName"])) {
    $lName = "";
  } else {
    $lName = "'". test_input($_POST["lName"]."'");
  }

  if (empty($_POST["street"])) {
    $street = "";
  } else {
    $street = "'". test_input($_POST["street"]."'");
  }

  if (empty($_POST["streetNumber"])) {
    $streetNumber = "";
  } else {
    $streetNumber = test_input($_POST["streetNumber"]);
  }
  if (empty($_POST["phoneNum"])) {
    $phoneNum = "";
  } else {
    $phoneNum = test_input($_POST["phoneNum"]);
  }
  if (empty($_POST["city"])) {
    $city = "";
  } else {
    $city = "'". test_input($_POST["city"]."'");
  }
  if (empty($_POST["email"])) {
    $email = "";
  } else {
    $email = "'". test_input($_POST["email"]."'");
  }
  if (empty($_POST["password"])) {
    $password = "";
  } else {
    $password = "'". test_input($_POST["password"]."'");
  }
  if (empty($_POST["cardNum"])) {
    $cardNum = "";
  } else {
    $cardNum = "'". test_input($_POST["cardNum"]."'");
  }
  if (empty($_POST["cardExp"])) {
    $cardExp = "";
  } else {
    $cardExp = test_input($_POST["cardExp"]);
  }
}

$accountNumberGenerator = mt_rand(10000000, 99999999);
$adminCheck = 0; 


                  
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

  <title>Sign Up Form</title>
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

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
        <input type="text" placeholder="First Name" name = "fName" value ="<?php echo $fName;?>" required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="text" placeholder="Last Name" name = "lName" value ="<?php echo $lName;?>"  required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group">
        <input type="text" placeholder="street"  name = "street" value ="<?php echo $street;?>"  required/>
        <div class="input-icon"></div>
      </div>

       <div class="input-group">
        <input type="text" placeholder="Street Number"  name = "streetNumber" value ="<?php echo $streetNumber;?>"  required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group">
        <input type="text" placeholder="Phone Number"  name = "phoneNum" value ="<?php echo $phoneNum;?>"  required/>
        <div class="input-icon"></div>
      </div>

        <div class="input-group">
        <input type="text" placeholder="City"  name = "city" value ="<?php echo $city;?>"  required/>
        <div class="input-icon"></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Adress"  name = "email" value ="<?php echo $email;?>"  required/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password"  name = "password" value ="<?php echo $password;?>"  required/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>

    </div>

    <div class="row">
      <h4>Payment Details</h4>

      <div class="input-group input-group-icon">
        <input type="text" placeholder="Card Number"  name = "cardNum" value ="<?php echo $cardNum;?>" required/>
        <div class="input-icon"><i class="fa fa-credit-card"></i></div>
      </div>
      <div class="col-half">
        <div class="input-group input-group-icon">
          <input type="text" placeholder="ExpiraryDate"  name = "cardExp" value ="<?php echo $cardExp;?>"  required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
      </div>
      <div class="col-half">


      <center><input type="submit" name="submit" value="Submit"><center>
  </form>

  <?php
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
?>

</body>
</html>
