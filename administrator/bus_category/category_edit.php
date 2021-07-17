<?php include_once("../../headers/header.php"); ?>


<?php

require_once '../../dbconnection/database.php';
    $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $category_id = $result['category_id'];
    $title = $result['title'];
?>


<div class="contents">
    <form action="category_edit_submit.php" method="post">
        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
        <table class="signup_login_table">
            <caption><h1>Category Form</h1></caption>
            <tr>
                <td><label>Category Title: </label></td>
                <td><input type="text" name="title" size="50" value="<?php echo $title; ?>" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submit_button" type="submit" name="submit" value="Update Category" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>