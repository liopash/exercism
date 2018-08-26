<?php 

class Clock
{
    private $h;
    private $m;
    
    public function __construct($h = 0, $m = 0)
    {
        $this->clocker($h, $m);
    }

    private function clocker($h, $m)
    {
        $this->h = (24 + ($h + intval($m / 60) + ($m < 0 ? -1 : 0)) % 24) % 24;
        $this->m = (60 + $m % 60) % 60;
    }

    public function __toString()
    {
        $fn = function ($x) {
            return ($x < 10) ? "0" . $x : $x;
        };
        return $fn($this->h) . ":" . $fn($this->m);
    }

    public function add($m)
    {
        $this->clocker($this->h, $this->m + $m);
        return $this;
    }

    public function sub($m)
    {
        $this->clocker($this->h, $this->m - $m);
        return $this;
    }
}
