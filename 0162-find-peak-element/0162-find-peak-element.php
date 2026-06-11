class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        $length = count($nums);
        $left = 0; 
        $right = $length - 1; $allPeakIndex = [];

        if($length == 1) return 0; //$allPeakIndex[] = 0;

        if($nums[0] > $nums[1]){
            return 0; //$allPeakIndex[] = 0;
        }
        if($nums[$right] > $nums[$right-1]){
            return $right;  //$allPeakIndex[] = $right; 
        }
        while($left <= $right){
            $mid = (int) (($left+$right) / 2);

            if($nums[$mid] > $nums[$mid+1] && $nums[$mid] > $nums[$mid-1]){
                return $mid;   //$allPeakIndex[] = $mid;
            }

            if($nums[$mid-1] < $nums[$mid]){
                $left = $mid+1;
            }else{
                $right = $mid-1;
            }
        }
        return $mid;
    }
}