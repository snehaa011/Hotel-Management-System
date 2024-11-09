<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Make sure guest_id exists in session
    if (!isset($_SESSION['guest_id'])) {
        echo "Unauthorized access.";
        exit;
    }

    $guest_id = $_SESSION['guest_id'];
    $new_check_in_date = $_POST['new_check_in_date'];
    $new_check_out_date = $_POST['new_check_out_date'];

    // Update the booking details
    $stmt = $conn->prepare("UPDATE bookings SET check_in_date = ?, check_out_date = ? WHERE guest_id = ?");
    $stmt->bind_param("ssi", $new_check_in_date, $new_check_out_date, $guest_id);

    if ($stmt->execute()) {
        echo "Booking updated successfully!";
    } else {
        echo "Error updating booking.";
    }
}
?>
