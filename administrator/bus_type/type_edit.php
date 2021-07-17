<?php include_once("../../headers/header.php"); ?>


<?php

require_once '../../dbconnection/database.php';
    $type_id = $_GET['type_id'];
    $sql = "SELECT * FROM tbl_type WHERE type_id = '$type_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $type_id = $result['type_id'];
    $title = $result['title'];
    $number_of_seats = $result['number_of_seats'];
?>


<div class="contents">
    <form action="type_edit_submit.php" method="post">
        <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
        <table class="normal_table">
            <caption><h1>Type Form</h1></caption>
            <tr>
                <td><label>Type Title: </label></td>
                <td><input type="text" name="title" size="50" value="<?php echo $title; ?>" required=""></td>
            </tr>
            <tr>
                <td><label>Number Of Seats: </label></td>
                <td><input type="text" name="number_of_seats" size="50" value="<?php echo $number_of_seats; ?>" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submit_button" type="submit" name="submit" value="Update Type" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>