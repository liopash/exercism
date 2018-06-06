<?php

function raindrops(int $num) : string
{
  $str = '';
  if ($num % 3 === 0) {
    $str .= 'Pling';
  }
  if ($num % 5 === 0) {
    $str .= 'Plang';
  }
  if ($num % 7 === 0) {
    $str .= 'Plong';
  }
  if ($str === '') {
    $str = $num;
  }
  return $str;
};