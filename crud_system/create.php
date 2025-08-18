<?php
include 'config.php'; // Include database connection

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];       // Get username from form
    $email = $_POST['email'];     // Get email from form
    $password = $_POST['password']; // Get password from form

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO crud (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword); // Bind variables to placeholders

    // Execute the query and check for success
    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect to user list after success
        exit;
    } else {
        echo "Error: " . $stmt->error; // Display error if insertion fails
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create a Member</title>
</head>
<body>
    <h2>Add User</h2>
    <!-- Form to collect user data -->
    <form method="post">
        <p>Name</p>
        <input type="text" name="name" required>

        <p>Email</p>
        <input type="email" name="email" required>

        <p>Password</p>
        <input type="password" name="password" required>

        <button type="submit">Save</button>
    </form>
</body>
</html>
