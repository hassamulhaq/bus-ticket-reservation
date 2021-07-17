<?php


if (isset($_POST['submit'])) {
    require "../../dbconnection/database.php";

    $target_dir = 'images/';
    $bus_image = $_FILES['bus_image']['name'];
    $target_dir .= $bus_image;
    $tmp_dir = $_FILES['bus_image']['tmp_name'];
    $size = $_FILES['bus_image']['size'];
    $type = $_FILES['bus_image']['type'];
    $ext = pathinfo($bus_image, PATHINFO_EXTENSION);

    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $type_id = $_POST['type_id'];
    $details = $_POST['details'];
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $days = $_POST['days'];
    $nights = $_POST['nights'];
    $inclusions = $_POST['inclusions'];
    $exclusions = $_POST['exclusions'];
    $per_price = $_POST['per_price'];
    $post_date = date('Y-m-d');


    if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG') {
        $uploaded = move_uploaded_file($tmp_dir, $target_dir);
        if ($uploaded) {
            $sql = "INSERT INTO tbl_bus_post(category_id, type_id, title, bus_image, details, source, destination, days, nights, inclusions, exclusions, per_price, post_date) VALUES('$category_id', '$type_id', '$title', '$target_dir', '$details', '$source', '$destination', '$days', '$nights', '$inclusions', '$exclusions', '$per_price', '$post_date')";
            $fire = $conn->prepare($sql);
            if ($fire->execute()) {
                header("location:post_add.php?success");
            }else {
                header("location:post_add.php?error");
            }
        }
    }
    else {
        header('location:post_add.php?invalid_extention');
    }

}