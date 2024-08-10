//O(n) approch
// class MinStack {
//     /**
//      */
//     public $stack = [];
//     public $top = -1;
//     function __construct() {
        
//     }
  
//     /**
//      * @param Integer $val
//      * @return NULL
//      */
//     function push($val) {
//         array_push($this->stack, $val);
//         $this->top++;
//     }
  
//     /**
//      * @return NULL
//      */
//     function pop() {
//         $this->top--;
//         return !empty($this->stack) ?  array_pop($this->stack) : null;
//     }
  
//     /**
//      * @return Integer
//      */
//     function top() {
//         return !empty($this->stack) ?  $this->stack[$this->top] : null;
//     }
  
//     /**
//      * @return Integer
//      */
//     function getMin() {
//         // $min = PHP_INT_MAX;
//         // for ($i = $this->top; $i >= 0; $i--) {
//         //     $min = min($min, $this->stack[$i]);
//         // }
//         // return $min;
//         if(!empty($this->stack)) {
//             $temp = $this->stack;
//             sort($temp);
//             return $temp[0];
//         }
//         return null;
//     }
// }

//Time Complexity: O(1)
//Space Complexity: O(2N)
// class Pair {
//     public int $x, $y;
//     function __construct(int $x, int $y) {
//         $this->x = $x;
//         $this->y = $y;
//     }
// }
// class MinStack {
//     private $stack;

//     public function __construct() {
//         $this->stack = [];
//     }

//     public function push($x) {
//         $min = empty($this->stack) ? $x : min(end($this->stack)->y, $x);
//         array_push($this->stack, new Pair($x, $min));

//     }

//     public function pop() {
//         array_pop($this->stack);
//     }

//     public function top() {
//         return empty($stack) ? end($this->stack)->x : null;
//     }

//     public function getMin() {
//         return empty($stack) ? end($this->stack)->y : null;
//     }
// }

// Time Complexity: O(1)
// Space Complexity: O(N)
class MinStack {
    private $st;
    private $mini;

    public function __construct() {
        $this->st = [];
        $this->mini = PHP_INT_MAX;
    }

    public function push($value) {
        $val = (int)$value;
        if (empty($this->st)) {
            $this->mini = $val;
            array_push($this->st, $val);
        } else {
            if ($val < $this->mini) {
                array_push($this->st, 2 * $val - $this->mini);
                $this->mini = $val;
            } else {
                array_push($this->st, $val);
            }
        }
    }

    public function pop() {
        if (empty($this->st)) return;

        $val = array_pop($this->st);
        if ($val < $this->mini) {
            $this->mini = 2 * $this->mini - $val;
        }
    }

    public function top() {
        $val = end($this->st);
        if ($val < $this->mini) {
            return $this->mini;
        }  
        return $val;
    }

    public function getMin() {
        return $this->mini;
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */