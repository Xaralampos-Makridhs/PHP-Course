<?php
include 'config.php'; // Include database connection

$id = $_GET['id']; // Get user ID from URL

// Prepare statement to delete user
$stmt = $conn->prepare("DELETE FROM crud WHERE id=?");
$stmt->bind_param("i", $id);

// Execute query and check
if ($stmt->execute()) {
    header("Location: index.php"); // Redirect after deletion
    exit;
} else {
    echo "Error: " . $stmt->error; // Display error if deletion fails
}
?>
