<?php 
function toRoman($num)
{
    $in_roman = '';
    $romans = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];
    foreach ($romans as $i => $v) {
        $in_roman .= str_repeat($v, floor($num / $i));
        $num %= $i;
    }
    return $in_roman;
}