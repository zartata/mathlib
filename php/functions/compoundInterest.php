<?php
function compound_interest($principal, $rate, $time)
{
    if(is_string($principal) || is_string($rate) || is_string($time)) {
        trigger_error("Arguments must be numeric.", E_USER_NOTICE);
        exit();
    }
    return $principal*(pow(1+($rate/100), $time));
}
