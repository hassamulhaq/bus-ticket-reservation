<?php include_once("headers/header.php"); ?>

<div align="center" style="padding: 10px">
    <?php
    if (isset($_GET['error'])){
        echo "Wrond Email or Password";
    }
    ?>
</div>


<div class="contents">
    <form action="login_check.php" method="post">
        <table class="signup_login_table">
            <caption><h1>Login Form</h1></caption>
            <tr>
                <td><label for="Email">Email: </label></td>
                <td><input type="text" name="email" size="50" required/></td>
            </tr>
            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" name="password" size="50" required/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input class="submit_button" type="submit" name="submit" value="Login" /></td>
            </tr>
        </table>
    </form>
</div>


</body>
</html>