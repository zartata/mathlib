<?php
//Return the variance of an array of numbers

require "../lib/error_handler.php";
require "mean.php";

function variance($array)
{
    $mean = mean($array);
    foreach ($array as &$arr) {
        if (!is_string($arr) && !is_bool($arr)) {
            $arr = pow($arr - $mean, 2);
        } else {
            return false;
            exit();
        }
    }
    $variance = array_sum($array) / count($array);
    return $variance;
}
