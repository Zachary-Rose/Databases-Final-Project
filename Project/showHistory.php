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

$UserID = $_POST["ID"];
?>

<table width="200" border="1" align="center">
		<thead>
            <tr>
                <td>Account Number</td>
                <td>Reservation Number</td>
				 <td>Showing Number</td>
				 <td>Quantity</td>
				
            </tr>
        </thead>
      <tbody>
        <?php
            $customer_table_results = $conn->query("SELECT AccountNumber, ReservationNumber, ShowingNumber, Quantity FROM reservations WHERE AccountNumber = $UserID");
           while($row = mysqli_fetch_array($customer_table_results)){ 
		  		echo "<tr>";
                echo "<td>" . $row['AccountNumber'] . "</td>";
                echo "<td>" . $row['ReservationNumber'] . "</td>";
			  	echo "<td>" . $row['ShowingNumber'] . "</td>";
			  	echo "<td>" . $row['Quantity'] . "</td>";
                echo "</tr>";

            }
            ?>
      </tbody>
    </table>


