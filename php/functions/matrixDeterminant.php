<?php
require "../lib/error_handler.php";
require "reduce.php";

function matrix_determinant(array $x)
{
    $n = count($x[0]);
    $ret = 0;
    if ($n === 1) {
        return $x[0];
    } elseif ($n === 2) {
        return ($x[0][0] * $x[1][1]) - ($x[0][1] * $x[1][0]);
    } elseif ($n ===3) {
        $p1 = 1;
        $p2 = 1;
        for ($i = 0; $i < $n; $i++) {
            $p1 = 1;
            $p2 = 1;
            for ($j = 0; $j < $n; $j++) {
               $p1 *= $x[($j + $i + 1) % $n][$j];
               $p2 *= $x[($j + $i + 1) % $n][$n - $j - 1];
            }
            $ret += $p1 - $p2;
         }
         return $ret;
    } else {
        for ($h = 0; $h < $n; $h++) {
            if ($x[$h][0] == 0)
                continue;
            $y = reduce($x, $h, 0, $n);
            $h % 2 == 0 ? $ret -= matrix_determinant($y) * $x[$h][0] : null;
            $h  %2 == 1 ? $ret += matrix_determinant($y) * $x[$h][0] : null;
        }
        return -$ret;
    }
}
