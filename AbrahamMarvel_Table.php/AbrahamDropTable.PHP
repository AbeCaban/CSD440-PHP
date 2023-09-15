<!-- This is a PHP script to connect to a database and drops a table -->

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

// SQL query to drop the 'marvel_characters' table if it exists
$sql = "DROP TABLE IF EXISTS marvel_characters";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Table marvel_characters dropped successfully. <br>"; // If the query was successful, display a success message
} else {
    echo "Error dropping table: " . $conn->error; // If there was an error in executing the query, display the error message
}

// Close the database connection (optional, can be done later in your application)
$conn->close();

?>
