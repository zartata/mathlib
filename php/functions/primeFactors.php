<?php
/*
Prime factor a number.
The return is an array with keys being the prime factors and values being the exponents.
Usage:
$factors = primeFactors(91);
$fstr = "";
foreach($factors as $b=>$e) {
if($fstr){$fstr .= " x ";}
$fstr .= "$b" . ($e>1?"<sup>$e</sup>":"");
}
echo $fstr;
*/

require "../lib/error_handler.php";

function primeFactors($n)
{
    if (!is_numeric($n)) {
        trigger_error("Argument must be numeric", E_USER_NOTICE);
        exit();
    }
    if($n === 1) {
        $factors[1] = 1;
        return $factors;
    }
    $e = 0;
    $factors = [];
    while ($n % 2 == 0) {
        $factors[2] = 2;
        $n = $n / 2;
        $e++;
    }
    if ($e > 0) {
        $factors[2] = $e;
        $e = 0;
    }
    for ($i = 3; $i <= sqrt($n); $i = $i + 2, $e = 0) {
        while ($n % $i == 0) {
            $e++;
            $n = $n / $i;
        }
        if ($e > 0) {
            $factors[$i] = $e;
        }
    }
    if ($n > 2) {
        $factors[$n] = 1;
    }
    return $factors;
}
