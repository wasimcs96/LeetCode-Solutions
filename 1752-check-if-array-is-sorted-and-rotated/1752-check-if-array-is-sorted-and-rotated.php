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
            $nextIndex = (int) ($i+1) % $count; //nextIndex give 1,2,3,4,5,1 //if length 6
            if($nums[$i] > $nums[$nextIndex]) $rotatedCount++;
        }
        if($rotatedCount > 1) return false;
        else return true;
    }
}