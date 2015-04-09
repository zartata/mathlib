<?php
function reduce($x, $r, $c, $n)
{
  for ($h = 0, $j = 0; $h < $n; $h++) {
     if ($h == $r)
        continue;
     for ($i = 0, $k = 0; $i < $n; $i++) {
        if ($i == $c)
           continue;
        $y[$j][$k] = $x[$h][$i];
        $k++;
     }
     $j++;
  }
  return $y;
}
