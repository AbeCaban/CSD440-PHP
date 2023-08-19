<!-- Abraham Caban Rios
Module 1
8/19/2023 
This code was pulled from the video suplied by Bellevue University
and the code was created by Prof Darell Payne.
the code has been modified so the student that handed it in can be 
identified.-->
<!DOCTYPE html>
<html>
    <head>
        <title> Abes Table</title>
    </head>
    <body>

        <table border ='1' width = '400'>
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
            <tbody></tbody>
                <?php
                /*This opening tag indicates the start of a 
                PHP code block. Everything between this 
                opening tag and the closing 
                ?> tag will be processed as PHP code. */
                    for($i = 0; $i < 8; ++$i){
                    /*This line starts a for loop. The 
                    loop is designed to run 8 times, as 
                    long as the value of the variable $i 
                    is less than 8. In each iteration, the 
                    value of $i is incremented by 1 (++$i). */

                        echo('<tr>');/*The echo function is 
                        used to output content to the browser.
                         In this case, it's used to output an
                          opening <tr> tag, which defines a table
                           row in HTML. */
                        for ($j = 0; $j < 8; ++$j){
                            /*This line starts another 
                            nested for loop. Similar to the outer 
                            loop, this inner loop also runs 8 times, as 
                            long as the value of the variable $j is less
                             than 8. In each iteration, the value of $j
                              is incremented by 1 (++$j).*/
                            echo('<td>');
                            echo(rand(1, 9));
                            echo('</td>');
                        }
                        echo('</tr>');
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>