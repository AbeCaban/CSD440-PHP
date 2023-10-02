<!-- Abraham Caban Rios
Module 12
module 2 redo
10/2/2023 
-->
<!DOCTYPE html>
<html>
<head>
    <title> Abes Table</title> <!-- Sets the title of the web page -->
</head>
<body>

    <table border="1" width="400"> <!-- Creates a table with a border and width of 400 pixels -->
        <caption>
            Abes table of random numbers <!-- Sets the caption for the table -->
        </caption>
        <thead>
            <tr>
                <td colspan="8">
                    numbers 1 - 6 <!-- Header row for columns 1 through 6 -->
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < 8; ++$i) { // Loop to create 8 rows
            ?>
            <tr>
                <?php
                    for ($j = 0; $j < 8; ++$j) { // Loop to create 8 columns within each row
                ?>
                <td><?php echo rand(1, 9); ?></td> <!-- Generates a random number between 1 and 9 and displays it in a table cell -->
                <?php
                    }
                ?>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>
