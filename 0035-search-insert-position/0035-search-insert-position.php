class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $high = count($nums)-1; $low = 0; $key=$target;
        $ans = $this->binerySearch($nums, $low, $high, $key, $high+1); //$high+1 = default ans set high boound
        return $ans;
    }

    function binerySearch($nums, $low, $high, $key, $ans){
      if($low > $high) return $ans;
      
      $mid = (int) (($low+$high) / 2);

      if($nums[$mid] >= $key) {
          $ans = $mid;
          return $this->binerySearch($nums, $low, $mid-1, $key, $ans);
      }
      else {
          return $this->binerySearch($nums, $mid+1, $high, $key, $ans);
      }
          
    }
}