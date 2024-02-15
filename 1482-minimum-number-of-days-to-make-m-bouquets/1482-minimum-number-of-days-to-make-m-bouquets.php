class Solution {

    /**
     * @param Integer[] $bloomDay
     * @param Integer $m
     * @param Integer $k
     * @return Integer
     */
    function isPossible($bloomDay, $day, $m, $k){
        $cnt = 0; $bouquets = 0;
        foreach ($bloomDay as $value) {
          if($value <= $day){
            $cnt++;
          }else{
            $bouquets += (int)($cnt/$k); // it is for adjustment value should be equl and grater $k...4 => 3+1
            $cnt = 0;
          }
        }
        $bouquets += (int)($cnt/$k); // if array empty with cnt value which will be equal of not with k then add in bouget if not come in else part
        if($bouquets >= $m) return true;
        return false;
    }

    function minDays($bloomDay, $m, $k) {
        $length = count($bloomDay);
        if($length < $m*$k) return -1;
        
        $low = min($bloomDay); $high = max($bloomDay); //value must be exits between low and high which are mac and min
        while ($low <= $high){
          $mid = (int)(($low + $high)/2);
          $isPossible = $this->isPossible($bloomDay, $mid, $m, $k);
          if($isPossible){
            $high = $mid-1;
          }else{
            $low = $mid+1;
          }
        }
        return $low;
    }
}