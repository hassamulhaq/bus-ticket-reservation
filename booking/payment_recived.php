<?php
session_start();



    require "../dbconnection/database.php";

    $booking_id = $_GET['booking_id'];

    $sql = "UPDATE tbl_booking SET paid=1 WHERE booking_id = '$booking_id'";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        header("location:booking.php?both_paid");
    } else {
        header('location:booking.php?error_both_paid');
    }
