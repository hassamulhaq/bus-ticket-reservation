<?php

require_once '../dbconnection/database.php';
$user_id = $_GET['user_id'];
$sql = "DELETE FROM tbl_user WHERE user_id = '$user_id'";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header('location:view_users.php?deleted');
} else {
    header('location:view_users.php?delete_error');
}
$stmt = null;