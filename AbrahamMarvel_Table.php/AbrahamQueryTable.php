<?php
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "student1";
$password = "pass";
$database = "baseball_01";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to query the marvel_characters table and return the result set
function queryMarvelCharacters()
{
    global $conn;
    
    // SQL query to select all heroes
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
