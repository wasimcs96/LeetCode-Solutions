class MinStack {
    /**
     */
    public $stack = [];
    public $top = -1;
    function __construct() {
        
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        array_push($this->stack, $val);
        $this->top++;
    }
  
    /**
     * @return NULL
     */
    function pop() {
        $this->top--;
        return !empty($this->stack) ?  array_pop($this->stack) : null;
    }
  
    /**
     * @return Integer
     */
    function top() {
        return !empty($this->stack) ?  $this->stack[$this->top] : null;
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        // $min = PHP_INT_MAX;
        // for ($i = $this->top; $i >= 0; $i--) {
        //     $min = min($min, $this->stack[$i]);
        // }
        // return $min;
        if(!empty($this->stack)) {
            $temp = $this->stack;
            sort($temp);
            return $temp[0];
        }
        return null;
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