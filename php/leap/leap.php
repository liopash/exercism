<?php 

function isLeap($year)
{
  return !($year % 4) && (($year % 100 != 0) || !($year % 400));
}