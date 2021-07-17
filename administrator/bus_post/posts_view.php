<?php include_once "../../headers/header.php" ?>


<div class="contents">
    <!-- Response -->
    <div align="center">
        <?php
        if (isset($_GET['updated'])) {
            echo "Updated Successfully.";
        }
        elseif (isset($_GET['not_updated'])) {
            echo "Not Updated.";
        }
        elseif (isset($_GET['invalid_extention'])) {
            echo "Choose Image File";
        }
        elseif (isset($_GET['error_db'])) {
            echo "Database Error.";
        }
        elseif (isset($_GET['deleted'])) {
            echo "Category Deleted.";
        }
        elseif (isset($_GET['delete_error'])) {
            echo "Category Not Deleted.";
        }
        ?>
        <hr>
    </div>
    <!-- /Response -->


    <div style="overflow: auto">
        <h2>Manage Bus Posts </h2>
        <a class="normal_button" href="post_add.php">Add New Post</a>
        <br>
        <br>
        <table class="normal_table" cellpadding="10" cellspacing="0" width="100%">
            <thead>
            <tr style="background: aqua;">
                <th> Bus_post_id </th>
                <th> Category </th>
                <th> Type </th>
                <th> Title </th>
                <th> Image </th>
                <!-- <th> Details </th> -->
                <th> Source </th>
                <th> Destination </th>
                <th> Days </th>
                <th> Nights </th>
                <th> Inclusions </th>
                <th> Exclusions </th>
                <th> Price </th>
                <th> Post_date </th>
                <th> Edit </th>
                <th> Delete </th>
            </tr>
            </thead>
            <tbody align="center">
            <?php

            require_once '../../dbconnection/database.php';
            $sql = "SELECT * FROM tbl_bus_post";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>'.$row["bus_post_id"].'</td>';

                    //echo '<td>'.$row["category_id"].'</td>';
                    $category_id = $row["category_id"];
                    $sql_category = "SELECT * FROM tbl_category WHERE category_id='$category_id'";
                    $stmt_category = $conn->prepare($sql_category);
                    $stmt_category->execute();
                    $result_category = $stmt_category->fetch(PDO::FETCH_ASSOC);
                    //print_r($result_category);
                    echo '<td>'.$result_category["title"].'</td>';



                    //echo '<td>'.$row["type_id"].'</td>';
                    $type_id = $row["type_id"];
                    $stmt_sql = "SELECT * FROM tbl_type WHERE type_id='$type_id'";
                    $stmt_type = $conn->prepare($stmt_sql);
                    $stmt_type->execute();
                    $result_type = $stmt_type->fetch(PDO::FETCH_ASSOC);
                    //print_r($result_category);
                    echo '<td>'.$result_type["title"].'</td>';




                    echo '<td>'.$row["title"].'</td>';
                    echo '<td><img height="80" src="'.$row["bus_image"].'"></td>';
                    //echo '<td>'.$row["details"].'</td>';
                    echo '<td>'.$row["source"].'</td>';
                    echo '<td>'.$row["destination"].'</td>';
                    echo '<td>'.$row["days"].'</td>';
                    echo '<td>'.$row["nights"].'</td>';
                    echo '<td>'.$row["inclusions"].'</td>';
                    echo '<td>'.$row["exclusions"].'</td>';
                    echo '<td>'.$row["per_price"].'</td>';
                    echo '<td>'.$row["post_date"].'</td>';
                    echo '<td><a class="edit_button" href="post_edit.php?bus_post_id='.$row["bus_post_id"].'">Edit</a></td>';
                    echo '<td><a class="delete_button" href="post_delete.php?bus_post_id='.$row["bus_post_id"].'">Delete</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td>No User Found</td>';
                echo '</tr>';
            }

            $stmt = null;
            ?>
            </tbody>
        </table>
    </div>
</div>



</body>
</html>