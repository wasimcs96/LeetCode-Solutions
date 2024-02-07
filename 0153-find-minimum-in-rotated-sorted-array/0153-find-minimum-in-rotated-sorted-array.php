class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $length = count($nums);
        $low = 0; $high = $length-1;
        $min = PHP_INT_MAX;
        while($low <= $high){
          $mid = (int) (($low+$high)/2);
          
          if($nums[$low] <= $nums[$high]){
            $min = min($min, $nums[$low]);
            break;
          }

          if($nums[$low] <= $nums[$mid]){
              $min = min($min, $nums[$low]);
              $low = $mid+1;
          }else{
              $min = min($min, $nums[$mid]);
              $high = $mid-1;
          }
        }
        return $min;
    }
}