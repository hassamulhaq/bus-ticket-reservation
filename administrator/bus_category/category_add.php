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
    <form action="category_submit.php" method="post" enctype="multipart/form-data">
        <table class="signup_login_table">
            <caption><h1>Category Form</h1></caption>
            <tr>
                <td><label>Category Title: </label></td>
                <td><input type="text" name="title" size="50" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submit_button" type="submit" name="submit" value="Add Category" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>