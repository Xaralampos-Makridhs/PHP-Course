<?php
include 'config.php';

$score = 0;
$userAnswers = $_POST['answers'] ?? [];

foreach ($userAnswers as $questionID => $userAnswer) {
    $stmt = $conn->prepare("SELECT correct_option FROM quiz WHERE id = ?");
    $stmt->bind_param("i", $questionID);
    $stmt->execute();
    $stmt->bind_result($correct);
    $stmt->fetch();
    $stmt->close();

    if ($userAnswer === $correct) {
        $score++;
    }
}

echo "<h2>Your score: $score / 30</h2>";
?>
