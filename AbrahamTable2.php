<!-- Abraham Caban Rios
Module 1
8/19/2023 
-->
<!DOCTYPE html>
<html>
<head>
    <title> Abes Table</title>
</head>
<body>

    <table border="1" width="400">
        <caption>
            Abes table of random numbers
        </caption>
        <thead>
            <tr>
                <td colspan="8">
                    numbers 1 - 6
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 0; $i < 8; ++$i) {
            ?>
            <tr>
                <?php
                    for ($j = 0; $j < 8; ++$j) {
                ?>
                <td><?php echo rand(1, 9); ?></td>
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
