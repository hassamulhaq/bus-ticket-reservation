<?php include_once("headers/header.php"); ?>

<div align="center" style="padding: 10px">
    <?php
    if (isset($_GET['signup'])){
        echo "SignUp Success";
    } elseif (isset($_GET['signup_error'])){
        echo "SignUp Error";
    } elseif (isset($_GET['password_error'])){
        echo "Password Not Matched";
    }
    ?>
</div>


<div class="contents">
    <form action="register_submit.php" method="post" enctype="multipart/form-data">
        <table class="signup_login_table">
            <caption><h1>User Registration Form</h1></caption>
            <tr>
                <td><label>Username: </label></td>
                <td><input type="text" name="username" size="50" required=""></td>
            </tr>
            <tr>
                <td><label>Email: </label></td>
                <td><input type="email" name="email" size="50" required=""></td>
            </tr>
            <tr>
                <td><label>Phone: </label></td>
                <td><input type="text" name="phone" size="50" required=""></td>
            </tr>
            <tr>
                <td><label>Gender</label></td>
                <td>
                    <label><input type="radio" name="gender" value="male" checked> Male</label>
                    <label><input type="radio" name="gender" value="female"> Female</label>
                </td>
            </tr>
            <tr>
                <td><label>Profile Image: </label></td>
                <td>
                    <input type="file" name="myprofile" required="" accept="image/*">
                </td>
            </tr>
            <tr>
                <td><label>Password: </label></td>
                <td><input type="password" name="password" size="50" required=""></td>
            </tr>
            <tr>
                <td><label>Confirm Password: </label></td>
                <td><input type="password" name="c_password" size="50" required=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="submit_button" type="submit" name="submit" value="Register User" /></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>