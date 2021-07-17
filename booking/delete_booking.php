<?php

require_once '../dbconnection/database.php';
$booking_id = $_GET['booking_id'];
$sql = "DELETE FROM tbl_booking WHERE booking_id = '$booking_id'";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header('location:booking.php?deleted');
} else {
    header('location:booking.php?delete_error');
}
$stmt = null;