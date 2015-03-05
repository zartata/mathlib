<?php
//Return the mean of an array of numbers

require "../lib/error_handler.php";

function mean($array)
{
    $mean = array_sum($array) / count($array);
    return $mean;
}
