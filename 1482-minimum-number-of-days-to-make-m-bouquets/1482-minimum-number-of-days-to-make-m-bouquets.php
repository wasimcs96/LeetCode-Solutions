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
}