<?php
require "primeFactors.php";

function politeness($n) {
    $factors = primeFactors($n);
    foreach($factors as $b=>&$e) {
        if($b > 2){
            $e++;
        }
        else {
            unset($factors[$b]);
        }
    }
    return array_product($factors)-1;
}
