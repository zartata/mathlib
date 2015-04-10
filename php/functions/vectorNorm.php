<?php

require "../lib/error_handler.php";

function vector_norm($vector)
{
    if (!is_array($vector)) {
        trigger_error("vector_norm() expects parameter 1 to be array, ". gettype($vector) ." given", E_USER_NOTICE);
        exit();
    }
    foreach ($vector as $v) {
        @$sum += pow($v, 2);
    }
    return sqrt($sum);
}
