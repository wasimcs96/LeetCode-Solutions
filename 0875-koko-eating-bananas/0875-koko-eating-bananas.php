class Solution {

    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minTimeToReachTopOfPile($piles,$mid){
        $hours = 0;
        foreach ($piles as $value) {
          $hours += ceil($value / $mid);
        }
        return $hours;
    }

    function minEatingSpeed($piles, $h) {
        $low = 1; $high = max($piles);
        while ($low <= $high){
          $mid = (int)(($low + $high)/2);
          $hours = $this->minTimeToReachTopOfPile($piles,$mid);
          if($hours <= $h){
            $high = $mid-1;
          }else{
            $low = $mid+1;
          }
        }
        return $low;
    }
}