<?php
// Database credentials
$server = 'localhost';
$username = 'root';
$password = ''; //Enter your own password
$database = 'crud';

// Create a new MySQLi connection
$conn = new mysqli($server, $username, $password, $database);

// Check if connection was successful
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// SQL query to create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS crud(
    id INT AUTO_INCREMENT PRIMARY KEY,  // Primary key, auto-increments for each new user
    username VARCHAR(255) NOT NULL UNIQUE, // Username must be unique
    email VARCHAR(255) NOT NULL UNIQUE,    // Email must be unique
    password VARCHAR(255) NOT NULL         // Password column
)";

// Execute the query and check for errors
if (!$conn->query($sql)) {
    die('Error creating table: ' . $conn->error);
}
?>
