<?php

require "../lib/error_handler.php";

public function quadraticEquation($a, $b, $c)
{
    if ($a === 0) {
        trigger_error("Not a quadratic equation", E_USER_NOTICE);
        exit();
    } else {
        $d = pow($b, 2) - ((4 * $a) * $c);
        if ($d === 0) {
            $r = -($b) / (2 * $a);
            return [$r];
        } elseif ($d > 0) {
            $r[0] = (-$b + sqrt($delta)) / (2 * $a);
            $r[1] = (-$b - sqrt($delta)) / (2 * $a);
            return $r;
        } else {
            return false;
        }
    }
}
