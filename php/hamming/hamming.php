<?php

//
// This is only a SKELETON file for the "Hamming" exercise. It's been provided as a
// convenience to get you started writing code faster.
//

function distance($x, $y)
{
    $xs = str_split($x);
    $ys = str_split($y);
    $error = 'DNA strands must be of equal length.';
    if (count($xs) != count($ys)) {
        throw new InvalidArgumentException($error);
    }

    return count(array_diff_assoc($xs, $ys));
}
