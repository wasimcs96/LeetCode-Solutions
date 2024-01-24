class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $high = count($nums)-1; $low = 0; $key=$target; $ans = -1;
        $fiestIndex = $this->searchFirstInsert($nums, $low, $high, $key, $ans);
        $secondIndex = $this->searchSecondInsert($nums, $low, $high, $key, $ans);
        return [$fiestIndex, $secondIndex];
    }

    function searchFirstInsert($nums, $low, $high, $key, $ans){
        if($low > $high) return $ans;
      
        $mid = (int) (($low+$high) / 2);

        if($nums[$mid] == $key ) {
            $ans = $mid;
            return $this->searchFirstInsert($nums, $low, $mid-1, $key, $ans);
        }
        else if($nums[$mid] > $key){
            return $this->searchFirstInsert($nums, $low, $mid-1, $key, $ans);
        }else{
            return $this->searchFirstInsert($nums, $mid+1, $high, $key, $ans);
        }
    }

    function searchSecondInsert($nums, $low, $high, $key, $ans){
        if($low > $high) return $ans;
      
        $mid = (int) (($low+$high) / 2);

        if($nums[$mid] == $key ) {
            $ans = $mid;
            return $this->searchSecondInsert($nums, $mid+1, $high, $key, $ans);
        }
        else if($nums[$mid] > $key){
            return $this->searchSecondInsert($nums, $low, $mid-1, $key, $ans);
        }else{
            return $this->searchSecondInsert($nums, $mid+1, $high, $key, $ans);
        }
    }
}