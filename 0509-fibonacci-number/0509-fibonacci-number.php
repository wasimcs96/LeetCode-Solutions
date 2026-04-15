class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        if($n == 0) return 0;
        if($n == 1) return 1;

        $fib = $this->fib($n-1)+$this->fib($n-2);
        return $fib;
    }
}