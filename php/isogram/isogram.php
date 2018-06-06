<?php

function isIsogram($str) 
{   
    $str = preg_replace('/\s+/', '', $str);
    $str = preg_split('//u', mb_strtolower($str), null, PREG_SPLIT_NO_EMPTY);
    $arr = [];
    $check = function($x,$y) use (&$arr) {
      $rtn = in_array($y,$arr);
      $arr[] = $y;
      return $x && !$rtn;
    };
    return array_reduce($str,$check,true);
 };