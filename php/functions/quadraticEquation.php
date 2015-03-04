<?php
function quadratic_equation($a,$b,$c) {
    if($a === 0) {
        trigger_error("Not a quadratic equation, \"a\" must be different than zero.", E_USER_NOTICE);
        exit();
    } else {
        $delta = pow($b,2) - ((4*$a)*$c);
        if($delta === 0) {
            $root = -($b)/(2*$a);
            return [$root];
        } elseif($delta > 0) {
            $root[0] = (-$b + sqrt($delta))/(2*$a);
            $root[1] = (-$b - sqrt($delta))/(2*$a);
            return $root;
        } else {
            trigger_error("No solution.", E_USER_NOTICE);
        }
    }
}
?>
