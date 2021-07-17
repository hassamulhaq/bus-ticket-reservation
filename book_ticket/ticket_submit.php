<?php

echo '<pre>';
    print_r($_POST);
    print_r($_GET);
echo '</pre>';



if (isset($_POST['submit'])) {
    require "../dbconnection/database.php";

    $bus_post_id = $_POST['bus_post_id'];
    $user_id = $_POST['user_id'];
    $per_price = $_POST['per_price'];
    $person = $_POST['person'];
    $total_price = $_POST['total_price'];
    $tour_date = $_POST['tour_date'];
    $payment_type = $_POST['payment_type'];
    $booking_date = date('Y-m-d');


    $sql = "INSERT INTO tbl_booking(bus_post_id, user_id, per_price, person, total_price, tour_date ,payment_type, booking_date) VALUES('$bus_post_id', '$user_id', '$per_price', '$person', '$total_price', '$tour_date' ,'$payment_type', '$booking_date')";
    $fire = $conn->prepare($sql);
    if ($fire->execute()) {
        header("location:../booking/booking.php?success");
    }else {
        header("location:../booking/booking.php?error");
    }
}