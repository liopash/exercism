<?php 

function plus($x,$y) { return $x + $y;}
function minus($x,$y) { return $x - $y;}
function multiplied($x,$y) { return $x * $y;}
function divided($x,$y) { return $x / $y;}

function calculate($sentence) 
{

  $sentence = explode(' ',strtolower(trim($sentence,'?')));
  $words = ['plus','minus','multiplied','divided' ];
  $numbers = array_filter($sentence,'is_numeric');
  
  if (count($numbers) < 2) throw new InvalidArgumentException;

  $fn = function($x) use ($words) {
    return in_array($x, $words);
  };
  $math_fns = array_filter($sentence, $fn);

  $pass_math_fn = function($math_fn) use (&$numbers) {
    
    list($a,$b) = array_values($numbers);
    array_splice($numbers,0,2);
    array_unshift($numbers,$math_fn($a,$b));
    
  };
    
  array_map($pass_math_fn, $math_fns);  

  return $numbers[0];
}
