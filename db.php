


<?php
$host = "YOUR_DB_HOST";
$user = "YOUR_DB_USER";
$pass = "YOUR_DB_PASSWORD";
$name = "school_db";

$conn = new mysqli($host, $user, $pass, $name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// Database connection settings
$host = "localhost";   // or your Render DB host later
$user = "root";        // database username
$pass = "";            // database password
$dbname = "school_db"; // database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>