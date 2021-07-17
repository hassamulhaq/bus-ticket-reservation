<?php include_once "../headers/header.php" ?>


    <div class="contents">
        <!-- Response -->
        <div align="center">
            <?php
            if (isset($_GET['updated'])) {
                echo "Updated Successfully.";
            } elseif (isset($_GET['password_error'])) {
                echo "Password and Confirm Password are not same.";
            } elseif (isset($_GET['error_db'])) {
                echo "Database Error.";
            } elseif (isset($_GET['invalid_extention'])) {
                echo "PNG and JPG images are allowed.";
            } elseif (isset($_GET['deleted'])) {
                echo "User Deleted.";
            } elseif (isset($_GET['delete_error'])) {
                echo "User Not Deleted.";
            }
            ?>
            <hr>
        </div>
        <!-- /Response -->


        <div>
            <h2>Manage Users</h2>
            <table class="view_users_table" cellpadding="10" cellspacing="0" width="100%">
                <thead>
                <tr style="background: aqua;">
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody align="center">
                <?php

                require_once '../dbconnection/database.php';
                $sql = "SELECT * FROM tbl_user WHERE role='user' OR role='frontdesk' ORDER BY user_id DESC ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        echo '<td>'.$row["user_id"].'</td>';
                        echo '<td><img height="50" src="../'.$row["image"].'"></td>';
                        echo '<td>'.$row["username"].'</td>';
                        echo '<td>'.$row["email"].'</td>';
                        echo '<td>'.$row["phone"].'</td>';
                        echo '<td>'.$row["gender"].'</td>';
                        echo '<td>'.$row["role"].'</td>';
                        echo '<td><a class="edit_button" href="user_edit.php?user_id='.$row["user_id"].'">Edit</a></td>';
                        echo '<td><a class="delete_button" href="user_delete.php?user_id='.$row["user_id"].'">Delete</a></td>';
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