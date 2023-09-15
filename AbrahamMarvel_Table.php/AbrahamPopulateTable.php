<?php

$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "student1";
$password = "pass";
$database = "baseball_01";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to populate the table with all heroes
$heroes = [
    ['Iron Man', 40, 'Repulsor beams', 'Tony Stark', 'Human vulnerabilities'],
    ['Spider-Man', 25, 'Web-shooting', 'Peter Parker', 'Moral dilemmas'],
    ['Captain America', 100, 'Superhuman strength', 'Steve Rogers', 'Frozen in ice'],
    ['Thor', 1500, 'God-like powers', 'Thor Odinson', 'Dependence on Mjolnir'],
    ['Black Widow', 35, 'Espionage skills', 'Natasha Romanoff', 'Pasts haunting them'],
    ['Hulk', 40, 'Superhuman strength', 'Bruce Banner', 'Loses control when angry'],
    ['Black Panther', 35, 'Enhanced senses', "T'Challa", 'Vulnerable without the Heart-Shaped Herb']
];

$successMessage = "Table marvel_characters populated successfully. <br>";

foreach ($heroes as $hero) {
    $sql = "INSERT INTO marvel_characters (Hero_Name, age, Hero_Power, alias, weakness) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Update the bind_param format string to match the SQL query
    $stmt->bind_param("sisss", $hero[0], $hero[1], $hero[2], $hero[3], $hero[4]);
    
    if ($stmt->execute() !== TRUE) {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
}

echo $successMessage;

// Close the database connection (optional, can be done later in your application)
$conn->close();

?>
