<?php
    session_start();



if (isset($_POST['submit'])) {
    require "../../dbconnection/database.php";

    $target_dir = 'images/';
    $bus_image = $_FILES['bus_image']['name'];
    $target_dir .= $bus_image;
    $tmp_dir = $_FILES['bus_image']['tmp_name'];
    $size = $_FILES['bus_image']['size'];
    $type = $_FILES['bus_image']['type'];
    $ext = pathinfo($bus_image, PATHINFO_EXTENSION);

    $bus_post_id = $_POST['bus_post_id'];
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
            $sql = "UPDATE tbl_bus_post SET category_id='$category_id', type_id='$type_id', title='$title', bus_image='$target_dir', details='$details', source='$source', destination='$destination', days='$days', nights='$nights', inclusions='$inclusions', exclusions='$exclusions', per_price='$per_price' WHERE bus_post_id='$bus_post_id'";
            $fire = $conn->prepare($sql);
            if ($fire->execute()) {
                header("location:posts_view.php?updated");
            }else {
                header("location:posts_view.php?not_updated");
            }
        }
    }
    else {
        header('location:posts_view.php?invalid_extention');
    }

}