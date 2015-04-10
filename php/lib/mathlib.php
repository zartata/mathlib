<?php

class MathLib
{
    function __construct()
    {
        set_error_handler([$this, 'errorHandler'], E_USER_NOTICE);
    }

    public function compoundInterest($p, $r, $t)
    {
        if (!is_numeric($p) || !is_numeric($r) || !is_numeric($t)) {
            trigger_error("Arguments must be numeric", E_USER_NOTICE);
            exit();
        }
        return $p * (pow(1 + ($r / 100), $t));
    }

    function errorHandler($errno, $errstr)
    {
        $err = end(debug_backtrace());
        echo "<b>Notice:</b> [".$errno."] ".$errstr." in ".$err['file']." on line ". $err['line'] ."<br>";
    }

    function factorial($n) {
        if(!is_numeric($n)) {
            trigger_error("factorial() expects parameter 1 to be numeric, ". gettype($n) ." given", E_USER_NOTICE);
            exit();
        }
        for ($i = $n-1, $f = $n; $i > 1; $i--) {
            $f *= $i;
        }
        return $f;
    }

    function fibonacci($n, $complete = false)
    {
        if (@!is_numeric($n)) {
            trigger_error("fibonacci() expects parameter 1 to be numeric, ". @gettype($n) ." given", E_USER_NOTICE);
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

    function interest($p, $r, $t, $a = false)
    {
        if (!is_numeric($p) || !is_numeric($r) || !is_numeric($t)) {
            trigger_error("Arguments must be numeric", E_USER_NOTICE);
            exit();
        }
        if ($a) {
            return $p * (1 + ($r / 100) * $t);
        }
        return $p * ($r / 100) * $t;
    }

    function isPerfectSquare($n)
    {
        if (!is_numeric($n)) {
            trigger_error("Argument must be numeric", E_USER_NOTICE);
            exit();
        }
        if (sqrt($n) - floor(sqrt($n)) == 0) {
            return true;
        } else {
            return false;
        }
    }

    function isPolite($n)
    {
        $factors = $this->primeFactors($n);
        foreach ($factors as $b => &$e) {
            if ($b > 2){
                $e++;
            } else {
                unset($factors[$b]);
            }
        }
        if ((array_product($factors) - 1) > 0) {
            return true;
        } else {
            return false;
        }
        return $factors;
    }

    function matrixAddition()
    {
        $args = func_get_args();
        foreach ($args as $i => $arg) {
            if (!is_array($arg)) {
                trigger_error("matrixAddition() expects parameter ". ($i+1) ." to be array, ". gettype($args[$i]) ." given", E_USER_NOTICE);
                exit();
            } elseif (isset($args[$i+1])) {
                if (!is_array($args[$i+1])) {
                    trigger_error("matrixAddition() expects parameter ". ($i+2) ." to be array, ". gettype($args[$i+1]) ." given", E_USER_NOTICE);
                    exit();
                }
            }
        }
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

    function matrixMultiplication(array $m1, array $m2)
    {
        $r = count($m1);
        $c = count($m2[0]);
        $p = count($m2);
        for ($i = 0; $i < $r; $i++) {
            if (count($m1[$i]) !== $p) {
                trigger_error("Incompatible matrices", E_USER_NOTICE);
                exit();
            }
            if (isset($m1[$i+1])) {
                if(count($m1[$i]) != count($m1[$i+1])) {
                    trigger_error("Incompatible matrices", E_USER_NOTICE);
                    exit();
                }
            }
            for ($j = 0; $j < $c; $j++) {
                if ($j < ($c-1)) {
                    if (count($m2[$j]) != $c) {
                        trigger_error("Incompatible matrices", E_USER_NOTICE);
                        exit();
                    }
                }
                $m3[$i][$j] = 0;
                for ($k = 0; $k < $p; $k++) {
                    $m3[$i][$j] += $m1[$i][$k] * $m2[$k][$j];
                }
            }
        }
        return($m3);
    }

    function matrixSubtraction()
    {
        $args = func_get_args();
        foreach ($args as $i => $arg) {
            if (isset($args[$i+1])) {
                if (count($arg) !== count($args[$i+1])) {
                    trigger_error("Matrices must be same size", E_USER_NOTICE);
                    exit();
                }
                foreach ($arg as $j => $array) {
                    if (count($array) !== count($args[$i+1][$j])) {
                        trigger_error("Matrices must be same size", E_USER_NOTICE);
                        exit();
                    }
                    foreach ($array as $k => $arr) {
                        $return[$j][$k] = isset($return[$j][$k]) ? $return[$j][$k] - $args[$i+1][$j][$k] : $arr - $args[$i+1][$j][$k];
                    }
                }
            }
        }
        return $return;
    }

    function mean($array)
    {
        $args = func_get_args();
        if (is_array($args[0])) {
            return array_sum($array) / count($array);
        }
        $sum = 0;
        foreach ($args as $i => $arg) {
            if (!is_numeric($arg)) {
                trigger_error("mean() expects parameter ". ($i+1) ." to be numeric, ". gettype($args[$i]) ." given", E_USER_NOTICE);
                exit();
            }
            $sum += $arg;
        }
        return $sum / count($args);
    }

    function politeness($n)
    {
        $factors = $this->primeFactors($n);
        foreach ($factors as $b => &$e) {
            if ($b > 2){
                $e++;
            }
            else {
                unset($factors[$b]);
            }
        }
        return array_product($factors) - 1;
    }

    function primeFactors($n)
    {
        if (!is_numeric($n)) {
            trigger_error("Argument must be numeric", E_USER_NOTICE);
            exit();
        }
        if($n === 1) {
            $factors[1] = 1;
            return $factors;
        }
        $e = 0;
        $factors = [];
        while ($n % 2 == 0) {
            $factors[2] = 2;
            $n = $n / 2;
            $e++;
        }
        if ($e > 0) {
            $factors[2] = $e;
            $e = 0;
        }
        for ($i = 3; $i <= sqrt($n); $i = $i + 2, $e = 0) {
            while ($n % $i == 0) {
                $e++;
                $n = $n / $i;
            }
            if ($e > 0) {
                $factors[$i] = $e;
            }
        }
        if ($n > 2) {
            $factors[$n] = 1;
        }
        return $factors;
    }

    public function quadraticEquation($a, $b, $c)
    {
        if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
            trigger_error("Arguments must be numeric", E_USER_NOTICE);
            exit();
        }
        if ($a === 0) {
            trigger_error("Not a quadratic equation", E_USER_NOTICE);
            exit();
        } else {
            $d = pow($b, 2) - ((4 * $a) * $c);
            if ($d === 0) {
                $r = -($b) / (2 * $a);
                return [$r];
            } elseif ($d > 0) {
                $r[0] = (-$b + sqrt($delta)) / (2 * $a);
                $r[1] = (-$b - sqrt($delta)) / (2 * $a);
                return $r;
            } else {
                return false;
            }
        }
    }

    function variance(array $array)
    {
        $mean = $this->mean($array);
        foreach ($array as &$arr) {
            if (!is_numeric($arr)) {
                return false;
                exit();
            }
            $arr = pow($arr - $mean, 2);
        }
        return array_sum($array) / count($array);
    }

    function vectorAddition(array $v1)
    {
        $args = func_get_args();
        if (count($args) === 1) {
            return $v1;
        }
        foreach ($args as $i => $arg) {
            if ($i === 0 && !is_array($args[$i+1])) {
                trigger_error("vectorAddition() expects parameter ". ($i+2) ." to be array, ". gettype($args[$i+1]) ." given", E_USER_NOTICE);
                exit();
            }
            if (isset($args[$i+1])) {
                if (!is_array($args[$i+1])) {
                    trigger_error("vectorAddition() expects parameter ". ($i+2) ." to be array, ". gettype($args[$i+1]) ." given", E_USER_NOTICE);
                    exit();
                }
                if (count($arg) !== count($args[$i+1])) {
                    trigger_error("Incompatible vectors", E_USER_NOTICE);
                    exit();
                }
                foreach ($arg as $j => $vec) {
                    $return[$j] = isset($return[$j]) ? $return[$j] + $args[$i+1][$j] : $vec + $args[$i+1][$j];
                }
            }
        }
        return $return;
    }

    function vectorMidpoint(array $vector1, array $vector2)
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

    function vectorNorm($vector)
    {
        if (!is_array($vector)) {
            trigger_error("vectorNorm() expects parameter 1 to be array, ". gettype($vector) ." given", E_USER_NOTICE);
            exit();
        }
        foreach ($vector as $v) {
            @$sum += pow($v, 2);
        }
        return sqrt($sum);
    }
}
