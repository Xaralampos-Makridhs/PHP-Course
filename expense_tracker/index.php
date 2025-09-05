<?php include 'config.php'; ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Expense Tracker</title>
        <!--Style-->
        <link rel="stylesheet" href="style.css">
        <!--Remix Icons-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    <body>
        <h1>Expense Recording</h1>

        <form action="add_expense.php" method="POST">
            
            <input type="text" name="title" placeholder="Title" required>

            <input type="text" name="category" placeholder="Category" required>

            <input type="number" step="0.01" name="amount" placeholder="(€)" required>

            <input type="date" name="expense_date" required>

            <button type="submit">Add</button>
        </form>

        <h2>Expense List</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php include 'view_expenses.php'; ?>
        </table>
    </body>
</html>