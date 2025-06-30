<?php
require 'config.php';

$usernameError = $emailError = $successMessage = "";
$submittedUsername = $submittedEmail = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedUsername = trim($_POST['username']);
    $submittedEmail    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $submittedUsername);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $usernameError = "Name is already used!";
    }


    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $submittedEmail);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $emailError = "Email already used";
    }


    if (empty($usernameError) && empty($emailError)) {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $submittedUsername, $submittedEmail, $password);
        if ($stmt->execute()) {
            $successMessage = "Successfully Registered! <a href='login.php'>Log In</a>";
        } else {
            $successMessage = "Error: " . $stmt->error;
        }
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <form method="post">
            <p>Username</p>
            <input type="text" name="username" value="<?php echo htmlspecialchars($submittedUsername); ?>" required>
            <?php if (!empty($usernameError)) echo "<p class='error'>$usernameError</p>"; ?>

            <p>Email</p>
            <input type="email" name="email" value="<?php echo htmlspecialchars($submittedEmail); ?>" required>
            <?php if (!empty($emailError)) echo "<p class='error'>$emailError</p>"; ?>

            <p>Password</p>
            <input type="password" name="password" required>

            <button type="submit" class="btn">
                <p>Register</p>
                <i class="ri-login-circle-line"></i>
            </button>
        </form>

        <?php if (!empty($successMessage)): ?>
            <div class="success-message">
                <p><?php echo $successMessage; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
