<?php
session_start();
include 'db.php';

if (isset($_FILES['file'])) {
    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $user = $_SESSION['username'];

    // move file to uploads folder
    move_uploaded_file($tmp_name, "uploads/" . $filename);

    // save record in database
    $sql = "INSERT INTO uploads (user, filename) VALUES ('$user', '$filename')";
    $conn->query($sql);

    header("Location: dashboard.php");
    exit();
}
?>