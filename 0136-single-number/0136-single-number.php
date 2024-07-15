class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
      $count=count($nums);
      $ans = 0;
      if($count == 1) return $nums[0];
      
      for($i=0;$i<$count;$i++){
         $ans ^= $nums[$i];
      }
      return $ans;
    }
}