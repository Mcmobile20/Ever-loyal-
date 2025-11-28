<?php
session_start();
include 'db.php'; // connect to database

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Query database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login success
    $_SESSION['username'] = $username;
    header("Location: dashboard.html"); // redirect to dashboard
    exit();
} else {
    // Login failed
    header("Location: login.html?error=Invalid username or password");
    exit();
}
?>