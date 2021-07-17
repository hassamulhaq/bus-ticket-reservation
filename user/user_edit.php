<?php
include "../headers/header.php";
?>


<?php

require_once '../dbconnection/database.php';
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $result['user_id'];
$username = $result['username'];
$email = $result['email'];
$phone = $result['phone'];
$password = $result['password'];
$gender = $result['gender'];
$image = $result['image'];
?>

<div class="contents">
    <form action="update_user_submit.php" method="post" enctype="multipart/form-data" class="profile_form">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <table class="signup_login_table">
            <caption><h1>Update Profile</h1></caption>
            <tr>
                <td><label>Current Image</label></td>
                <td>
                    <img src="<?php echo '../'.$image; ?>" alt="<?php echo $image; ?>" name="old_image" height="120">
                </td>
            </tr>
            <tr>
                <td><label>Username: </label></td>
                <td><input type="text" name="username" size="50" value="<?php echo $username; ?>" required=""></td>
            </tr>
            <tr>
                <td><label>Email: </label></td>
                <td><input type="email" name="email" size="50" value="<?php echo $email; ?>" required=""></td>
            </tr>
            <tr>
                <td><label>Phone: </label></td>
                <td><input type="text" name="phone" size="50" value="<?php echo $phone; ?>" required=""></td>
            </tr>
            <tr>
                <td><label>Gender</label></td>
                <td>
                    <label><input type="radio" name="gender" value="male" required> Male</label>
                    <label><input type="radio" name="gender" value="female"> Female</label>
                </td>
            </tr>
            <tr>
                <td><label>Profile Image: </label></td>
                <td>
                    <input type="file" name="myprofile" required="" size="50" accept="image/*">
                </td>
            </tr>
            <tr>
                <td><label>Password: </label></td>
                <td><input type="password" name="password" value="<?php echo $password; ?>" size="50" required=""></td>
            </tr>
            <tr>
                <td><label>Confirm Password: </label></td>
                <td><input type="password" name="c_password" size="50" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submit_button" type="submit" name="submit" value="Update" /></td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>