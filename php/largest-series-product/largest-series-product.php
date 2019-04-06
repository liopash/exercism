<?php

class Series
{
  
  public function __construct($sequence)
  {
    if (preg_match("/[^0-9]+/", $sequence)) throw new InvalidArgumentException();
    $this->sequence = str_split($sequence);
  }

  public function largestProduct($offset)
  {
    if ($offset < 0 || count($this->sequence) < $offset
      || ($this->sequence[0] == '' && $offset > 0)) throw new InvalidArgumentException();
    array_walk($this->sequence, function ($val, $i) use (&$p, $offset) {
      $p[] = array_slice($this->sequence, $i, $offset);
    });
    $p = array_map(function ($x) use ($offset) {
      return (count($x) == $offset) ? array_product($x) : 0;
    }, $p);
    return max($p);
  }

}