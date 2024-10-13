<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../authentication/config.php");

// Check if the form has been submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["status"])) {
    $booking_id = $_POST['booking_id'];
    $status = $_POST['status'];

    // Set status code based on the button clicked
    if ($status === 'Accepted') {
        $status_code = '2'; // Accept sets the status to 1
    } else {
        $status_code = '1'; // Decline sets the status to 0
    }

    // Update query to change the status
    $query = "UPDATE tbl_session SET status='$status_code' WHERE id='$booking_id'";

    if (mysqli_query($connect, $query)) {
        // Redirect to another page after successful update
        header("Location: bookingsessions.php");
        exit(); // Always exit after a header redirect
    } else {
        // Display SQL error if the query fails
        echo "Error updating status: " . mysqli_error($connect);
    }
}
?>
