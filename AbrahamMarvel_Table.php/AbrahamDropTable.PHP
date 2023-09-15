<?php
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "student1";
$password = "pass";
$database = "baseball_01";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to drop the marvel_characters table if it exists
$sql = "DROP TABLE IF EXISTS marvel_characters";

if ($conn->query($sql) === TRUE) {
    echo "Table marvel_characters dropped successfully. <br>";
} else {
    echo "Error dropping table: " . $conn->error;
}

// Close the database connection (optional, can be done later in your application)
$conn->close();
?>
