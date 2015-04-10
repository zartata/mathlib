<?php
function fibonacci($n, $complete = false)
{
    if (!is_numeric($n)) {
        trigger_error("fibonacci() expects parameter 1 to be numeric, ". gettype($n) ." given", E_USER_NOTICE);
        exit();
    }
    $res = [0, 1, 1];
    if (isset($res[$n-1])) {
        return $res[$n-1];
    }
    while (($a = sizeof($res)) < $n) {
        $res[] = $res[$a-1] + $res[$a-2];
    }
    if ($complete === true) {
        return $res;
    }
    return $res[$n-1];
}
