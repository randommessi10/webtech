<?php
session_start();
$username = $_SESSION['username'];
$conn = mysqli_connect("localhost", "root", "", "test");

$action = $_GET['action'] ;
$newpass = $_GET['t1'] ;

if ($action == 'change' && $newpass) {
    $query = "UPDATE users SET password = '$newpass' WHERE username = '$username'";
    if (mysqli_query($conn, $query)) {
        echo "Password changed successfully";
    } else {
        echo "Error changing password: " . mysqli_error($conn);
    }
}

elseif ($action == 'delete') {
    $query = "DELETE FROM users WHERE username = '$username'";
    if (mysqli_query($conn, $query)) {
        session_unset();
        session_destroy();
        echo "Account deleted successfully";
    } else {
        echo "Error deleting account: " . mysqli_error($conn);
    }
}
?>
