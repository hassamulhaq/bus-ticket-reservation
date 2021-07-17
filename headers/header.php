<?php
    session_start();
    include_once 'project_path.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Reservation</title>
    <link rel="stylesheet" href="<?php echo $project_path ?>/styles/styles.css" type="text/css">
</head>
<body>
<header>
    <h3><a class="home" href="<?php echo $project_path; ?>">Bus Ticket Reservation System</a></h3>
</header>
<?php
    if (isset($_SESSION['user_session'])) {
        if ($_SESSION['user_session']['role'] === 'admin') {
            echo '<nav>';
            echo '<a href="'.$project_path.'/administrator/bus_post/posts_view.php">Bus Post</a>';
            echo '<a href="'.$project_path.'/administrator/bus_category/categories_view.php">Bus Categories</a>';
            echo '<a href="'.$project_path.'/administrator/bus_type/types_view.php">Bus Types</a>';
            echo '<a href="'.$project_path.'/user/view_users.php">View Users</a>';
            echo '<a href="'.$project_path.'/booking/booking.php">View Booking</a>';
            echo '<a href="'.$project_path.'/report/report.php">Reports</a>';
            echo '<a class="logout_button" href="'.$project_path.'/logout.php"logout.php">Logout</a>';
            echo '<a class="profile_button" href="'.$project_path.'/profile.php">Profile</a>';
            echo '</nav>';
        }
        elseif ($_SESSION['user_session']['role'] === 'frontdesk') {
            echo '<nav>';
            echo '<a href="'.$project_path.'/user/view_users.php">View Users</a>';
            echo '<a href="'.$project_path.'/booking/booking.php">View Booking</a>';
            echo '<a class="logout_button" href="'.$project_path.'/logout.php"logout.php">Logout</a>';
            echo '<a class="profile_button" href="'.$project_path.'/profile.php">Profile</a>';
            echo '</nav>';
        }
        elseif ($_SESSION['user_session']['role'] === 'user') {
            echo '<nav>';
            echo '<a href="'.$project_path.'/booking/booking.php">View Booking</a>';
            echo '<a class="logout_button" href="'.$project_path.'/logout.php">Logout</a>';
            echo '<a class="profile_button" href="'.$project_path.'/profile.php">Profile</a>';
            echo '</nav>';
        }
    }
    else {
        echo '<nav>';
        echo '<a class="" href="'.$project_path.'/register.php">Register</a>';
        echo '<a class="" href="'.$project_path.'/login.php">Login</a>';
        echo '</nav>';
    }
?>