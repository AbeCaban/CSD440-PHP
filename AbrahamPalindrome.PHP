<!-- Abraham Caban Rios
Module 4
8/25/2023 
reference: https://www.w3schools.com/php/php_regex.asp
-->
<!DOCTYPE html>
<html>
<head>
    <title> Abes Palindrome Checker</title>
</head>
<body>
<?php
        function isPalindrome($str) {
            // Remove non-alphanumeric characters and convert to lowercase
            $str = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $str));
            // Reverse the string
            $bacwardsStr = strrev($str);

            if ($str === $bacwardsStr) {
                echo "$str is a palindrome <br>";
            } else {
                echo "$str is not a palindrome.<br>";
            }
        }
        ?>

        <?php
        $stringsToCheck = [
            "radar",
            "A man, a plan, a canal, Panama!",
            "deified",
            "hello",
            "nomore",
            "programming"
        ];

        ?>

        <?php
        echo "Abes Palindromes:<br>";
        for ($i=0; $i < sizeof($stringsToCheck); $i++) { 
            foreach ($stringsToCheck as $str) {
            echo ++$i, ". ";
            isPalindrome($str);
        }
        }
?>

</body>
</html>
