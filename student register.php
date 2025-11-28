<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (name, class, age, email) 
            VALUES ('$name', '$class', '$age', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Student registered successfully. <a href='dashboard.php'>Go to Dashboard</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>