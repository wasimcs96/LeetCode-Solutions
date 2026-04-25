class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function check($nums) {
        $count = count($nums);
        if($count == 0 || $count == 1) return true;

        $rotatedCount = 0;
        for($i=0;$i<$count;$i++){
            $nextIndex = (int) ($i+1) % $count;
            if($nums[$i] > $nums[$nextIndex]) $rotatedCount++;
        }
        if($rotatedCount > 1) return false;
        else return true;
    }
}