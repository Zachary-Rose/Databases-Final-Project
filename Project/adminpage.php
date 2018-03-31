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

$userID="";

?>

<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TheaterHub Admin</title>
<link href="singlePageTemplate.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container">
  <!-- Navigation -->
<header> <a href="">
    <h4 class="logo">Admin</h4>
    </a>
  </header>
  <!-- Hero Section -->
  <section class="hero" id="hero">
    <h2 class="hero_header">Member List </h2>
    <table width="200" border="1" align="center">
		<thead>
            <tr>
                <td>Account Number</td>
                <td>First Name</td>
				 <td>Last Name</td>
				 <td>Email</td>
				
            </tr>
        </thead>
      <tbody>
        <?php
            $member_table_results = $conn->query("SELECT AccountNumber, FNAME, LNAME, Email FROM user");
           while($row = mysqli_fetch_array($member_table_results)){ 
		  		echo "<tr>";
                echo "<td>" . $row['AccountNumber'] . "</td>";
                echo "<td>" . $row['FNAME'] . "</td>";
			  	echo "<td>" . $row['LNAME'] . "</td>";
			  	echo "<td>" . $row['Email'] . "</td>";
                echo "</tr>";

            }
            ?>
      </tbody>
    </table>
<div align="center">
	<form action="#" method="post">
      Account: <select name = "AccNum" >
    <?php  
    $AccNum_query = $conn->query("SELECT AccountNumber FROM user");
    while ($row = mysqli_fetch_array($AccNum_query)) {

        $Account = $row['AccountNumber'];
        echo "<option value='" . $Account . "'>" . $Account . "</option>";
		
    }

    ?>
        </select>
      
      </div>
		<div align="center">
	  <input type="button" class="button" name="submit" value="Delete" align="center">
			</form>
			<?php 
			if(isset($_POST['submit'])){
				$selected_val = $_POST['AccNum'];  // Storing Selected Value In Variable
				echo "You have selected :" .$selected_val;  // Displaying Selected Value
				$Delete_User_Query = $conn->query("DELETE FROM user WHERE AccountNum = 'AccNum'");
				}
			?>
	  </div>
  </section>
	<?php
	$Name = $Num = $PhoneNum = $StreetNum = $Street = $City = $Postal ="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST["Name"])) {
    	$Name = "";
  		} 
		else {
    	$Name = "'". test_input($_POST["Name"]."'");
  		}
  		if (empty($_POST["Num"])) {
    	$Num = "";
  		}
		else {
    	$Num = test_input($_POST["Num"]);
  		}
  		if (empty($_POST["PhoneNum"])) {
    	$PhoneNum = "";
  		} 
		else {
    	$PhoneNum = test_input($_POST["PhoneNum"]);
  		}
  		if (empty($_POST["StreetNum"])) {
    	$StreetNum = "";
  		} 
		else {
    	$StreetNum = test_input($_POST["StreetNum"]);
		}
		if (empty($_POST["Street"])) {
    	$Street = "";
  		} 
		else {
    	$Street = "'".test_input($_POST["Street"]."'");
		}
		if (empty($_POST["City"])) {
    	$City = "";
  		} 
		else {
    	$City = "'".test_input($_POST["City"]."'");
		}
		if (empty($_POST["Postal"])) {
    	$Postal = "";
  		} 
		else {
    	$Postal ="'". test_input($_POST["Postal"]."'");
		}
	}
	
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
	return $data;
 }  

	?>
  <section class="hero" id="hero">
    <h2 class="hero_header">Add Theater </h2>
	  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div align="center">
Name: <input type="text" name="Name" value="<?php echo $Name;?>"><br>
Number of Theaters: <input type="text" name="Num" value="<?php echo $Num;?>"><br>
Phone Number: <input type="text" name="PhoneNum" value="<?php echo $PhoneNum;?>"><br>
Street Number: <input type="text" name="StreetNum" value="<?php echo $StreetNum;?>"><br>
Street: <input type="text" name="Street" value="<?php echo $Street;?>"><br>
City: <input type="text" name="City" value="<?php echo $City;?>"><br>
Postal Code: <input type="text" name="Postal" value="<?php echo $Postal;?>"><br>
<input type="submit" class="button" name="submit" value="Add" align="center">
</form>
		  <?php
echo $Name;
echo "<br>";
echo $Num;
echo "<br>";
echo $PhoneNum;
echo "<br>";
echo $StreetNum;
echo "<br>";
echo $Street;
echo "<br>";
echo $City;
echo "<br>";
echo $Postal;
?>
		  
		  <?php
$sql = "INSERT INTO theatercomplex  
VALUES ($Name, $Num, $PhoneNum, $StreetNum, $Street, $City, $Postal)";
if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		  ?>
		  </div>
</section>

	</section>
  <section class="hero" id="hero">
    <h2 class="hero_header">Edit Theater </h2>
	  <form action="/action_page.php">
		  <div align="center">
<div align="center">
	Theater: <select class="light">
    <option value="Theater1">Theater1</option>
    <option value="Theater2">Theater2</option>
    <option value="Theater3">Theater3</option>
</select></div>
Name: <input type="text" name="Name" value=""><br>
Number of Theaters: <input type="text" name="" value=""><br>
Phone Number: <input type="text" name="Name" value=""><br>
Address: <input type="text" name="Name" value=""><br>
<div class="button">Update</div>
</form>
		  </div>
