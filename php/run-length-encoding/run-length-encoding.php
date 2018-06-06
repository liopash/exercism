<?php 

function encode($input)
{
    $enc;
    $input = str_split($input);
    $chunker = function ($x, $y) use (&$enc) {
        if ($x != $y) {
            $enc[] = [$y];
        } else {
            $enc[count($enc) - 1][] = $y;
        }
        return $y;
    };

    $side_effect = array_reduce($input, $chunker);
    $result = array_map(function ($x) {
        return (count($x) > 1 ? count($x) : '') . $x[0];
    }, $enc);
    return implode($result);
}



function decode($input)
{
    if (strlen($input) < 2) return $input;

    $input = preg_split('/(?<=\D)(?=\d)|\d+\K/', $input);

    if (!is_numeric($input[0])) array_unshift($input, 1);

    $pairs = function ($arr) use (&$pairs) {
        $tail = array_slice($arr, 2);
        if (count($arr)) {
            list($number, $string) = $arr;
            return str_repeat($string[0], $number - 1) . $string . $pairs($tail);
        } else {
            return;
        };
    };

    return $pairs($input);

}