<?php

function accumulate(array $input, callable $accumulator)
{
    $acc = [];
    foreach ($input as $item) {
        $acc[] = $accumulator($item);
    }

    return $acc;

}
