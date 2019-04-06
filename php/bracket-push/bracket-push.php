<?php

function brackets_match($input)
{
    preg_match_all('/\}|\{|\)|\(|\[|\]|]/', $input, $matches);
    return helper($matches[0]);
}

function helper($arr)
{
    $valid = [
        ['[', ']'],
        ['{', '}'],
        ['(', ')']
    ];

    foreach ($arr as $k => $v) {

        $pair = [$arr[$k], $arr[$k + 1] ?? null];

        if (!$pair[1]) return false;
        if (in_array($pair, $valid)) {
            $arr[$k] = null;
            $arr[$k + 1] = null;
            $arr = array_filter($arr);
            return helper(array_values($arr));
        }
    }

    return true;

}