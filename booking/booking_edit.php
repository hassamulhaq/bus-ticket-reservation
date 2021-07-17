<?php
include_once("../headers/header.php");
if (isset($_GET['login_required'])) {
    echo '<h1 align="center">Please Login For Book Your Ticket</h1>';
}
?>


        <?php
            require_once '../dbconnection/database.php';
            $booking_id = $_GET['booking_id'];
            $sql = "SELECT * FROM tbl_booking WHERE booking_id='$booking_id' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

            }
        ?>

    <div class="booking_sidebar" style="margin: auto; width: 500px">
        <form action="update_booking_submit.php" method="post">
            <input type="hidden" name="booking_id" value="<?php echo $row["booking_id"] ?>">
            <table class="post_table" cellspacing="0">
                <caption><h1 class="post_title">Reschedule Date</h1></caption>
                <tbody align="right">
                <tr>
                    <td>Reschedule Date</td>
                    <td><input type="date" name="tour_date" value="<?php echo $row['tour_date'] ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input class="booking_button" name="submit" type="submit" value="Reschedule"></td>
                </tr>
                </tbody>
            </table>
        </form>
        <hr>
    </div>


<script src="../styles/jQuery-v3.4.1.js"></script>
<script>

    function total_price_calculation(number) {
        var per_price = $('#per_price').val();
        var number = number;
        var total_price = $('#total_price');
        total_price.val(number * per_price);
        console.log(number);
    }

</script>
</body>
</html>