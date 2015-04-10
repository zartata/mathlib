<?php

require "../lib/error_handler.php";

function vector_midpoint(array $vector1, array $vector2)
{
    if (!isset($vector2)) {
        return $vector1;
    }
    if (count($vector1) !== count($vector2)) {
        trigger_error("Incompatible vectors", E_USER_NOTICE);
        exit();
    }
    foreach ($vector1 as $i => $v1) {
        $return[$i] = ($v1 + $vector2[$i]) / 2;
    }
    return $return;
}
