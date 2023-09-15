<!-- This is a PHP script to connect to a database and creates a table -->
<!-- Author: Abraham Caban Rios -->
<!-- Module: 8 -->
<!-- Date: 9/15/2023 -->

<?php

// Database connection parameters
$servername = "localhost"; // The location of your database server
$username = "student1";   // Your username to access the database
$password = "pass";       // Your password to access the database
$database = "baseball_01"; // The name of the database you want to work with

// Creating a new database connection using mysqli
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection to the database was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If there's an error, display it and stop the script
}

// SQL query to create the 'marvel_characters' table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS marvel_characters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Hero_Name VARCHAR(255) NOT NULL,
    age INT,
    Hero_Power VARCHAR(255),
    alias VARCHAR(255) NOT NULL,
    weakness VARCHAR(255)
)";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Table marvel_characters created successfully. <br>"; // If the query was successful, display a success message
} else {
    echo "Error creating table: " . $conn->error; // If there was an error in executing the query, display the error message
}

// Close the database connection (optional, can be done later in your application)
$conn->close();

?>
