class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums) {
        $max = 0;
        $tempCount = 0;
        $length = count($nums);
        for($i=0; $i<$length; $i++){
            if($nums[$i] == 1)  
                $tempCount++;
            else                
                $tempCount = 0;

            $max = max($max, $tempCount);
        }
        return $max;
    }
}