<?php

function solve($board)
{
    $m = new Minesweeper($board);
    return $m->solve();
}

class Minesweeper
{
    protected $board;

    public function __construct(string $board)
    {
        $this->board = $board;
    }

    public function solve() : string
    {
        if (!$this->checkBoard()) {
            throw new InvalidArgumentException();
        }

        $size = strlen(explode(PHP_EOL, trim($this->board))[0]) + 1;
        $arr = str_split(trim($this->board));
        $solved = array_map(function ($i, $x) use ($arr, $size) {

            if ($x == " ") {
                $matrix = [
                    // current index //5
                    $i - 1 => $arr[$i - 1], //4
                    $i + 1 => $arr[$i + 1], //6
                    $i + $size - 1 => $arr[$i + $size - 1], //7
                    $i + $size => $arr[$i + $size], //8
                    $i + $size + 1 => $arr[$i + $size + 1], //9
                    $i - $size - 1 => $arr[$i - $size - 1], //1
                    $i - $size => $arr[$i - $size], //2
                    $i - $size + 1 => $arr[$i - $size + 1] //3
                ];
                $mineCount = count(array_filter($matrix, function ($item) {
                    return $item == "*";
                }));
                return $mineCount == 0 ? $x : $mineCount;
            } else {
                return $x;
            }
        }, array_keys($arr), $arr);

        return PHP_EOL . implode($solved) . PHP_EOL;
    }

    public function checkBoard() : bool
    {
        if (preg_match('/[^\+|\-|\||\*|\s]/', $this->board)) return false;
        $board = explode(PHP_EOL, trim($this->board));
        if (reset($board) != end($board)) return false;
        $size = strlen($board[0]);
        if ($size < 4) return false;
        return array_reduce($board, function ($acc, $item) use ($size) {
            return $acc && (strlen($item) == $size) && ($item[0] == $item[$size - 1]);
        }, true);
    }
}
