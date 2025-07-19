<?php
include 'config.php';

$result = $conn->query("SELECT * FROM quiz LIMIT 30");
$questions = $result->fetch_all(MYSQLI_ASSOC);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Drive</title>
</head>
<body>
    <h1>Test Drive</h1>

    <form action="submit.php" method="post">
        <?php foreach ($questions as $index => $q): ?>
            <p>Question <?php echo $index + 1; ?>: <strong><?php echo htmlspecialchars($q['question']); ?></strong></p>

            <label><input type="radio" name="answers[<?php echo $q['id']; ?>]" value="a"> <?php echo htmlspecialchars($q['option_a']); ?></label><br>
            <label><input type="radio" name="answers[<?php echo $q['id']; ?>]" value="b"> <?php echo htmlspecialchars($q['option_b']); ?></label><br>
            <label><input type="radio" name="answers[<?php echo $q['id']; ?>]" value="c"> <?php echo htmlspecialchars($q['option_c']); ?></label><br><br>
        <?php endforeach; ?>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
