class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
      $length = count($nums);
      $low =0; $high = $length-1;


      if($length == 1 || $nums[$low] > $nums[$low+1]) return 0;
      if($nums[$high] > $nums[$high-1]) return $high;

      while($low <= $high){
        $mid = (int) (($low+$high)/2);

        if($nums[$mid] > $nums[$mid-1] && $nums[$mid] > $nums[$mid+1])
          return $mid;

        if($nums[$mid] > $nums[$mid-1]){
          $low = $mid + 1;
        }else{
          $high = $mid - 1;
        }
      }

      return $mid;
    }
}