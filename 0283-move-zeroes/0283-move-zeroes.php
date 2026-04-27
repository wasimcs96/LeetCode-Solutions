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
        // Dry Run  ->  $nums = [0, 1, 0, 3, 12]
        // j=0: 0 skip
        // j=1: 1!=0 -> swap(nums[0],nums[1]) -> [1,0,0,3,12], i=1
        // j=2: 0 skip
        // j=3: 3!=0 -> swap(nums[1],nums[3]) -> [1,3,0,0,12], i=2
        // j=4: 12!=0-> swap(nums[2],nums[4]) -> [1,3,12,0,0], i=3
        // Output: [1,3,12,0,0]
    }
}