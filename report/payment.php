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
    <table class="normal_table" cellspacing="0">
        <tr>
            <td colspan="3"><h3 align="center">Payments (Today)</h3></td>
        </tr>
        <tr>
            <td>Start Date</td>
            <td>End Date</td>
            <td><button href="#" onclick="javascript:window.print();">Print</button></td>
        </tr>
        <tr>
            <form action="" method="">
                <td><input type="date" name="start_date"></td>
                <td><input type="date" name="end_date"></td>
                <td>
                    <input type="submit" name="payment_button" value="Filter">
                </td>
            </form>
        </tr>
        <tr>
            <th>Amount</th>
            <th>Booking Date</th>
            <th>Payment Type</th>
        </tr>
        <?php
        if (isset($_GET['payment_button'])) {
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
                echo '<td>'.$row["total_price"].'</td>';
                echo '<td>'.$row["booking_date"].'</td>';
                echo '<td>'.$row["payment_type"].'</td>';
                echo '</tr>';
            }
        }
        else {
            echo '<tr><td><h2>No Record Found</h2></td></tr>';
        }
        ?>

        <?php
        $sql = "SELECT SUM(total_price) as total_payment FROM tbl_booking WHERE booking_date BETWEEN '$start_date' AND '$end_date'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $total_result = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($total_result);
        echo '<tr>';
        echo '<td><strong>Total Amount</strong></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$total_result["total_payment"].'</td>';
        echo '</tr>';
        ?>
    </table>

</div>


<script src="../styles/jQuery-v3.4.1.js"></script>
<script></script>
</body>
</html>
