<?php
require "../lib/error_handler.php";
require "primeFactors.php";

function isPolite($n)
{
    $factors = primeFactors($n);
    foreach ($factors as $b => &$e) {
        if ($b > 2){
            $e++;
        } else {
            unset($factors[$b]);
        }
    }
    if (array_product($factors)-1 > 0) {
        return true;
    } else {
        return false;
    }
    return $factors;
}
