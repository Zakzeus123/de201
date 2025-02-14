<?php
// db_connection.php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "";     // Default password for XAMPP
$dbname = "db_stage"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
