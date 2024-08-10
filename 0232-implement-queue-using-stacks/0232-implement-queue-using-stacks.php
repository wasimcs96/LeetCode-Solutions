class MyQueue {
    /**
     */
    public $stacks = array();
    function __construct() {
        
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) { //add element at starting point
        // $temp = array_reverse($this->stacks);
        // $this->stacks = [];
        // array_push($this->stacks, $x);
        // $this->stacks = array_merge($this->stacks, array_reverse($temp));

        $temp = $this->stacks;
        array_unshift($temp, $x);
        $this->stacks = $temp;
        return null;
    }
  
    /**
     * @return Integer
     */
    function pop() {
        $popElement = !$this->empty() ? array_pop($this->stacks) : null;
        return $popElement;
    }
  
    /**
     * @return Integer
     */
    function peek() {
        return !$this->empty() ? $this->stacks[count($this->stacks) - 1] : null;
    }
  
    /**
     * @return Boolean
     */
    function empty() {
        return count($this->stacks) == 0;
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */