<!-- Author: Abraham Caban Rios -->
<!-- Module: 9 -->
<!-- Date: 9/24/2023 -->

<!DOCTYPE html>
<html>
<head>
    <title>Select a Hero</title>
</head>
<body>
    <h1>Select a Hero</h1>

    <form method="POST">
        <label for="hero">Choose a hero:</label>
        <select name="hero" id="hero">
            <?php
            // Establish a database connection

            // Database connection parameters
            $servername = "localhost"; // The location of your database server
            $username = "student1";   // Your username to access the database
            $password = "pass";       // Your password to access the database
            $database = "baseball_01"; // The name of the database you want to work with

            // Create a new database connection using mysqli
            $conn = new mysqli($servername, $username, $password, $database);

            // Check if the connection to the database was successful
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch hero names from the database
            $sql = "SELECT Hero_Name FROM marvel_characters";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <option value='<?php echo $row['Hero_Name']; ?>'><?php echo $row['Hero_Name']; ?></option>
            <?php
                }
            }

            // Close the database connection
            $conn->close();
            ?>
        </select>
        <br>
        <input type="submit" name="submit" value="Show Hero Information">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Get the selected hero name from the form
        $selectedHero = $_POST['hero'];

        // Establish a database connection

        // Create a new database connection using mysqli
        $conn = new mysqli($servername, $username, $password, $database);

        // Check if the connection to the database was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the hero's information from the database
        $sql = "SELECT * FROM marvel_characters WHERE Hero_Name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $selectedHero);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            ?>
            <h2>Hero Details</h2>
            <table border='1'>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><strong>Name:</strong></td><td><?php echo $row['Hero_Name']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Age:</strong></td><td><?php echo $row['age']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Hero Power:</strong></td><td><?php echo $row['Hero_Power']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Alias:</strong></td><td><?php echo $row['alias']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Weakness:</strong></td><td><?php echo $row['weakness']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <?php
        } else {
            echo "<p>No information found for the selected hero.</p>";
        }

        // Close the database connection
        $conn->close();
    }
    ?>
    <p><a href="index.php">Home page</a></p>
    <p><a href="AbrahamForm.php">Add Hero</a></p>
</body>
</html>
