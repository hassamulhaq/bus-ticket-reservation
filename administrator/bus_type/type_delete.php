<?php

require_once '../../dbconnection/database.php';
$type_id = $_GET['type_id'];
$sql = "DELETE FROM tbl_type WHERE type_id = '$type_id'";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header('location:types_view.php?deleted');
} else {
    header('location:types_view.php?delete_error');
}
$stmt = null;