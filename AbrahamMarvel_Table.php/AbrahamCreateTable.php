<?php
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "student1";
$password = "pass";
$database = "baseball_01";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create the marvel_characters table
$sql = "CREATE TABLE IF NOT EXISTS marvel_characters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Hero_Name VARCHAR(255) NOT NULL,
    age INT,
    Hero_Power VARCHAR(255),
    alias VARCHAR(255) NOT NULL,
    weakness VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table marvel_characters created successfully. <br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the database connection (optional, can be done later in your application)
$conn->close();
?>
