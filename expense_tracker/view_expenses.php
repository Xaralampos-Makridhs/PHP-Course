<?php
include 'config.php';

$sql = "SELECT * FROM expenses ORDER BY expense_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['title'] . '</td>
                <td>' . $row['category'] . '</td>
                <td>' . $row['amount'] . ' €</td>
                <td>' . $row['expense_date'] . '</td>
                <td>
                    <a class="delete-btn" href="delete_expenses.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure?\')">
                        <i class="ri-delete-bin-line"></i>
                    </a>
                </td>
            </tr>';
    }
} else {
    echo '<tr><td colspan="5">No expenses recorded</td></tr>';
}
?>
