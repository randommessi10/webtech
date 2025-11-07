<?php
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h2>Welcome <?php echo $username; ?></h2>
    <form action="delete_change.php" method="get">
        <input type="text" name="t1">
        <input type="submit" name="action" value="change">
        <input type="submit" name="action" value="delete">
    </form>

</body>
</html>
