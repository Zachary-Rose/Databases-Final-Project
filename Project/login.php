<?php
session_start();
$_SESSION['error message'] = '';

$mysqli = new mysqli('localhost', 'root', 'mypass123', 'accounts');

if ($SERVER['REQUEST_METHOD'] =='POST'){
  
  if( isset($_POST['login']) ){
    require 'login.php'
  }
  elseif( isset($_POST['register']) ){
    require 'signup.php';
  }

}

}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style2.css">


  
  
</head>

<body>

<form class="form-signin" method="POST" action="../php/connection.php" >
  
<div class="container">
  <form>
    <div class="row">
      <h4>Log in</h4>

      <div class="input-group input-group-icon">
        <input type="text" placeholder="Email" name = "email" required />
        <div class="input-icon"><i class="fa fa-user"></i
          ></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name = "password" required />
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>

    </div><h4> <?= $_SESSION['error message'] ?> </h4>
   

<div class="row">

    <div class="row">
  
      

      <button name = "login" class="button"  href="login.html" >Login</button>

      <h4>Need to make an account? <span><a name = "signup" class="btn btn-default signup" href="signup.html">SignUp</a></span></h4>
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  </form>

</body>

</html>