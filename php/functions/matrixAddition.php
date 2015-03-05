<?php
/*Calculates the addition of matrices of same size.*/

require "../lib/error_handler.php";

function matrix_addition()
{
    $args = func_get_args();
    foreach ($args as $i => $arg) {
        if (isset($args[$i+1])) {
            if (count($arg) == count($args[$i+1])) {
                foreach ($arg as $j => $array) {
                    if (count($array) == count($args[$i+1][$j])) {
                        foreach ($array as $k => $arr) {
                            $return[$j][$k] = isset($return[$j][$k]) ? $return[$j][$k] + $args[$i+1][$j][$k] : $arr + $args[$i+1][$j][$k];
                        }

                    } else {
                        trigger_error("Matrices must be same size", E_USER_NOTICE);
                        exit();
                    }
                }

            } else {
                trigger_error("Matrices must be same size", E_USER_NOTICE);
                exit();
            }
        }
    }
    return $return;
}
