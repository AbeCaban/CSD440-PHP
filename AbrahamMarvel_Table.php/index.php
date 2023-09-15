
<!-- Author: Abraham Caban Rios -->
<!-- Module: 8 -->
<!-- Date: 9/15/2023 -->

<!DOCTYPE html>
<html>

<head>
    <title>Marvel Heroes</title>
</head>

<body>
    <h1>Marvel Heroes</h1>
    
    <!-- A form to trigger the display of heroes -->
    <form method="POST">
        <button type="submit" name="show_heroes">Show Heroes</button>
    </form>

    <?php
    // Check if the 'show_heroes' button was clicked
    if (isset($_POST['show_heroes'])) {

        // Include PHP scripts for database operations
        include_once 'AbrahamDropTable.PHP';    // Drops the table if it exists
        include_once 'AbrahamCreateTable.php';   // Creates the table if it doesn't exist
        include_once 'AbrahamPopulateTable.php'; // Populates the table with hero data

        // Display a success message when the table is dropped, created, and populated
        echo "Table marvel_characters dropped, created, and populated successfully.<br>";
    }

    // Include PHP script to query the marvel_characters table and retrieve heroes
    include_once 'AbrahamQueryTable.php';

    // Check if heroes data exists and is not empty
    if (isset($heroes) && !empty($heroes)) {
    ?>
        <!-- Display heroes in a table -->
        <table border='1'>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Power</th>
                <th>Alias</th>
                <th>Weakness</th>
            </tr>
            <?php
            // Loop through each hero and display their information
            foreach ($heroes as $hero) {
            ?>
                <tr>
                    <td><?php echo $hero[0]; ?></td>
                    <td><?php echo $hero[1]; ?></td>
                    <td><?php echo $hero[2]; ?></td>
                    <td><?php echo $hero[3]; ?></td>
                    <td><?php echo $hero[4]; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        // Display a message if there are no heroes or the "Show Heroes" button hasn't been pressed yet
        echo "Please press the 'Show Heroes' button to display heroes.";
    }
    ?>
</body>

</html>
