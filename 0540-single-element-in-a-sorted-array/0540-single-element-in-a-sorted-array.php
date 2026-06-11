class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        $length = count($nums);
        $left = 0;
        $right = $length - 1;

        if($length == 1) return $nums[0];

        if($nums[0] != $nums[1]) return $nums[0];
        
        if($nums[$right] != $nums[$right-1]) return $nums[$right];
        
        while($left <= $right){
            $mid = (int) (($left+$right) / 2);

            if($nums[$mid] != $nums[$mid-1] && $nums[$mid] != $nums[$mid+1]){
                break;
            }
            
            $midIsEven = ($mid+1) % 2 == 0 ? true : false;

            if($midIsEven){
                if($nums[$mid-1] == $nums[$mid]){
                    $left = $mid + 1;
                }else{
                    $right = $mid - 1;
                }
            }else{
                if($mid != $right && $nums[$mid+1] == $nums[$mid]){
                    $left = $mid + 2;
                }else{
                    $right = $mid - 2;
                }
            }
        }
        return $nums[$mid];
    }
}