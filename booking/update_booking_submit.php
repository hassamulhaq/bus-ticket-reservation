<?php
session_start();

if (isset($_POST['submit'])) {

    require "../dbconnection/database.php";

    $booking_id = $_POST['booking_id'];
    $user_id = $_POST['user_id'];
    $tour_date = $_POST['tour_date'];

    $sql = "UPDATE tbl_booking SET tour_date='$tour_date' WHERE booking_id = '$booking_id'";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        header("location:booking.php?updated");
    } else {
        header('location:booking.php?not_updated');
    }
}