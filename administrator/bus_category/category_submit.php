<?php


if (isset($_POST['submit'])) {
    require "../../dbconnection/database.php";

    $title = $_POST['title'];
    $sql = "INSERT INTO tbl_category(title) VALUES('$title')";
    $fire = $conn->prepare($sql);
    if ($fire->execute()) {
        header("location:category_add.php?success");
    }else {
        header("location:category_add.php?error");
    }

}