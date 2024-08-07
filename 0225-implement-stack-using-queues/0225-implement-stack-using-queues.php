class MyStack {
    /**
     */
    private $items;
    private $top;
    private $size;
    function __construct() {
        $this->items = array();
        $this->top = -1;
        $this->size = 0;
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $length = count($this->items);
        array_push($this->items, $x); //$x = 3 then 1,2,3
        if(!$this->empty()){
            for($i = 0; $i < $length; $i++){ //will perform //3,2,1
                    array_push($this->items,  $this->top()); 
                    array_shift($this->items);
            }
        }
        $this->size++;
    }
  
    /**
     * @return Integer
     */
    function pop() {
        if($this->empty()){
            return null;
        }
        $this->size--;
        $popItem = array_shift($this->items);
        return $popItem;
    }
  
    /**
     * @return Integer
     */
    function top() {
        if($this->empty()){
            return null;
        }
        return $this->items[0];
    }
  
    /**
     * @return Boolean
     */
    function empty() {
        return $this->size == 0;
    }
}

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */