class Solution {

    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeed($piles, $h) {
        $left = 1; 
        $right = max($piles); $ans = 0;

        while($left <= $right){
            $mid = (int) (($left+$right) / 2);
            $tempHour = 0;
            for($i=0;$i<count($piles);$i++){
                $tempHour += ceil( $piles[$i] / $mid);
            }

            if($tempHour == $h){
                $ans = min($mid, $ans);
                $right = $mid-1;
            }elseif($tempHour > $h){
                //$ans = $mid;
                $left = $mid + 1;
            }else{
                $right = $mid-1;
            }
        }
        return $left;
    }
}