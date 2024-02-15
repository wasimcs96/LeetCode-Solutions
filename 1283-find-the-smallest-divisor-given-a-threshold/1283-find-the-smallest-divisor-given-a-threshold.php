class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $threshold
     * @return Integer
     */
    function getDevision($nums, $mid, $threshold){
        $cnt = 0;
        foreach ($nums as $value) {
          $cnt += ceil($value/$mid);
        }
        if($cnt <= $threshold) return true;
        return false;
    }

    function smallestDivisor($nums, $threshold) {
        $sum = array_sum($nums);
        if($sum < $threshold) return 1;
        $low = 1; $high = max($nums); //defined low and high for binery serach
        while ($low <= $high){
          $mid = (int)(($low + $high)/2);
          $isPossible = $this->getDevision($nums, $mid, $threshold);
          if($isPossible){
            $high = $mid-1;
          }else{
            $low = $mid+1;
          }
        }
        return $low; //send always lowest value
    }
}