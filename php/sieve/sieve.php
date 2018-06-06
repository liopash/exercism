<?php
function sieve($max)
{
    $nums = [null,null] +  range(0, $max);
    $sqrt_nums = range(0, sqrt($max));
    $fn = function ($i) use (&$nums, $max, $sqrt_nums) {
        if ($nums[$i]) {
            foreach (range($i ** 2, $max) as $x) {
                if ($x % $i == 0) { $nums[$x] = null;}
            }
        }
    };
    array_map($fn, $sqrt_nums);
    return array_values(array_filter($nums));
}