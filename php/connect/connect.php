<?php

function resultFor($board)
{
    $hex = new Hex($board);
    return $hex->pathfinder();
}

class Hex
{

    public $board;
    public $width;
    public $height;
    public $length;
    public $path;

    public function __construct($board)
    {

        $this->board = $board;
        $this->width = strlen($this->board[0]);
        $this->height = count($this->board);
        $this->length = count($this->flatten($this->board));
        $this->path = [];

    }

    public function flatten()
    {

        return str_split(array_reduce($this->board, function ($x, $y) {
            return $x . $y;
        }, ""));

    }

    public function pathfinder($color = ".", $i = 0, $path = [])
    {

        $size = $this->width;
        $board = $this->flatten();
        $len = ($this->length - $this->width);
        $w_success = array_keys(array_slice($board, (-1 * $size), $size, true));
        $b_success = array_keys(array_filter($board, function ($x) use ($size) {
            return $x % $size - ($size - 1) == 0;
        }, ARRAY_FILTER_USE_KEY));
        $w_valid = array_keys(array_slice($board, 0, $size, true));
        $b_valid = array_keys(array_filter($board, function ($x) use ($size) {
            return $x % $size == 0;
        }, ARRAY_FILTER_USE_KEY));

        if ($i == $this->length) {
            return null;
        }

        $current = $board[$i]; //5
        $color = $current;

        if ($this->length == 1) {
            switch ($current) {
                case 'X':
                    return 'black';
                    break;
                case 'O':
                    return 'white';
                    break;
                default:
                    return null;
                    break;
            }
        }

        if ($current == '.') return $this->pathfinder($color, $i + 1, []);

        $path[$i] = $current;
        $path_keys = array_keys($path);

        if ($color == "O" && in_array(end($path_keys), $w_success) && array_intersect($path_keys, $w_valid)) {

            return 'white';

        } else if ($color == "X" && in_array(end($path_keys), $b_success) && array_intersect($path_keys, $b_valid)) {

            return 'black';

        }

        $cc = function ($x) use ($len, $size) {
            if ($x > 0 && $x < ($len + $size)) {
                return $x;
            } else {
                return 0;
            }
        };
      
      //    2  3
      //  4   5   6
      //    7  8 

        $possible = [
            $cc($i - 1) => $board[$cc($i - 1)], //4
            $cc($i + 1) => $board[$cc($i + 1)], //6
            $cc($i + $size - 1) => $board[$cc($i + $size - 1)], //7
            $cc($i + $size) => $board[$cc($i + $size)], //8
            $cc($i - $size) => $board[$cc($i - $size)], //2
            $cc($i - $size + 1) => $board[$cc($i - $size + 1)] //3
        ];

        $possible = array_diff_assoc(array_filter($possible), $path);

        $match = array_filter($possible, function ($x) use ($color) {
            return $x == $color;
        });

        foreach ($match as $k => $v) {

            if (!in_array($k, $path)) {
                return $this->pathfinder($color, $k, $path);
            }

        }

        return $this->pathfinder($color, key($path) + 1, []);

    }


}