<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $imagepath = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploaddir = 'images/';

        if (!is_dir($uploaddir)) {
            mkdir($uploaddir, 0755, true);
        }

        $originalname = basename($_FILES['image']['name']);
        $extension = strtolower(pathinfo($originalname, PATHINFO_EXTENSION));
        $allowedexts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($extension, $allowedexts)) {
            $newname = uniqid('img_') . '.' . $extension;
            $destination = $uploaddir . $newname;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $imagepath = $destination; // π.χ. "images/img_abc123.jpg"
            }
        }
    }

    $stmt = $conn->prepare("INSERT INTO recipes (user_id, title, image, ingredients, instructions, created_at, description) VALUES (?, ?, ?, ?, ?, NOW(), ?)");
    $user_id = $_SESSION['user_id'];
    $stmt->bind_param("isssss", $user_id, $title, $imagepath, $ingredients, $instructions, $description);
    $stmt->execute();

    header("Location: viewlist.php");
    exit;
}
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <form method="post" enctype="multipart/form-data">
            <label for="title">Recipe Title</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required></textarea>

            <label for="ingredients">Ingredients</label>
            <textarea name="ingredients" id="ingredients" rows="4"></textarea>

            <label for="instructions">Instructions</label>
            <textarea name="instructions" id="instructions" rows="4"></textarea>

            <input type="file" id="image" name="image" accept="images/*">

            <button type="submit">Add</button>
        </form>
        <a href="viewlist.php">View Recipes</a>
    </body>
</html>
