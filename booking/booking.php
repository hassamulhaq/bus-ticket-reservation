<?php include_once "../headers/header.php"; ?>


    <!-- Response -->
    <div align="center">
        <br>
        <?php
        if (isset($_GET['updated'])) {
            echo "Updated Successfully.";
        } elseif (isset($_GET['password_error'])) {
            echo "Password and Confirm Password are not same.";
        } elseif (isset($_GET['error_db'])) {
            echo "Database Error.";
        } elseif (isset($_GET['invalid_extention'])) {
            echo "PNG and JPG images are allowed.";
        } elseif (isset($_GET['deleted'])) {
            echo "Deleted.";
        } elseif (isset($_GET['delete_error'])) {
            echo "Not Deleted.";
        } elseif (isset($_GET['paid'])) {
            echo "Amount Paid";
        }
        ?>
        <hr>
    </div>
    <!-- /Response -->


<?php
    if ($_SESSION['user_session']['role'] == 'admin' || $_SESSION['user_session']['role'] == 'frontdesk') { ?>

        <div>
            <h2>Manage Booking</h2>
            <table class="post_table" cellpadding="10" cellspacing="0" width="100%">
                <thead>
                <tr style="background: aqua;">
                    <th>Booking ID</th>
                    <th>Travel Bus Booked</th>
                    <th>User</th>
                    <th>Total Person</th>
                    <th>Amount</th>
                    <th>Tour Date</th>
                    <th>Register Date</th>
                    <th>Payment Style</th>
                    <th>Payment Status</th>
                    <th>Payment Alert</th>
                    <th>Payment Done</th>
                    <th>Tour Status</th>
                    <th>Tour Done</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody align="">
                <?php
                require_once '../dbconnection/database.php';
                $user_id = $_SESSION['user_session']['user_id'];
                $sql = "SELECT * FROM tbl_booking ORDER BY booking_id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                        $bus_post_id = $row["bus_post_id"];
                        $sql_category = "SELECT * FROM tbl_bus_post WHERE bus_post_id='$bus_post_id'";
                        $stmt_bus_post = $conn->prepare($sql_category);
                        $stmt_bus_post->execute();
                        $result_bus_post = $stmt_bus_post->fetch(PDO::FETCH_ASSOC);

                        $user_id = $row["user_id"];
                        $stmt_sql = "SELECT * FROM tbl_user WHERE user_id='$user_id'";
                        $stmt_user_id = $conn->prepare($stmt_sql);
                        $stmt_user_id->execute();
                        $result_user = $stmt_user_id->fetch(PDO::FETCH_ASSOC);



                        echo '<tr>';
                        echo '<td>'.$row["booking_id"].'</td>';
                        echo '<td>'.$result_bus_post["title"].'</td>';
                        echo '<td>'.$result_user["username"].'</td>';
                        echo '<td>'.$row["person"].'</td>';
                        echo '<td>'.$row["total_price"].'</td>';
                        echo '<td>'.$row["tour_date"].'</td>';
                        echo '<td>'.$row["booking_date"].'</td>';
                        echo '<td>'.$row["payment_type"].'</td>';
                        if ($row["paid"] == 0) {
                            $paid = 'Un Paid';
                        } else {
                            $paid = 'Paid';
                        }
                        echo '<td>'.$paid.'</td>';


                        if ($row["paid_alert"] == 0) {
                            $paid = 'Still Un-paid';
                        } else {
                            $paid = 'User Deposit Amount to jazzCash';
                        }
                        echo '<td>'.$paid.'</td>';


                        if ($row["paid_alert"] == 0 and $row['paid'] == 0) {
                            $paid_status = 'No Payment Recivied';
                        } elseif ($row["paid_alert"] == 1 and $row['paid'] == 0) {
                            $paid_status = 'Check the JazzCash Account is there any payment with this booking ID if found the click the button<a class="edit_button" href="payment_recived.php?booking_id='.$row["booking_id"].'">Recived</a>';
                        } elseif ($row['paid_alert'] == 1 and $row['paid'] == 1) {
                            $paid_status = 'Done';
                        }
                        else {
                            $paid_status = '---';
                        }
                        echo '<td width="250">'.$paid_status.'</td>';


                        if ($row["tour_status"] == 0) {
                            $tour_status = 'Tour Pending';
                        } else {
                            $tour_status = 'Tour Completed';
                        }
                        echo '<td>'.$tour_status.'</td>';


                        if ($row["tour_status"] == 0) {
                            $edit = '<a class="edit_button" href="booking_status.php?booking_id='.$row["booking_id"].'">Change_Status</a>';
                        } else {
                            $edit = 'Tour Approved';
                        }
                        echo '<td>'.$edit.'</td>';

                        if ($row["tour_status"] == 0) {
                            $edit = '<a class="edit_button" href="booking_edit.php?booking_id='.$row["booking_id"].'">Edit</a>';
                        } else {
                            $edit = '---';
                        }
                        echo '<td>'.$edit.'</td>';

                        echo '<td><a class="delete_button" href="delete_booking.php?booking_id='.$row["booking_id"].'">Delete</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr>';
                    echo '<td>No User Found</td>';
                    echo '</tr>';
                }

                $stmt = null;
                ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>


