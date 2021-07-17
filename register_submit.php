<?php


if (isset($_POST['submit'])) {
    require "dbconnection/database.php";

    $target_dir = 'images/';
    $myprofile = $_FILES['myprofile']['name'];
    $target_dir .= $myprofile;
    $tmp_dir = $_FILES['myprofile']['tmp_name'];
    $size = $_FILES['myprofile']['size'];
    $type = $_FILES['myprofile']['type'];
    $ext = pathinfo($myprofile, PATHINFO_EXTENSION);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $role = 'user';
    $join_date = date('Y-m-d');

    if ($password !== $c_password) {
        header("location:register.php?password_error");
        exit;
    }

    if ($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'PNG' or $ext == 'JPG' or $ext == 'JPEG') {
        $uploaded = move_uploaded_file($tmp_dir, $target_dir);
        if ($uploaded) {
            $sql = "INSERT INTO tbl_user(username, email, phone, gender, image, password, role, join_date) VALUES('$username','$email', '$phone','$gender', '$target_dir', '$password','$role', '$join_date')";
            $fire = $conn->prepare($sql);
            if ($fire->execute()) {
                header("location:register.php?signup");
            }else {
                header("location:register.php?signup_error");
            }
        }
    }
    else {
        header('location:register.php?error=invalid_extention');
    }
}