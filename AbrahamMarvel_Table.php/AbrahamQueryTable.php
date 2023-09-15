<!-- Author: Abraham Caban Rios 
This code sets up a database connection and provides a function to query and retrieve data from the 'marvel_characters' table in the database.-->
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

// Function to query the 'marvel_characters' table and return the result set
function queryMarvelCharacters()
{
    global $conn;
    
    // SQL query to select all heroes from the 'marvel_characters' table
    $sql = "SELECT * FROM marvel_characters";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $heroes = [];
        while ($row = $result->fetch_assoc()) {
            $heroes[] = $row;
        }
        return $heroes;
    } else {
        return [];
    }
}

// Close the database connection (optional, can be done later in your application)
$conn->close();
?>
