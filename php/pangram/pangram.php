<?php

function isPangram($str) 
{
    $str = strtolower(preg_replace('/[[:^print:]]/', '', $str));
    $every = function($x,$y) use ($str) {
      return $x && in_array($y,str_split($str));
    };
    return array_reduce(range('a','z'),$every,true);
  }