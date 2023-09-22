<!-- This is a PHP script to connect to a database and populates a table -->
<!-- Author: Abraham Caban Rios -->
<!-- Module: 9 -->
<!-- Date: 9/24/2023 -->

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

// Define an array of heroes with their attributes
$heroes = [
    ['Iron Man', 40, 'Repulsor beams', 'Tony Stark', 'Human vulnerabilities'],
    ['Spider-Man', 25, 'Web-shooting', 'Peter Parker', 'Moral dilemmas'],
    ['Captain America', 100, 'Superhuman strength', 'Steve Rogers', 'Frozen in ice'],
    ['Thor', 1500, 'God-like powers', 'Thor Odinson', 'Dependence on Mjolnir'],
    ['Black Widow', 35, 'Espionage skills', 'Natasha Romanoff', 'Pasts haunting them'],
    ['Hulk', 40, 'Superhuman strength', 'Bruce Banner', 'Loses control when angry'],
    ['Black Panther', 35, 'Enhanced senses', "T'Challa", 'Vulnerable without the Heart-Shaped Herb']
];

// Define a success message
$successMessage = "Table marvel_characters populated successfully. <br>";

// Loop through each hero and insert their information into the database
foreach ($heroes as $hero) {
    // Prepare an SQL query to insert data into the 'marvel_characters' table
    $sql = "INSERT INTO marvel_characters (Hero_Name, age, Hero_Power, alias, weakness) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Update the bind_param format string to match the SQL query and bind values
    $stmt->bind_param("sisss", $hero[0], $hero[1], $hero[2], $hero[3], $hero[4]);

    // Execute the SQL statement
    if ($stmt->execute() !== TRUE) {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
}

// Display the success message
echo $successMessage;

// Close the database connection (optional, can be done later in your application)
$conn->close();

?>
