<?php

function detectAnagrams($x, $ys)
{   
    $x = preg_split('//u',  mb_strtolower($x, 'UTF-8'), -1, PREG_SPLIT_NO_EMPTY);
    $fn = function ($y) use ($x) {
        $y = preg_split('//u',  mb_strtolower($y, 'UTF-8'), -1, PREG_SPLIT_NO_EMPTY);
        if($x === $y) return false;
        sort($x);
        sort($y);
        return $x == $y;
    };
    return array_values(array_filter($ys, $fn));
}