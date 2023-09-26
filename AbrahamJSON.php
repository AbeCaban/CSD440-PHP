<!-- Abraham Caban Rios
Module 10
9/26/2023 
This is a program that prompts a user to enter a minimum of 8 different fields of data then when the form is submitted to the PHP CGI,
the program uses the function json_encode to encode your data into a JSON format.
Then, in the return, it displays the data in the JSON format, if not filled correctly it will return an error.-->

<?php
// Initialize $json_data as false by default
$json_data = false;

// Check if the HTTP request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store favorite heroes
    $favorite_heroes = array();

    // Define an array to store hero names (for validation)
    $hero_names = array(
        "hero1",
        "hero2",
        "hero3",
        "hero4",
        "hero5",
        "hero6",
        "hero7",
        "hero8"
    );

    // Loop through hero names and validate/collect user input
    foreach ($hero_names as $hero_name) {
        // Check if the POST data for the current hero is set and not empty
        if (isset($_POST[$hero_name]) && !empty($_POST[$hero_name])) {
            // Add the hero name to the $favorite_heroes array
            $favorite_heroes[] = $_POST[$hero_name];
        }
    }

    // Check if at least one favorite hero was entered
    if (count($favorite_heroes) >= 1) {
        // Encode favorite heroes into JSON format with pretty printing
        $json_data = json_encode($favorite_heroes, JSON_PRETTY_PRINT);
    }
}
?>

<!-- HTML content starts here -->
<!DOCTYPE html>
<html>
<head>
    <title>Favorite Heroes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e8e8; /* Light blue-gray background */
            color: #333; /* Dark gray text color */
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #0066cc; /* Deep blue header text color */
        }

        pre {
            background-color: #f0f8ff; /* Light pastel blue for JSON data */
            padding: 10px;
            border-radius: 5px;
        }

        form {
            background-color: #fff; /* White background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #0066cc; /* Deep blue label text color */
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #0066cc; /* Deep blue submit button color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004499; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <?php
    // Display the appropriate message based on the JSON data
    if ($json_data !== false) {
    ?>
        <h2>Your Favorite Heroes:</h2>
        <pre><?php echo $json_data; ?></pre>
    <?php
    } else {
    ?>
        <h2>Error: Please enter at least one favorite hero.</h2>
    <?php
    }
    ?>

    <h2>Enter Your Favorite Heroes:</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        // Generate input fields for hero names dynamically using a loop
        for ($i = 1; $i <= 8; $i++) {
        ?>
            <label for="hero<?php echo $i; ?>">Hero <?php echo $i; ?>:</label>
            <input type="text" name="hero<?php echo $i; ?>"><br>
        <?php
        }
        ?>

        <!-- Submit button to send the form data to the server -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>

