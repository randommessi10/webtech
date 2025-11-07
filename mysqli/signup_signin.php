<?php

session_start();

$user= $_GET['t1'];
$pass= $_GET['t2'];
$s = $_GET['submit'];

$conn = mysqli_connect("localhost","root","","test");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    echo "Connection successful";
    echo "<br>";
}

if ($s == "signin") {
    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";   
    $result = mysqli_query($conn, $query);
    if ($result -> num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user;
        header("Location: ./profile.php");
        exit();
    } 
    else {
        echo "Invalid username or password";
    }
}

if ($s == "signup") {
    $query = "SELECT * FROM users WHERE username = '$user'";
    $result = mysqli_query($conn, $query);
    if ($result -> num_rows > 0) {
        echo "User already exists";
    }
    else {
        $query = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "User created successfully";
            echo "<a href='./index.html'> Back to login </a>";
        }
        else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>