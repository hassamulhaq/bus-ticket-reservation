<?php


if (isset($_POST['submit'])) {
    require "../../dbconnection/database.php";

    $title = $_POST['title'];
    $number_of_seats = $_POST['number_of_seats'];
    $sql = "INSERT INTO tbl_type(title, number_of_seats) VALUES('$title', '$number_of_seats')";
    $fire = $conn->prepare($sql);
    if ($fire->execute()) {
        header("location:type_add.php?success");
    }else {
        header("location:type_add.php?error");
    }

}