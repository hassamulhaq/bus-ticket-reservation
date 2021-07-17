<?php include_once("../../headers/header.php"); ?>

<div align="center" style="padding: 10px">
    <?php
    if (isset($_GET['success'])){
        echo "Category Added";
    } elseif (isset($_GET['error'])){
        echo "Category Not Added";
    }
    ?>
</div>


<div class="contents">
    <form action="type_submit.php" method="post" enctype="multipart/form-data">
        <table class="normal_table">
            <caption><h1>Type Form</h1></caption>
            <tr>
                <td><label>Type Title: </label></td>
                <td><input type="text" name="title" size="50" required=""></td>
            </tr>
            <tr>
                <td><label>Number of Seats: </label></td>
                <td><input type="text" name="number_of_seats" size="50" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submit_button" type="submit" name="submit" value="Add Type" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>