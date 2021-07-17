<?php
session_start();
require "../dbconnection/database.php";
$booking_id = $_GET['booking_id'];
$sql = "UPDATE tbl_booking SET tour_status=1 WHERE booking_id = '$booking_id'";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header("location:booking.php?updated");
} else {
    header('location:booking.php?not_updated');
}
