<?php
function errorHandler($errno, $errstr)
{
    $err = end(debug_backtrace());
    echo "<b>Notice:</b> [".$errno."] ".$errstr." in ".$err['file']." on line ". $err['line'] ."<br>";
}
set_error_handler('errorHandler', E_USER_NOTICE);
