class Solution {

    /**
     * @param Integer[] $bloomDay
     * @param Integer $m
     * @param Integer $k
     * @return Integer
     */
    function minDays($bloomDay, $m, $k) {
        $minDay = min($bloomDay); 
        $maxDay = max($bloomDay); $desireMinDays = $maxDay;

        if(count($bloomDay) < $m*$k) return -1;

        while($minDay <= $maxDay){
            $midDay = (int) (($minDay+$maxDay) / 2);
            
            $flowers = 0;$bouquet = 0;
            for($i=0;$i<count($bloomDay);$i++){
                if($bloomDay[$i] <= $midDay){
                    $flowers += 1;
                }else{
                    $bouquet += (int)($flowers/$k);
                    $flowers = 0;
                }
            }
        
            $bouquet += (int) ($flowers / $k);
            
            if($bouquet == $m) {
                $desireMinDays = min($desireMinDays, $midDay);
                $maxDay = $midDay-1;
            }
            elseif($bouquet > $m){
                $maxDay = $midDay-1;
            }else{
                $minDay = $midDay+1;
            }
        }
        return $desireMinDays;
    }

    // function isPossible($bloomDay, $day, $m, $k){
    //     $cnt = 0; $bouquets = 0;
    //     foreach ($bloomDay as $value) {
    //       if($value <= $day){
    //         $cnt++;
    //       }else{
    //         $bouquets += (int)($cnt/$k); // it is for adjustment value should be equl and grater $k...4 => 3+1
    //         $cnt = 0;
    //       }
    //     }
    //     $bouquets += (int)($cnt/$k); // if array empty with cnt value which will be equal of not with k then add in bouget if not come in else part
    //     if($bouquets >= $m) return true;
    //     return false;
    // }

    // function minDays($bloomDay, $m, $k) {
    //     $length = count($bloomDay);
    //     if($length < $m*$k) return -1;
        
    //     $low = min($bloomDay); $high = max($bloomDay); //value must be exits between low and high which are mac and min
    //     while ($low <= $high){
    //       $mid = (int)(($low + $high)/2);
    //       $isPossible = $this->isPossible($bloomDay, $mid, $m, $k);
    //       if($isPossible){
    //         $high = $mid-1;
    //       }else{
    //         $low = $mid+1;
    //       }
    //     }
    //     return $low;
    // }
}