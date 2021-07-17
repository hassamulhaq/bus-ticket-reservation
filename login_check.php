<?php
session_start();

if (isset($_POST['submit'])) {
    require "dbconnection/database.php";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount()>0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user_session'] = [
            'user_id'   => $result['user_id'],
            'username'  => $result['username'],
            'email'     => $result['email'],
            'phone'     => $result['phone'],
            'role'      => $result['role']
        ];
        header("location:index.php?success");
    }
    else {
        header("location:login.php?error");
    }
}