<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM expenses WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Σφάλμα: " . $stmt->error;
}

$stmt->close();
?>
