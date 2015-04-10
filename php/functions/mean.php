<?php
//Return the mean of an array of numbers

require "../lib/error_handler.php";

function mean($array)
{
    $args = func_get_args();
    if (is_array($args[0])) {
        return array_sum($array) / count($array);
    }
    $sum = 0;
    foreach ($args as $i => $arg) {
        if (!is_numeric($arg)) {
            trigger_error("mean() expects parameter ". ($i+1) ." to be numeric, ". gettype($args[$i]) ." given", E_USER_NOTICE);
            exit();
        }
        $sum += $arg;
    }
    return $sum / count($args);
}
