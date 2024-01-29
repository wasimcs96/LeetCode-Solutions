class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $high = count($nums)-1; $low = 0;
        $ans = $this->binerySearch($nums, $low, $high, $target);
        return $ans;
    }

    function binerySearch($nums, $low, $high, $key){
        if($low > $high) return -1;

        $mid = (int) (($low+$high) / 2);

        if($nums[$mid] == $key) return $mid;
        elseif($nums[$mid] > $key) return $this->binerySearch($nums, $low, $mid-1, $key);
        else return $this->binerySearch($nums, $mid+1, $high, $key);
    }
}