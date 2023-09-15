<!DOCTYPE html>
<html>

<head>
    <title>Marvel Heroes</title>
</head>

<body>
    <h1>Marvel Heroes</h1>
    <form method="POST">
        <button type="submit" name="show_heroes">Show Heroes</button>
    </form>

    <?php
    if (isset($_POST['show_heroes'])) {

        include_once 'AbrahamDropTable.PHP';
        include_once 'AbrahamCreateTable.php';
        include_once 'AbrahamPopulateTable.php';

        echo "Table marvel_characters dropped, created, and populated successfully.<br>";
    }

    include_once 'AbrahamQueryTable.php';

    if (isset($heroes) && !empty($heroes)) {
    ?>
        <table border='1'>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Power</th>
                <th>Alias</th>
                <th>Weakness</th>
            </tr>
            <?php
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
        echo "please press the show heroes button";
    }
    ?>
</body>

</html>
