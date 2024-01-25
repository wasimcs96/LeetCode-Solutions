class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
  function rotate(&$nums, $k) {
    $length = count($nums);
    if($k > 0){
      if($k > $length) $k=$k%$length;
      $n = count($nums)-1;
      $this->reverse($nums, $n-$k+1, $n);
      $this->reverse($nums, 0, $n-$k);
      $this->reverse($nums, 0, $n);
    }
  }

  function reverse(&$nums, $st, $ed){
    while($st < $ed){
      list($nums[$ed], $nums[$st]) = [$nums[$st], $nums[$ed]];
      $st++;
      $ed--;
    }
  }
}