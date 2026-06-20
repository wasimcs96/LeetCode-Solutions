class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $threshold
     * @return Integer
     */
    function smallestDivisor(array $nums, int $threshold) {
        $minDivisor = 1;
        $maxDivisor = max($nums);
        $answer = max($nums); //PHP_INT_MAX;

        $sum = array_sum($nums);
        if($sum < $threshold) return 1; 

        while($minDivisor <= $maxDivisor){
            $midDivisor = (int)(($minDivisor + $maxDivisor)/2);
            $tempDivisor = $this->getDivisor($nums, $midDivisor);

            if($tempDivisor <= $threshold){
                $answer = $midDivisor;
                $maxDivisor = $midDivisor - 1;
            }else{
                $minDivisor = $midDivisor + 1;
            }
        }
        return $answer;
    }

    function getDivisor(array $nums, int $divisor){
        $cnt = 0;
        for($i=0;$i<count($nums); $i++){
            $cnt += ceil($nums[$i] / $divisor);
        }
        return $cnt;
    }

    // function getDevision($nums, $mid, $threshold){
    //     $cnt = 0;
    //     foreach ($nums as $value) {
    //       $cnt += ceil($value/$mid);
    //     }
    //     if($cnt <= $threshold) return true;
    //     return false;
    // }

    // function smallestDivisor($nums, $threshold) {
    //     $sum = array_sum($nums);
    //     if($sum < $threshold) return 1;
    //     $low = 1; $high = max($nums); //defined low and high for binery serach
    //     while ($low <= $high){
    //       $mid = (int)(($low + $high)/2);
    //       $isPossible = $this->getDevision($nums, $mid, $threshold);
    //       if($isPossible){
    //         $high = $mid-1;
    //       }else{
    //         $low = $mid+1;
    //       }
    //     }
    //     return $low; //send always lowest value
    // }
}