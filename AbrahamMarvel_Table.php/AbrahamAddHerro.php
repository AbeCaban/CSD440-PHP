<!-- Author: Abraham Caban Rios -->
<!-- Module: 9 -->
<!-- Date: 9/24/2023 -->

<?php
// Database connection parameters
$servername = "localhost"; // The location of your database server
$username = "student1";   // Your username to access the database
$password = "pass";       // Your password to access the database
$database = "baseball_01"; // The name of the database you want to work with

// Function to query the 'marvel_characters' table and return the result set
function queryMarvelCharacters()
{
    global $servername, $username, $password, $database;

    // Creating a new database connection using mysqli
    $conn = new mysqli($servername, $username, $password, $database);

    // Check if the connection to the database was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); // If there's an error, display it and stop the script
    }

    // SQL query to select all heroes from the 'marvel_characters' table
    $sql = "SELECT * FROM marvel_characters";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $heroes = [];
        while ($row = $result->fetch_assoc()) {
            $heroes[] = $row;
        }
        $conn->close(); // Close the database connection
        return $heroes;
    } else {
        $conn->close(); // Close the database connection
        return [];
    }
}

if (isset($_POST['submit'])) {
    // Get user input from the form
    $heroName = $_POST['hero_name'];
    $age = $_POST['age'];
    $heroPower = $_POST['hero_power'];
    $alias = $_POST['alias'];
    $weakness = $_POST['weakness'];

    // Establish a database connection
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the new hero into the database
    $sql = "INSERT INTO marvel_characters (Hero_Name, age, Hero_Power, alias, weakness) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisss", $heroName, $age, $heroPower, $alias, $weakness);

    if ($stmt->execute()) {
        echo "<p>New hero added successfully.</p>";
    } else {
        echo "<p>Error adding hero: " . $stmt->error . "</p>";
    }

    // Close the database connection
    $conn->close();

    // Display the table of heroes
    $heroes = queryMarvelCharacters();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add a New Hero</title>
    <style>
        label {
            display: inline-block;
            width: 120px; /* Adjust the width as needed */
            text-align: right;
            margin-right: 10px; /* Add some spacing between label and input */
        }

        input[type="text"],
        input[type="number"] {
            width: 200px; /* Adjust the width as needed */
        }
    </style>
</head>

<body>
    <h1>Add a New Hero</h1>

    <form method="POST">
        <label for="hero_name">Hero Name:</label>
        <input type="text" name="hero_name" id="hero_name" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>
        <br>
        <label for="hero_power">Hero Power:</label>
        <input type="text" name="hero_power" id="hero_power">
        <br>
        <label for="alias">Alias:</label>
        <input type="text" name="alias" id="alias" required>
        <br>
        <label for="weakness">Weakness:</label>
        <input type="text" name="weakness" id="weakness">
        <br>
        <input type="submit" name="submit" value="Add Hero">
    </form>

    <?php
    if (isset($heroes) && !empty($heroes)) {
    ?>
        <h2>List of Heroes</h2>
        <table border='1'>
            <tr>
                <th>Hero Name</th>
                <th>Age</th>
                <th>Hero Power</th>
                <th>Alias</th>
                <th>Weakness</th>
            </tr>
            <?php
            foreach ($heroes as $hero) {
            ?>
                <tr>
                    <td><?php echo $hero['Hero_Name']; ?></td>
                    <td><?php echo $hero['age']; ?></td>
                    <td><?php echo $hero['Hero_Power']; ?></td>
                    <td><?php echo $hero['alias']; ?></td>
                    <td><?php echo $hero['weakness']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php
} else {
?>
    <p>No heroes found.</p>
<?php
}
?>
    <a href="AbrahamDisplaySelectedHero.php">Back to Hero Selection</a>
    <p><a href="index.php">Home page</a></p>
</body>

</html>
