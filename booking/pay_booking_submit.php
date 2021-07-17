<?php
session_start();

if (isset($_POST['submit'])) {

    require "../dbconnection/database.php";

    $booking_id = $_POST['booking_id'];

    $sql = "UPDATE tbl_booking SET paid_alert=1 WHERE booking_id = '$booking_id'";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        header("location:booking.php?paid");
    } else {
        header('location:booking.php?error_paid');
    }
}