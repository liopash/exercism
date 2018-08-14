<?php

require "connect.php";

class ConnectTest extends PHPUnit\Framework\TestCase
{
    /**
     * Strip off the spaces which are only for readability.
     */
    private function makeBoard($lines)
    {
        return array_map(function ($line) {
            return str_replace(" ", "", $line);
        }, $lines);
    }

    public function testSpiralBlackWins()
    {
        $lines = array(
            "OXXXXXXXX",
            "OXOOOOOOO",
            "OXOXXXXXO",
            "OXOXOOOXO",
            "OXOXXXOXO",
            "OXOOOXOXO",
            "OXXXXXOXO",
            "OOOOOOOXO",
            "XXXXXXXXO"
        );
        $this->assertEquals("black", resultFor($this->makeBoard($lines)));
    }
    
}
