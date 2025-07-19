<?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'] ?? 'user';

    $ticket_id = $_GET['id'] ?? null;

    if (!$ticket_id) {
        echo "Ticket ID missing";
        exit;
    }


    $stmt = $conn->prepare("SELECT * FROM ticket WHERE id = ?");
    $stmt->bind_param("i", $ticket_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();
    $stmt->close();

    if (!$ticket) {
        echo "Ticket not found.";
        exit;
    }

    if ($user_role !== 'admin' && $ticket['user_id'] != $user_id) {
        echo "Access denied.";
        exit;
    }

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $status = trim($_POST['status']);

        if (empty($title)) {
            $errors[] = "Title is required.";
        }
        if (empty($description)) {
            $errors[] = "Description is required.";
        }
        if (empty($status)) {
            $errors[] = "Status is required.";
        }

        if (empty($errors)) {
            $stmt = $conn->prepare("UPDATE ticket SET title=?, description=?, status=? WHERE id=?");
            $stmt->bind_param("sssi", $title, $description, $status, $ticket_id);
            $stmt->execute();
            $stmt->close();
            header("Location: dashboard.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Edit Ticket</title>
</head>
<body>
    <h1>Edit Ticket</h1>

    <?php if (!empty($errors)): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="post">
        <p>Title</p>
        <input type="text" name="title" value="<?php echo htmlspecialchars($ticket['title']); ?>" required>

        <p>Description</p>
        <textarea name="description" required><?php echo htmlspecialchars($ticket['description']); ?></textarea>

        <p>Status</p>
        <select name="status" required>
            <option value="open" <?php if ($ticket['status'] === 'open') echo 'selected'; ?>>Open</option>
            <option value="closed" <?php if ($ticket['status'] === 'closed') echo 'selected'; ?>>Closed</option>
        </select>

        <br><br>
        <input type="submit" value="Update Ticket">
    </form>

    <a href="index.php">Dashboard</a>
    <a href="logout.php">Logout</a>
</body>
</html>
