<?php
require "../lib/error_handler.php";

function interest($principal, $rate, $time, $amount = false)
{
    if (is_string($principal) || is_string($rate) || is_string($time)) {
        trigger_error("Arguments must be numeric.", E_USER_NOTICE);
        exit();
    }
    if($amount) {
        return $principal*(1+($rate/100)*$time);
    }
    return $principal*($rate/100)*$time;
}
