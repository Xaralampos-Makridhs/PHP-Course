<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = $conn->prepare("SELECT * FROM recipes WHERE id=?");
    $sql->bind_param("i", $id);
    $sql->execute();

    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Recipe not found</p>";
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($row['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1><?php echo htmlspecialchars($row['title']); ?></h1>
<p>Description:</p>
<p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>

<p>Ingredients:</p>
<p><?php echo nl2br(htmlspecialchars($row['ingredients'])); ?></p>

<p>Instructions:</p>
<p><?php echo nl2br(htmlspecialchars($row['instructions'])); ?></p>

<?php if (!empty($row['image'])): ?>
    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Recipe Image">
<?php endif; ?>

</body>
</html>
