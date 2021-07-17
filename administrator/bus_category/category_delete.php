<?php

require_once '../../dbconnection/database.php';
$category_id = $_GET['category_id'];
$sql = "DELETE FROM tbl_category WHERE category_id = '$category_id'";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    header('location:categories_view.php?deleted');
} else {
    header('location:categories_view.php?delete_error');
}
$stmt = null;