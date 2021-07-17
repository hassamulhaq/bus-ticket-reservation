<?php
    include_once("../../headers/header.php");
    require_once '../../dbconnection/database.php';
?>


<?php
    $bus_post_id = $_GET['bus_post_id'];
    $sql = "SELECT * FROM tbl_bus_post WHERE bus_post_id = '$bus_post_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $bus_post_id = $result['bus_post_id'];
    $category_id = $result['category_id'];
    $type_id = $result['type_id'];
    $title = $result['title'];
    $bus_image = $result['bus_image'];
    $details = $result['details'];
    $source = $result['source'];
    $destination = $result['destination'];
    $days = $result['days'];
    $nights = $result['nights'];
    $inclusions = $result['inclusions'];
    $exclusions = $result['exclusions'];
    $per_price = $result['per_price'];
    $post_date = $result['post_date'];
?>




<div align="center" style="padding: 0">
    <?php
    if (isset($_GET['success'])){
        echo "Post Added";
    } elseif (isset($_GET['error'])){
        echo "Pos Not Added";
    } elseif (isset($_GET['invalid_extention'])){
        echo "Choose Image File.";
    }
    ?>
</div>


<div class="contents">
    <form action="post_edit_submit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $bus_post_id; ?>" name="bus_post_id">
        <table class="normal_table_borderless">
            <caption><h2>New Post</h2></caption>
            <tr>
                <td><label>Title: </label></td>
                <td><input type="text" name="title" size="50" required="" value="<?php echo $title; ?>"></td>
            </tr>
            <tr>
                <td><label>Category: </label></td>
                <td>
                    <select name="category_id" required>
                        <option value="">Choose</option>
                        <?php
                        $sql_category = "SELECT * FROM tbl_category";
                        $stmt = $conn->prepare($sql_category);
                        $stmt->execute();
                        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="'.$result["category_id"].'">'.$result["title"].'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Type: </label></td>
                <td>
                    <select name="type_id" required="">
                        <option value="">Choose</option>
                        <?php
                        $sql_type = "SELECT * FROM tbl_type";
                        $stmt = $conn->prepare($sql_type);
                        $stmt->execute();
                        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="'.$result["type_id"].'">'.$result["title"].'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Image: </label></td>
                <td><input type="file" name="bus_image" size="50" required=""></td>
            </tr>
            <tr>
                <td><label>Details: </label></td>
                <td><textarea cols="50" rows="10" name="details" size="50" required=""><?php echo $details; ?></textarea></td>
            </tr>
            <tr>
                <td><label>Source: </label></td>
                <td><input type="text" name="source" size="50" required="" value="<?php echo $source; ?>"></td>
            </tr>
            <tr>
                <td><label>Destination: </label></td>
                <td><input type="text" name="destination" size="50" required="" value="<?php echo $destination; ?>"></td>
            </tr>
            <tr>
                <td><label>Days: </label></td>
                <td><input type="text" name="days" size="50" required="" value="<?php echo $days; ?>"></td>
            </tr>
            <tr>
                <td><label>Nights: </label></td>
                <td><input type="text" name="nights" size="50" required="" value="<?php echo $nights; ?>"></td>
            </tr>
            <tr>
                <td><label>Inclusions: </label></td>
                <td><textarea cols="50" rows="5" name="inclusions" size="50" required=""><?php echo $inclusions; ?></textarea></td>
            </tr>
            <tr>
                <td><label>Exclusions: </label></td>
                <td><textarea cols="50" rows="5" name="exclusions" size="50" required=""><?php echo $exclusions; ?></textarea></td>
            </tr>
            <tr>
                <td><label><strong>Price</strong></label></td>
                <td><input type="number" name="per_price" size="50" value="<?php echo $per_price; ?>" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submit_button" type="submit" name="submit" value="Submit Post" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>