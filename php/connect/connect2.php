//<?

class Hex {

    public $board;
    public $width;
    public $height;
    public $length;
    public $path;
   
     
    public function __construct($board) {

      $this->board = $this->makeBoard($board);
      $this->width = strlen($this->board[0]);
      $this->height = count($this->board);
      $this->length = count($this->flatten($this->board));
      $this->path = [];

    }

    public function makeBoard($board) {
         
      return array_map(function ($line) {
        return str_replace(" ", "", $line);
        }, $board);
      
    }

    public function flatten() {
      
      return str_split(array_reduce($this->board, function ($x, $y) {
        return $x . $y;
        }, ""));

    }

    public function drawPath() {
      $arr_full = array_fill(0, $this->length, ".");
      $this->path = array_replace($arr_full, $this->path);
      $this->path = array_chunk($this->path, $this->width);
      return array_map('implode', $this->path);
    }

   public function pathfinder($color, $i = 0, $path = []) { 
      
      $size = $this->width;
      
      $board = $this->flatten();
      
      $len = ($this->length - $this->width);

      $w_success = array_keys(array_slice($board,(-1 * $size),$size, true));

      $b_success = array_keys(array_filter($board, function($x) use ($size) {
                     return $x % $size - ($size - 1)  == 0;
      },ARRAY_FILTER_USE_KEY));

      $current = $board[$i]; //5

      if ($current != $color) return $this->pathfinder($color, $i + 1, $path);

      $path[$i] = $current;
      $path_keys = array_keys($path);

      if ($color == "O" && in_array(end($path_keys),$w_success)) {
         $this->path = $path;
         return 'white';
      } else if ($color == "X" && in_array(end($path_keys),$b_success)) {
        $this->path = $path;
        return 'black';

      }
      
      //    2  3
      //  4   5   6
      //    7  8 

      $possible = [
        $i - 1 => $board[$i - 1], //4
        $i + 1 => $board[$i + 1], //6
        $i + $size - 1 => $board[$i + $size - 1], //7
        $i + $size => $board[$i + $size], //8
        $i - $size => $board[$i - $size], //2
        $i - $size + 1 => $board[$i - $size + 1] //3
      ];

      $possible = array_diff_assoc(array_filter($possible), $path);

      $match = array_filter($possible,function($x) use ($color) {          
            return $x == $color;
            });

            


      foreach ($match as $k => $v) {
      print_r($k . PHP_EOL);      
      if (!in_array($k, $path) ) {
        echo ;
        return $this->pathfinder($color, $k, $path);
      } 

      }
    }

  public function winner() {
    
  }
}

    $lines = array(
            "O O . .",
            " X X X X",
            "  O X O .",
            "   O O X .",
            "    X O O O"
        );

$b = new Hex($lines);

var_dump($b->pathfinder("X"));
print_r($b->drawPath());


