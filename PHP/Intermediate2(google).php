<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Intermediate 2</title>
    <link rel="stylesheet" type="text/css" href="CSS/Intermediate2.php" />

</head>
<body>
<?php
$start = 1;
$end = 9;
 
echo '<table>';
    echo '<tr><th></th>';
        for ($x = $start; $x <= $end; $x++)
            echo '<th>'.$x.'</th>';
    echo '</tr>';
        for ($y = $start; $y <= $end; $y++):
            echo '<tr><th>'.$y.'</th>';
                for ($z = $start; $z <= $end; $z++):
                    echo '<td>'.($y * $z).'</td>';
                endfor;
            echo '</tr>';
        endfor;
echo '</table>';
?>


    </body>
</html>

