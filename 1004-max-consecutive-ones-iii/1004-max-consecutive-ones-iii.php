class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function longestOnes($nums, $k) {
        $length = count($nums);
        if($length == 0) return 0;

        $left = $right = 0; $maxWindowLength = 0; $bineryHashArray = [0=>0,1=>0];

        while($right < $length){
            $bineryHashArray[$nums[$right]]++;
            $counterOfZero = $bineryHashArray[0];
            while($counterOfZero > $k){
                if($nums[$left] == 0) {
                    $counterOfZero--;
                }
                $left++;
            }
            $bineryHashArray[0] = $counterOfZero;

            $windowLength = $right - $left + 1;
            $maxWindowLength = max($maxWindowLength, $windowLength);
            $right++;
        }

        return $maxWindowLength;
    }
}