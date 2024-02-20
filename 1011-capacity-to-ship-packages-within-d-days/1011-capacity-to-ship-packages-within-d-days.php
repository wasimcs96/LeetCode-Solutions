class Solution {

    /**
     * @param Integer[] $weights
     * @param Integer $days
     * @return Integer
     */
    function getPossibleShipWeight($nums, $mid, $days){
      $cnt = 0; $cntDays = 0;
      foreach ($nums as $value) {
        if($mid >= $cnt+$value){
          $cnt = $cnt + $value;
        }else{
          $cntDays++;
          $cnt = $value;
        }
      }

      if($cnt >= $mid){
        $cntDays += (int)($cnt/$mid);
      }else{
        $cntDays++;
      }
      if($cntDays <= $days) return true;
      return false;
    }

    function shipWithinDays($weights, $days) {
      $sum = array_sum($weights);
      
      $low = max($weights); $high = $sum;
      while ($low <= $high){
        $mid = (int)(($low + $high)/2);
        $isPossible = $this->getPossibleShipWeight($weights, $mid, $days);
        if($isPossible){
          $high = $mid-1;
        }else{
          $low = $mid+1;
        }
      }
      return $low;
    }
}