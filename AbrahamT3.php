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

    <table border="1" width="600">
        <caption>
            Abes table of sum of random numbers
        </caption>
        <thead>
            <tr>
                <td colspan="8" >
                    Sum of random numbers
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            
                include "AbrahamTable3Function.php";
                for ($i = 0; $i < 8; ++$i) {
            ?>
            <tr>
                <?php
                    
                    for ($j = 0; $j < 8; ++$j) {
                ?>
                <td>
                    <?php
                        

                        sumOfTwoNumbers(); 
                    ?>
                 </td>
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
