class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $low = 0; $high = count($nums)-1;
        return $this->recursive($nums, $low, $high, $target);
    }

    function recursive (array $arr, int $low, int $high, int $k){
        if($low > $high) return -1;
        $mid = (int) (($low+$high) / 2);
        if($arr[$mid] == $k) return $mid;
        if($arr[$mid] > $k) $high = $mid - 1;
        if($arr[$mid] < $k) $low = $mid + 1;
        return $this->recursive($arr, $low, $high, $k);
    }
}