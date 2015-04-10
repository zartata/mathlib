<?php
//Return the variance of an array of numbers

require "../lib/error_handler.php";
require "mean.php";

function variance(array $array)
{
    $mean = mean($array);
    foreach ($array as &$arr) {
        if (!is_numeric($arr)) {
            return false;
            exit();
        }
        $arr = pow($arr - $mean, 2);
    }
    return array_sum($array) / count($array);
}
