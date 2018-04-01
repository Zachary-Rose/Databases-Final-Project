<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final_theaterdb";
    
    // Connect to Database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection_failed:" . $conn->connect_error);
    }

 // Values from Search
    $numtickets = $_POST["numtickets_chosen"];
    echo $numtickets;






                // Decrement number of seats available
            //$conn->query("UPDATE Showing SET num_seats = num_seats - $num_tickets WHERE showing_id = '$showing_id'");
            
            //$conn->query("insert into Reservations (reservation_id, num_tickets, account_num, showing_id) values ('$next_reservation_id', $num_tickets, $user_id, '$showing_id')");
           
?>