<?php
    include_once("../headers/header.php");
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
        <form action="pay_booking_submit.php" method="post">
            <input type="hidden" value="<?php echo $booking_id; ?>" name="booking_id">
            <table class="post_table" cellspacing="0">
                <caption><h1 class="post_title">Payment Form</h1></caption>
                <tbody align="">
                <tr>
                    <td>Payment:</td>
                    <td><strong><?php echo $row['total_price'] ?></strong></td>
                </tr>
                <tr>
                    <td>JazzCash Us:</td>
                    <td><strong>0333-000000</strong></td>
                </tr>
                <tr>
                    <td>Your Booking ID:</td>
                    <td><strong><?php echo $row['booking_id'] ?></strong></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                        After Successful Payment wait for <strong>Few Hours</strong> and after confirmation your Travel will be booked and
                        you got a notification on <a href="booking.php">This Page</a> .
                        <hr>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><br><input class="booking_button" name="submit" type="submit" value="Paid"></td>
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
