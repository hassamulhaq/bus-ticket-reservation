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
        elseif (isset($_GET['error_db'])) {
            echo "Database Error.";
        }
        elseif (isset($_GET['deleted'])) {
            echo "Type Deleted.";
        }
        elseif (isset($_GET['delete_error'])) {
            echo "Type Not Deleted.";
        }
        ?>
        <hr>
    </div>
    <!-- /Response -->


    <div>
        <h2>Manage Types </h2>
        <a class="normal_button" href="type_add.php">Add New Type</a>
        <br>
        <br>
        <table class="normal_table" cellpadding="10" cellspacing="0" width="100%">
            <thead>
            <tr style="background: aqua;">
                <th>ID</th>
                <th>Title</th>
                <th>Number Of Seats</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody align="center">
            <?php

            require_once '../../dbconnection/database.php';
            $sql = "SELECT * FROM tbl_type";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>'.$row["type_id"].'</td>';
                    echo '<td>'.$row["title"].'</td>';
                    echo '<td>'.$row["number_of_seats"].'</td>';
                    echo '<td><a class="edit_button" href="type_edit.php?type_id='.$row["type_id"].'">Edit</a></td>';
                    echo '<td><a class="delete_button" href="type_delete.php?type_id='.$row["type_id"].'">Delete</a></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td>No Type Found</td>';
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