</section>

 </section>
	<?php
	$Title = $RunTime = $Rating = $Plot = $Director = $Production = $Supplier = $StartDate = $EndDate = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST["Title"])) {
    	$Title = "";
  		} 
		else {
    	$Title = "'".test_input($_POST["Title"]."'");
  		}
		if (empty($_POST["RunTime"])) {
    	$RunTime = "";
  		} 
		else {
    	$RunTime = test_input($_POST["RunTime"]);
  		}
  		if (empty($_POST["Rating"])) {
    	$Rating = "";
  		}
		else {
    	$Rating ="'". test_input($_POST["Rating"]."'");
  		}
		
  		if (empty($_POST["Plot"])) {
    	$Plot = "";
  		} 
		else {
    	$Plot = "'".test_input($_POST["Plot"]."'");
  		}
  		if (empty($_POST["Director"])) {
    	$Director = "";
  		} 
		else {
    	$Director = "'".test_input($_POST["Director"]."'");
		}
		if (empty($_POST["Production"])) {
    	$Production = "";
  		} 
		else {
    	$Production = "'".test_input($_POST["Production"]."'");
		}
		if (empty($_POST["Supplier"])) {
    	$Supplier = "";
  		} 
		else {
    	$Supplier = "'".test_input($_POST["Supplier"]."'");
		}
		if (empty($_POST["StartDate"])) {
    	$StartDate = "";
  		} 
		else {
    	$StartDate ="'". test_input($_POST["StartDate"]."'");
		}
		if (empty($_POST["EndDate"])) {
    	$EndDate = "";
  		} 
		else {
    	$EndDate ="'". test_input($_POST["EndDate"]."'");
		}
	}
	
   

	?>
  <section class="hero" id="hero">
    <h2 class="hero_header">Add Movie </h2>
	  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div align="center">
Title: <input type="text" name="Title" value="<?php echo $Title;?>"><br>
Running Time: <input type="text" name="RunTime" value="<?php echo $RunTime;?>"><br>
Rating: <input type="text" name="Rating" value="<?php echo $Rating;?>"><br>
Plot: <input type="text" name="Plot" value="<?php echo $Plot;?>"><br>
Director: <input type="text" name="Director" value="<?php echo $Director;?>"><br>
Production Company: <input type="text" name="Production" value="<?php echo $Production;?>"><br>
Supplier: <input type="text" name="Supplier" value="<?php echo $Supplier;?>"><br>
Start Date: <input type="text" name="StartDate" value="<?php echo $StartDate;?>"><br>
End Date: <input type="text" name="EndDate" value="<?php echo $EndDate;?>"><br>			  
<input type="submit" class="button" name="submit" value="Add" align="center">
</form>
		  <?php
echo $Title;
echo "<br>";
echo $RunTime;
echo "<br>";
echo $Rating;
echo "<br>";
echo $Plot;
echo "<br>";
echo $Director;
echo "<br>";
echo $Production;
echo "<br>";
echo $Supplier;
echo "<br>";
echo $StartDate;
echo "<br>";
echo $EndDate;
?>
		  
		  <?php
$sql = "INSERT INTO movie 
VALUES ($Title, $RunTime, $Rating, $Plot, $Director, $Production, $Supplier, $StartDate, $EndDate)";
if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
		  ?>
		  </div>
</section>

	</section>

	 <section class="hero" id="hero">
    <h2 class="hero_header">Edit Showing </h2>
	  <form action="/action_page.php">
		  <div align="center">
<div align="center">
	Theater: <select class="light">
    <option value="Movie1">Movie1</option>
    <option value="Movie2">Movie2</option>
    <option value="Movie3">Movie3</option>
</select></div>
			  <div align="center">
	Showing: <select class="light">
    <option value="Showing1">Show1</option>
    <option value="Showing2">Show2</option>
    <option value="Showing3">Show3</option>
</select></div>

Start Time: <input type="text" name="Name" value=""><br>
Date: <input type="text" name="" value=""><br>
Theater Number: <input type="text" name="Name" value=""><br>
Avalible Steats: <input type="text" name="Name" value=""><br>
<div class="button">Update</div>
</form>
		  </div>
</section>

	<section class="hero" id="hero">
    <h2 class="hero_header">Customer History </h2>
		  <div align="center">
			  <div align="center">
	Customer: <select class="light">
    <option value="Customer1">Customer1</option>
    <option value="Customer2">Customer2</option>
    <option value="Customer3">Customer3</option>
</select></div>
			  <table width="200" border="1">
  <tbody>
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
		  </div>
	</section>

	<section class="hero" id="hero">
    <h2 class="hero_header">Most Popular</h2>
		<div align="center">
		<div class="button">Get Theater</div><table width="200" border="1">
  <tbody align="center">
    <tr>
      <th scope="col">&nbsp;</th>
    </tr>
  </tbody>
</table>

		</div>
		<div align="center">
		<div class="button">Get Movie</div><table width="200" border="1">
  <tbody align="center">
    <tr>
      <th scope="col">&nbsp;</th>
    </tr>
  </tbody>
</table>

	  </div>
	</section>









  <!-- Footer Section -->
  <section class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
<div class="button">Log Out</div>
  </section>
  <!-- Copyrights Section --></div>
<!-- Main Container Ends -->
</body>
</html>
