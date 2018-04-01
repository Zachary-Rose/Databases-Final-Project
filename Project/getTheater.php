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

$sql = "CREATE TEMPORARY TABLE temp AS SELECT ComplexName, tickets FROM showing S INNER JOIN(SELECT ShowingNumber, SUM(Quantity) AS tickets FROM reservations GROUP BY ShowingNumber) R ON S.ShowingNumber = R.ShowingNumber ORDER BY tickets DESC";
				if ($conn->query($sql) === TRUE) {
				} 					
				else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
					}



?>

<table width="200" border="1" align="center">
		<thead>
            <tr>
                <td>Complex Name</td>
				<td>Sales</td>				
            </tr>
        </thead>
      <tbody>
        <?php
            $popMovie_query = $conn->query("SELECT DISTINCT ComplexName, SUM(tickets) AS Sales FROM temp GROUP BY ComplexName ORDER BY Sales DESC ");
           while($row = mysqli_fetch_array($popMovie_query)){ 
		  		echo "<tr>";
                echo "<td>" . $row['ComplexName'] . "</td>";
                echo "<td>" . $row['Sales'] . "</td>";
                echo "</tr>";

            }
            ?>
      </tbody>
    </table>



