<?php
include_once("../headers/header.php");
?>


<div class="contents">
    <div style="margin-top: 20px;" align="center">
        <a href="payment.php" class="normal_button">All Payments</a>
        <a href="reservation.php" class="normal_button">Reservations</a>
        <a href="earn.php" class="normal_button">Total Earned</a>
    </div>
</div>

<?php
require_once '../dbconnection/database.php'; ?>

<div class="contents">
    <br>
    <table class="normal_table" cellspacing="0">
        <tr>
            <td colspan="10"><h3 align="center">Reservations (Today)</h3></td>
        </tr>
        <tr>
            <td colspan="2">Start Date</td>
            <td colspan="2">End Date</td>
            <td colspan="2"><button href="#" onclick="javascript:window.print();">Print</button></td>
        </tr>
        <tr>
            <form action="" method="">
                <td colspan="2"><input type="date" name="start_date"></td>
                <td colspan="2"><input type="date" name="end_date"></td>
                <td colspan="2">
                    <input type="submit" name="reservation_button" value="Filter">
                </td>
            </form>
        </tr>
        <tr>
            <th>Tour</th>
            <th>Number Of Person</th>
            <th>Per Person Price</th>
            <th>Total Amount</th>
            <th>Tour Date</th>
            <th>Payment Type</th>
        </tr>
        <?php
        if (isset($_GET['reservation_button'])) {
            $start_date = $_GET['start_date'];
            $end_date = $_GET['end_date'];
        } else {
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
        }
        $sql = "SELECT * FROM tbl_booking WHERE booking_date BETWEEN '$start_date' AND '$end_date'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //print_r($row);
                echo '<tr>';
                $bus_post_id = $row["bus_post_id"];
                $bus_post_sql = "SELECT title FROM tbl_bus_post WHERE bus_post_id = '$bus_post_id'";
                $bus_stmt = $conn->prepare($bus_post_sql);
                $bus_stmt->execute();
                $bus_post_result = $bus_stmt->fetch(PDO::FETCH_ASSOC);
                //print_r($bus_post_result);
                echo '<td>'.$bus_post_result["title"].'</td>';

                echo '<td>'.$row["person"].'</td>';
                echo '<td>'.$row["per_price"].'</td>';
                echo '<td>'.$row["total_price"].'</td>';
                echo '<td>'.$row["tour_date"].'</td>';
                echo '<td>'.$row["payment_type"].'</td>';
                echo '</tr>';
            }
        }
        else {
            echo '<tr><td><h2>No Record Found</h2></td></tr>';
        }
        ?>

        <?php
        $sql = "SELECT COUNT(booking_id) as total_booking FROM tbl_booking WHERE booking_date BETWEEN '$start_date' AND '$end_date'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_result = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($total_result);
        echo '<tr>';
        echo '<td><strong>Total Booking</strong></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$total_result["total_booking"].'</td>';
        echo '</tr>';
        ?>
    </table>










</div>


<script src="../styles/jQuery-v3.4.1.js"></script>
<script></script>
</body>
</html>
