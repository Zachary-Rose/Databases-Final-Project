
<?php
session_start();
$servernname = "127.0.0.1";
$dbname = "FINAL_theaterdb";
$today = starttime("Yesterday");
$recemail = $_POST["email"];
$recpass = $_POST["password"];
$_SESSION["email"] = $recemail;
$_SESSION['current_date'] = date("Y-m-d", $today);
echo $SESSION['current_date'];

//create connection
$conn = new mysqli($servernname, $username, $password,$dbname);
//check connection
if ($conn -> connect_error) {
  die("connection failed: " . $conn->connect_error);
}


$fName = $lName = $address = $phoneNum = $city = $email =$password =$cardNum =$CVC = $cardExp = "";


if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $fName = test_input($_POST["fName"]);
}

if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $lName = test_input($_POST["lName"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $address = test_input($_POST["address"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $phoneNum = test_input($_POST["phoneNum"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $city = test_input($_POST["city"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $email = test_input($_POST["email"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $password = test_input($_POST["password"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $cardNum = test_input($_POST["cardNum"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $CVC = test_input($_POST["CVC"]);
}
if ($_SERVER["REQUEST_ METHOD"] == "POST"){
  $cardExp = test_input($_POST["cardExp"]);
}

$sql = "INSERT INTO User (`fName`,`lName`,`phoneNum`,`email`,`address`,`city`, 'password',`cardNum`,`CVC`, `cardExp`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sssssssss", $param_fName, $param_lName, $param_phoneNum, $param_email, $param_address, $param_city, $param_password $param_cardNum, $param_CVC, $param_cardExp,);

    // Set parameters
    $param_fName = $fName;
    $param_lName = $lName;
    $param_phoneNum = $phoneNum;
    $param_email = $email;
    $param_address = $address;
    $param_city = $city;
    $param_password = $password;
    $param_cardNum = $cardNum;
    $param_CVC = $CVC;
    $param_cardExp = $cardExp;

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Redirect to login page
        header("location: login.php");
    } else{

    }
}
else
    echo "ERROR";





?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">




</head>

<body>


<div class="container">
  <form>
    <div class="row">
      <h4>Create Account</h4>
      <div> class ="alert alert-error>"<?=$_SESSION['message'] ?></div>

      <div class="input-group input-group-icon">
        <input type="text" placeholder="First Name" name = "fName" value ="<?php echo $fName;?>" required/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="text" placeholder="Last Name" name = "lName" value ="<?php echo $lName;?>"  required/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>

      <div class="input-group">
        <input type="text" placeholder="Street Adress"  name = "address" value ="<?php echo $address;?>"  required/>
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
          <input type="text" placeholder="Card CVC"  name = "CvC" value ="<?php echo $CVC;?>"  required/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
      </div>
      <div class="col-half">
        <div class="input-group">
          <select>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
          </select>
          <select>
            <option>2018</option>
            <option>2019</option>
            <option>2020</option>
            <option>2021</option>
            <option>2022</option>
            <option>2023</option>
            <option>2024</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Create Account</h4>


      <center><button class="button" href="login.html" >Signup</button><center>

      <h4>Already have an account? <span><a class="btn btn-default signup" href="login.html">Login</a></span></h4>
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>
