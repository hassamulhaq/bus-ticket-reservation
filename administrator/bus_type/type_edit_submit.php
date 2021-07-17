<?php
session_start();

if (isset($_POST['submit'])) {

    require "../../dbconnection/database.php";

    $type_id = $_POST['type_id'];
    $title = $_POST['title'];
    $number_of_seats = $_POST['number_of_seats'];

    $sql = "UPDATE tbl_type SET title='$title', number_of_seats='$number_of_seats' WHERE type_id = '$type_id'";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        header("location:types_view.php?updated");
    } else {
        header('location:types_view.php?not_updated');
    }
    $stmt = null;
}