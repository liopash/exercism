<?php

function sumOfSquares($number)
{
    $numbers = range(1, $number);
    $fn = function ($x) {
        return pow($x, 2);
    };
    return array_sum(array_map($fn, $numbers));
}

function squareOfSums($number)
{
    $numbers = range(1, $number);
    return pow(array_sum($numbers),2);
}

function difference($number)
{
    return squareOfSums($number) - sumOfSquares($number);
}
