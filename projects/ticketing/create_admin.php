<?php
include 'config.php';

$username = 'admin';
$email = 'admin@example.com';
$password = 'admin123'; 


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$role = 'admin';

$stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Username or email already exists.";
} else {
    $stmt->close();
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Admin created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
