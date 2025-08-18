<?php
include 'config.php'; // Include database connection

$id = $_GET['id']; // Get user ID from URL

// Prepare statement to fetch user data
$stmt = $conn->prepare("SELECT * FROM crud WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); // Store user data in array

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];   // New username
    $email = $_POST['email']; // New email

    // Check if password is entered
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash new password

        // Prepare update statement with password
        $stmt = $conn->prepare("UPDATE crud SET username=?, email=?, password=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $hashedPassword, $id);
    } else {
        // Prepare update statement without changing password
        $stmt = $conn->prepare("UPDATE crud SET username=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
    }

    // Execute update query
    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect after success
        exit;
    } else {
        echo "Error: " . $stmt->error; // Display error if update fails
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <!-- Form to update user data -->
    <form method="post">
        <p>Name</p>
        <input type="text" name="name" value="<?php echo $row['username']; ?>" required>

        <p>Email</p>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <p>New Password (leave blank to keep old)</p>
        <input type="password" name="password">

        <button type="submit">Submit</button>
    </form>
</body>
</html>
