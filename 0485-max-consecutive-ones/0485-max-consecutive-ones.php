class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums) {
        $max = 0;
        $tempCount = 0;

        for($i=0;$i<count($nums);$i++){
            if($nums[$i] == 1)  $tempCount++;
            else                $tempCount = 0;

            $max = max($max, $tempCount);
        }
        return $max;
    }
}