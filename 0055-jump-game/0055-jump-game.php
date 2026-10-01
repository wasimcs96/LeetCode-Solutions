class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $length = count($nums);
        if($nums == 0) return false;

        //forward Approach
        // $maxIndex = 0;
        // for($i=0;$i<$length-1;$i++){
        //     if($i>$maxIndex) return false;
        //     $maxIndex = max($maxIndex, $i+$nums[$i]);
        // }
        // return $maxIndex >= $length-1 ? true : false;

        //backward approach
        $goal = $length - 1;
        for($i=$length-2; $i>=0; $i--){
            if($i + $nums[$i] >= $goal){
                $goal = $i;
            }
        }
        return $goal == 0;
    }
}