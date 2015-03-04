<?php
//Return the mean of an array of numbers
function mean($array) {
    $mean = array_sum($array) / count($array);
    return $mean;
}