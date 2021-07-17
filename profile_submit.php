<?php
    session_start();

if (isset($_POST['submit'])) {

    require "dbconnection/database.php";


    $user_id = $_POST['user_id'];

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
        header("location:profile.php?password_error");
        exit;
    }

    
    
    if ($ext === 'png' or $ext === 'jpg' or $ext === 'jpeg' or $ext === 'PNG' or $ext === 'JPG' or $ext === 'JPEG') {
        $uploaded = move_uploaded_file($tmp_dir, $target_dir);
        if ($uploaded) {
            $sql = "UPDATE
                        tbl_user
                    SET
                        username = '$username',
                        email = '$email',
                        phone = '$phone',
                        gender = '$gender',
                        image = '$target_dir',
                        password = '$password'
                    WHERE
                        user_id = $user_id
                    ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('location:profile.php?updated');
            } else {
                header('location:profile.php?not_updated');
            }
        }
    } else {
        header('location:profile.php?invalid_extention');
    }
    $stmt = null;
}