<?php
session_start();

if (isset($_SESSION['user_session'])) {
    unset($_SESSION['user_session']);
    session_destroy();
    header("Location: index.php");
}

exit;


