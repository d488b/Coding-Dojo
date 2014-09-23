<!-- // Given a positive integer calculate the sum of the digits. Do this until the sum of the digits is only a single integer.


 -->
<?php

    $n = 12343;
    $nstr = $n . "";

    $sum = 0;
    for ($i = 0; $i < strlen($nstr); ++$i)
    {
        $sum += $nstr[$i];
    }
    echo $sum;

?>