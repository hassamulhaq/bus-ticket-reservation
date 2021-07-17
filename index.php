<?php
    include_once("headers/header.php");
    if (isset($_GET['login_required'])) {
        echo '<h1 align="center">Please Login For Book Your Ticket</h1>';
    }
?>

<div class="index_page">
    <div class="post_body">


        <!-- Search Form -->
        <div class="">
            <form action="search_by_source_location_etc.php" method="get">
                <table class="normal_table" cellspacing="0">
                    <tr>
                        <td colspan="10"><strong>Search By City, Source and Location</strong></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="source" placeholder="Source"></td>
                        <td><input type="text" name="destination" placeholder="Destination"></td>
                        <td><input type="text" name="other" placeholder="Price, Days, Night stc"></td>
                        <td><input type="submit" value="Search"></td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- Search Form -->



        <?php
            require_once 'dbconnection/database.php';
            $sql = "SELECT * FROM tbl_bus_post";
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
                    <div class="homepage_post">
                        <table border="0" class="index_page" cellspacing="0">
                            <tr>
                                <td><h1 class="post_title"><?php echo $row['title']; ?> </h1></td>
                                <td colspan="3" align="right"><h3 style=" color: red;">Rs/=<?php echo $row['per_price']; ?></h3></td>
                            </tr>
                            <tr>
                                <td rowspan="6" colspan=""><img style="width: 300px" src="administrator/bus_post/<?php echo $row['bus_image']; ?>" alt=""></td>
                            </tr>
                            <tr>
                                <td>
                                    <small>
                                        <u><?php echo $row['days']; ?> days:</u>
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
                            <tr>
                                <td><strong>Days</strong> <?php echo $row['days']; ?></td>
                                <td><strong>Nights</strong> <?php echo  $row['nights']; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center">
                                    <form action="book_ticket/index.php" method="get">
                                        <input type="hidden" name="bus_post_id" value="<?php echo $row["bus_post_id"] ?>">
                                        <input class="book_submit_button" type="submit" value="View Details and Book Ticket">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
            <?php } ?>
    </div>

    <div class="sidebar">
        <form action="login_check.php" method="post">
            <table class="signup_login_table">
                <caption><h1>Login Form</h1></caption>
                <tr>
                    <td>
                        <label for="Email">Email: </label>
                        <input type="text" name="email" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password: </label>
                        <input type="password" name="password" required/>
                    </td>
                </tr>
                <tr>
                    <td><input class="submit_button" type="submit" name="submit" value="Login" /></td>
                </tr>
            </table>
        </form>
        <hr>
    </div>
</div>

</body>
</html>