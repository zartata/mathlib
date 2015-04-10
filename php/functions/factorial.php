<?php
function factorial($n) {
    if(!is_numeric($n)) {
        trigger_error("factorial() expects parameter 1 to be numeric, ". gettype($n) ." given", E_USER_NOTICE);
        exit();
    }
    if ($n < 2) {
        return 1;
    }
    return ($n * factorial($n-1));
}
