<?php include 'config.php'; // Include database connection ?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
</head>
<body>
    <h2>User's List</h2>
    <a href="create.php">New User</a> <!-- Link to add a new user -->

    <!-- Table to display all users -->
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php
        // Fetch all users from the database
        $result = $conn->query("SELECT * FROM crud");

        // Loop through each row and display in table
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <!-- Links to update or delete this user -->
                <a href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
