class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $length = count($nums);
        if($nums == 0) return false;

        $maxIndex = 0;
        for($i=0;$i<$length-1;$i++){
            if($i>$maxIndex) return false;
            $maxIndex = max($maxIndex, $i+$nums[$i]);
        }
        return $maxIndex >= $length-1 ? true : false;
    }
}