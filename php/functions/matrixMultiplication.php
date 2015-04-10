<?php
/*Calculates the multiplication of two matrices.*/

require "../lib/error_handler.php";

function matrix_multiplication(array $m1, array $m2)
{
    $r = count($m1);
    $c = count($m2[0]);
    $p = count($m2);
    for ($i = 0; $i < $r; $i++) {
        if (count($m1[$i]) !== $p) {
            trigger_error("Incompatible matrices", E_USER_NOTICE);
            exit();
        }

        if (isset($m1[$i+1])) {
            if(count($m1[$i]) != count($m1[$i+1])) {
                trigger_error("Incompatible matrices", E_USER_NOTICE);
                exit();
            }
        }
        for ($j = 0; $j < $c; $j++) {
            if ($j < ($c-1)) {
                if (count($m2[$j]) != $c) {
                    trigger_error("Incompatible matrices", E_USER_NOTICE);
                    exit();
                }
            }
            $m3[$i][$j] = 0;
            for ($k = 0; $k < $p; $k++) {
                $m3[$i][$j] += $m1[$i][$k] * $m2[$k][$j];
            }
        }
    }
    return($m3);
}
