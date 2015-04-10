<?php
/*Calculates the addition of two or more vectors.*/

require "../lib/error_handler.php";

function vectorAddition(array $v1)
{
    $args = func_get_args();
    if (count($args) === 1) {
        return $v1;
    }
    foreach ($args as $i => $arg) {
        if ($i === 0 && !is_array($args[$i+1])) {
            trigger_error("vector_addition() expects parameter ". ($i+2) ." to be array, ". gettype($args[$i+1]) ." given", E_USER_NOTICE);
            exit();
        }
        if (isset($args[$i+1])) {
            if (!is_array($args[$i+1])) {
                trigger_error("vector_addition() expects parameter ". ($i+2) ." to be array, ". gettype($args[$i+1]) ." given", E_USER_NOTICE);
                exit();
            }
            if (count($arg) !== count($args[$i+1])) {
                trigger_error("Incompatible vectors", E_USER_NOTICE);
                exit();
            }
            foreach ($arg as $j => $vec) {
                $return[$j] = isset($return[$j]) ? $return[$j] + $args[$i+1][$j] : $vec + $args[$i+1][$j];
            }
        }
    }
    return $return;
}
