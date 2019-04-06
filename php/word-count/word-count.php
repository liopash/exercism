<?php 

function wordCount($sentence)
{
  preg_match_all("/\b[a-z0-9']+\b/", strtolower($sentence), $match);
  return array_reduce($match[0], function ($arr, $x) {
    array_key_exists($x, $arr) ? $arr[$x]++ : $arr[$x] = 1;
    return $arr;
  }, []);
}