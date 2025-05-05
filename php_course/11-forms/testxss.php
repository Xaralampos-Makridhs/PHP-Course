<!DOCTYPE html>
<html>
<body>

<form method="POST" action="">
   <p>Name: <input type="text" name="name"></p>
   <p>Email: <input type="email" name="email"></p>
   <p>Website: <input type="text" name="website"></p>
   <p>Comment: <textarea name="comment" rows="5" cols="40"></textarea></p> 
   <p><input type="radio" name="gender" value="male">Male</p>
   <p><input type="radio" name="gender" value="female">Female</p>
   <p><input type="submit" value="Submit"></p>
</form>

<?php
$name = $email = $website = $comment = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST["name"]);
    $email = sanitize_input($_POST["email"]);
    $website = sanitize_input($_POST["website"]);
    $comment = sanitize_input($_POST["comment"]);
    $gender = isset($_POST["gender"]) ? sanitize_input($_POST["gender"]) : "";


    echo "<h2>Your inputs:</h2>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Website: $website<br>";
    echo "Comments: $comment<br>";
    echo "Gender: $gender<br>";
}



function sanitize_input($data) {
    if (!is_string($data)) {
        $data = "";
    }
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

</body>
</html>
