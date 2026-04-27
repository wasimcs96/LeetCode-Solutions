class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $arrLength = count($nums);
        if($arrLength == 0 || $arrLength == 1) return;

        $i=$j=0;
        while($j<$arrLength){
            if($nums[$j] != 0){
                list($nums[$i], $nums[$j]) = [$nums[$j], $nums[$i]];
                $i++;
            }
            $j++;
        }
    }
}