<div class="contents">
    <div>
        <h2>Manage Users</h2>
        <table class="view_users_table" cellpadding="10" cellspacing="0" width="100%">
            <thead>
            <tr style="background: aqua;">
                <th>Booking ID</th>
                <th>Travel Bus Booked</th>
                <th>User</th>
                <th>Total Person</th>
                <th>Amount</th>
                <th>Tour Date</th>
                <th>Payment</th>
                <th>Payment Status</th>
                <th>Tour Done</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody align="">
            <?php
            require_once '../dbconnection/database.php';
            $user_id = $_SESSION['user_session']['user_id'];
            $sql = "SELECT * FROM tbl_booking WHERE user_id = '$user_id' ORDER BY booking_id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


                    $bus_post_id = $row["bus_post_id"];
                    $sql_category = "SELECT * FROM tbl_bus_post WHERE bus_post_id='$bus_post_id'";
                    $stmt_bus_post = $conn->prepare($sql_category);
                    $stmt_bus_post->execute();
                    $result_bus_post = $stmt_bus_post->fetch(PDO::FETCH_ASSOC);

                    $user_id = $row["user_id"];
                    $stmt_sql = "SELECT * FROM tbl_user WHERE user_id='$user_id'";
                    $stmt_user_id = $conn->prepare($stmt_sql);
                    $stmt_user_id->execute();
                    $result_user = $stmt_user_id->fetch(PDO::FETCH_ASSOC);



                    echo '<tr>';
                    echo '<td>'.$row["booking_id"].'</td>';
                    echo '<td>'.$result_bus_post["title"].'</td>';
                    echo '<td>'.$result_user["username"].'</td>';
                    echo '<td>'.$row["person"].'</td>';
                    echo '<td>'.$row["total_price"].'</td>';
                    echo '<td>'.$row["tour_date"].'</td>';
                    echo '<td>'.$row["payment_type"].'</td>';
                    if ($row["paid"] == 0 and $row['paid_alert'] == 0) {
                        $paid = 'Un Paid <a class="pay_button" href="pay_booking.php?booking_id='.$row["booking_id"].' ">PayNow</a> ';
                    } elseif ($row["paid"] == 0 and $row['paid_alert'] == 1) {
                        $paid = 'Pending';
                    } else {
                        $paid = 'Paid';
                    }
                    echo '<td>'.$paid.'</td>';

                    if ($row["tour_status"] == 0) {
                        $tour_status = 'Tour Pending';
                    } else {
                        $tour_status = 'Tour Approved';
                    }
                    echo '<td>'.$tour_status.'</td>';


                    if ($row["tour_status"] == 0) {
                        $edit = '<a class="edit_button" href="booking_edit.php?booking_id='.$row["booking_id"].'">Edit</a>';
                    } else {
                        $edit = '---';
                    }
                    echo '<td>'.$edit.'</td>';



                    echo '<td><a class="delete_button" href="delete_booking.php?booking_id='.$row["booking_id"].'">Cancel</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td>No User Found</td>';
                echo '</tr>';
            }
            ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="booking_sidebar" style="margin: auto; width: 500px; border: 2px solid; margin-top: 10px">
    <table class="post_table" cellspacing="0">
        <caption><h1 class="post_title">Payment Info</h1></caption>
        <tbody align="">
        <tr>
            <td>JazzCash Us:</td>
            <td><strong>0333-000000</strong></td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
                And if you choose <u>Online Payment</u> then click on <strong>Pay Now</strong> and After Successful JazzCash on 0333-000000 message us with your Booking Id.
                <hr>
                <hr>
                And if you choose <u>Departure Time Payment</u> then pay us 1 hour before you travel.
                <hr>
            </td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>