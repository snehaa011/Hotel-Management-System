<?php
// editBooking.php

session_start();
include 'db_connection.php'; // make sure to include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guest_id = $_POST['guest_id'];

    // Check if guest_id exists in the database
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE guest_id = ?");
    $stmt->bind_param("i", $guest_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Store guest_id in session to allow editing
        $_SESSION['guest_id'] = $guest_id;
        $booking = $result->fetch_assoc();

        echo "<h3>Booking Details</h3>";
        echo "<p>Room Type: " . $booking['room_type'] . "</p>";
        echo "<p>Check-in Date: " . $booking['check_in_date'] . "</p>";
        echo "<p>Check-out Date: " . $booking['check_out_date'] . "</p>";

        // Display edit options
        echo "<form method='POST' action='updateBooking.php'>
                <input type='hidden' name='guest_id' value='$guest_id'>
                <label for='new_check_in_date'>New Check-in Date:</label>
                <input type='date' name='new_check_in_date' required>
                
                <label for='new_check_out_date'>New Check-out Date:</label>
                <input type='date' name='new_check_out_date' required>
                
                <button type='submit'>Update Booking</button>
              </form>";
    } else {
        echo "No booking found for this Guest ID.";
    }
}
?>
