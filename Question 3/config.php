<?php
// Database configuration
$host = "localhost";
$user = "root";       // replace with your DB username
$password = "";       // replace with your DB password
$database = "guru_db";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
