<?php
include 'config.php';

$sql = "SELECT * FROM recipes ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
    <link rel="stylesheet" href="style.css">
    <title>All Recipes</title>
</head>
<body>

<div class="title">
    <h1>Recipe List</h1>
</div>

<div class="maincontent">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="recipecard">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Recipe Picture">
                <div class="recipeinfo">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo mb_substr(strip_tags($row['description']), 0, 100) . '...'; ?></p>
                    <a href="recipe.php?id=<?php echo $row['id']; ?>">See the whole recipe</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="norecipes">No recipes yet.</p>
    <?php endif; ?>
    
    <div class="links">
        <a href="add_recipe.php">Add Recipe</a>
    </div>
</div>



</body>
</html>
