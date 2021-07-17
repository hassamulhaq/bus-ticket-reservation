<?php
    include_once("../headers/header.php");
    if (!isset($_SESSION['user_session'])) {
        header('location:../index.php?login_required');
    }
?>

<div class="booking_page">

    <div class="booking_body">
        <?php
        $bus_post_id = $_GET['bus_post_id'];
        require_once '../dbconnection/database.php';
        $sql = "SELECT * FROM tbl_bus_post WHERE bus_post_id='$bus_post_id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php
                $category_id = $row["category_id"];
                $sql_category = "SELECT * FROM tbl_category WHERE category_id='$category_id'";
                $stmt_category = $conn->prepare($sql_category);
                $stmt_category->execute();
                $result_category = $stmt_category->fetch(PDO::FETCH_ASSOC);
                ?>
                <?php
                $type_id = $row["type_id"];
                $stmt_sql = "SELECT * FROM tbl_type WHERE type_id='$type_id'";
                $stmt_type = $conn->prepare($stmt_sql);
                $stmt_type->execute();
                $result_type = $stmt_type->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="">
                    <div class="post_title">
                        <h1 class="post_title" style="float: left;"><?php echo $row['title']; ?></h1>
                    </div>

                    <table border="0" class="post_table" cellspacing="0">
                        <tr>
                            <td>
                                <small>
                                    <?php echo $row['source']; ?>
                                    - To -
                                    <?php echo $row['destination']; ?>
                                </small>
                            </td>
                            <td width="100"><strong>Bus Type:</strong></td>
                            <td><?php echo $result_type['title']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Bus Category:</strong> <?php echo $result_category['title']; ?></td>
                            <td><strong>Total Seats:</strong></td>
                            <td><?php echo $result_type['number_of_seats']; ?></td>
                        </tr>
                    </table>

                    <table border="0" class="post_table" cellspacing="0">
                        <tr>
                            <td colspan="2"><img style="width: 300px" src="../administrator/bus_post/<?php echo $row['bus_image']; ?>" alt=""></td>
                            <td><h2>Rs/=<?php echo $row['per_price']; ?></h2></td>
                        </tr>
                    </table>

                    <table border="0" class="post_table" cellspacing="0" cellpadding="2">
                        <tr>
                            <td><strong>Source:</strong> <?php echo $row['source']; ?></td>
                            <td><strong>Destination:</strong> <?php echo  $row['destination']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Days: </strong><?php echo $row['days']; ?></td>
                            <td><strong>Nights:</strong> <?php echo  $row['nights']; ?></td>
                        </tr>
                    </table>

                    <table border="0" class="post_table" cellspacing="0" cellpadding="2">
                        <tr>
                            <td><strong>inclusions</strong></td>
                            <td><strong>exclusions</strong></td>
                        </tr>
                        <tr>
                            <td><?php echo $row['inclusions']; ?></td>
                            <td><?php echo  $row['exclusions']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Details: </strong><?php echo $row['details']; ?></td>
                        </tr>
                    </table>
                </div>
    </div>
    <div class="booking_sidebar">
        <form action="ticket_submit.php" method="post">
            <input type="hidden" name="bus_post_id" value="<?php echo $row["bus_post_id"] ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_session']['user_id'] ?>">
            <table class="post_table" cellspacing="0">
                <caption><h1 class="post_title">Book Now</h1></caption>
                <tbody align="right">
                <tr>
                    <td><label>Customer Name</label></td>
                    <td><input type="text" readonly="" value="<?php echo $_SESSION['user_session']['username'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="text" readonly="" value="<?php echo $_SESSION['user_session']['email'] ?>"></td>
                </tr>
                <tr>
                    <td><label>Customer Phone</label></td>
                    <td><input type="text" readonly="" value="<?php echo $_SESSION['user_session']['phone'] ?>"></td>
                </tr>
                <tr>
                    <td>Per Person Price</td>
                    <td><input type="number" id="per_price" readonly="" value="<?php echo $row['per_price']; ?>" name="per_price"></td>
                </tr>
                <tr>
                    <td>Number of Person</td>
                    <td><input type="number" id="person" onchange="total_price_calculation(this.value);" onkeyup="total_price_calculation(this.value);" name="person" min="1" value="1"></td>
                </tr>

                <tr>
                    <td>Total Price</td>
                    <td><input type="text" readonly id="total_price" value="<?php echo $row['per_price']; ?>" name="total_price"></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="tour_date" required></td>
                </tr>
                <tr>
                    <td>Payment</td>
                    <td align="left">
                        <label><input type="radio" name="payment_type" value="online" required="">Online</label>
                        <label><input type="radio" name="payment_type" value="Pay Before Departure Time">Pay Before Departure Time</label>
                    </td>
                </tr>
                <tr>
                    <td>Booking</td>
                    <td><input class="booking_button" name="submit" type="submit" value="Book Now"></td>
                </tr>
                </tbody>
            </table>
        </form>
        <hr>
    </div>
    <?php } ?>
    <?php } ?>
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