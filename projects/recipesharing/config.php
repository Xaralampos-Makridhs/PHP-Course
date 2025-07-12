<?php
session_start();

$server="localhost";
$name="root";
$password="xm180605";
$database="recipe";

$conn=new mysqli($server,$name,$password,$database);

if($conn->connect_error){
    die("Connect Error.". $conn->connect_error);
}

$users="CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$recipes="CREATE TABLE IF NOT EXISTS recipes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    image VARCHAR(255),
    ingredients TEXT,
    instructions TEXT,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$comments="CREATE TABLE IF NOT EXISTS comments(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    recipe_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (recipe_id) REFERENCES recipes(id)
)";

$conn->query($users);
$conn->query($recipes);
$conn->query($comments);
?>
