<?php
session_start();

if (isset($_POST['submit'])) {

    require "../../dbconnection/database.php";

    $category_id = $_POST['category_id'];
    $title = $_POST['title'];

    $sql = "UPDATE tbl_category SET title = '$title' WHERE category_id = '$category_id'";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        header("location:categories_view.php?updated");
    } else {
        header('location:categories_view.php?not_updated');
    }
    $stmt = null;
}