<?php
require "../lib/error_handler.php";

function is_perfect_square($n)
{
    if (sqrt($n) - floor(sqrt($n)) == 0) {
        return true;
    } else {
        return false;
    }
}
