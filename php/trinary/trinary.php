<?php

function toDecimal($number)
{
    preg_match('/[3-9]/', $number, $matches);
    if ($matches) {
        return 0;
    }
    $arr = array_reverse(str_split($number));
    $fn = function ($digit, $index) {
        return $digit*pow(3, $index);
    };
    return array_sum(array_map($fn, $arr, array_keys($arr)));
}
