<?php
include 'config.php';



if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


if (isset($_GET['id'])) {
    $topic_id = (int)$_GET['id'];
} else {
    die("No topic.");
}


$stmt = $conn->prepare("SELECT t.title, u.username FROM topics t LEFT JOIN users u ON t.user_id = u.id WHERE t.id = ?");
$stmt->bind_param("i", $topic_id);
$stmt->execute();
$stmt->bind_result($title, $author);
$stmt->fetch();
$stmt->close();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['content'])) {
    $content = trim($_POST['content']);
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO posts (topic_id, content, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $topic_id, $content, $user_id);
    $stmt->execute();
    header("Location: topic.php?id=" . $topic_id);
    exit;
}


$result = $conn->prepare("SELECT p.*, u.username FROM posts p LEFT JOIN users u ON p.user_id = u.id WHERE p.topic_id = ? ORDER BY p.created_at DESC");
$result->bind_param("i", $topic_id);
$result->execute();
$posts = $result->get_result();
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
        <h2>Topic: <?= htmlspecialchars($title) ?></h2>
    <p>Author: <?= htmlspecialchars($author) ?></p>

    <h3>Answers</h3>
    <?php while ($row = $posts->fetch_assoc()): ?>
        <div class="posts">
            <p>
                <strong><?= htmlspecialchars($row['username']) ?></strong>
                - <?= $row['created_at'] ?>
            </p>
            <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>

            
            <?php if ($_SESSION['user_id'] == $row['user_id']): ?>
                <form method="post" action="delete_post.php" style="display:inline;">
                    <input type="hidden" name="post_id" value="<?= $row['id'] ?>">
                    <button type="submit">Delete</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>

    <h3>Write your answer:</h3>
    <form method="post">
        <textarea name="content" rows="5" placeholder="Type here..." required></textarea>
        <button type="submit">Post</button>
    </form>

    <p><a style="color: #0a0b5c;" href="index.php">Topics</a></p>

<a href="login.php">Logout</a>

</div>


</body>
</html>
