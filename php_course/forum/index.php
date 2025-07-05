<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
    $title = trim($_POST['title']);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO topics (title, user_id) VALUES (?, ?)");
    $stmt->bind_param("si", $title, $user_id); 
    $stmt->execute();
    header("Location: index.php");
    exit;
}


$result = $conn->query("
    SELECT t.*, u.username 
    FROM topics t 
    LEFT JOIN users u ON t.user_id = u.id 
    ORDER BY t.created_at DESC
");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Topics</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h2 class="indexh2">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>

    <form method="post"  class="inedxform">
        <input type="text" name="title" placeholder="New topic" required>
        <button type="submit" class="regbutton">Create</button>
    </form>

    <h3 class="indexh3">Topic List</h3>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <a href="topic.php?id=<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['title']) ?> 
                    (<?= $row['created_at'] ?> από <?= htmlspecialchars($row['username']) ?>)
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
    <a href="login.php">Logout</a>

</body>
</html>
