class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $high = count($nums)-1; $low = 0;
        if(count($nums) == 0)  return [-1, -1];

        $floorValue = $this->findFirst($nums, $low, $high, $target, $low);
        $ceilingValue  = $this->findLast($nums, $low, $high, $target, $high);

        if($floorValue > $high || $nums[$floorValue] != $target || $ceilingValue < 0) 
            return [-1, -1];
        else 
            return [$floorValue, $ceilingValue];
    }
    

  


    function findFirst(array $nums, int $low, int $high, int $key, int $ans): int {
        if($low > $high) return $ans;

        $mid = (int) (($low+$high) / 2);

        if($nums[$mid] >= $key) {
            $ans = $mid;
            return $this->findFirst($nums, $low, $mid-1, $key, $ans);
        }
        else return $this->findFirst($nums, $mid+1, $high, $key, $ans);
    }

    function findLast(array $nums, int $low, int $high, int $key, int $ans): int {
        if($low > $high) return $ans;

        $mid = (int) (($low+$high) / 2);

        if($nums[$mid] <= $key) {
            $ans = $mid;
            return $this->findLast($nums, $mid+1, $high, $key, $ans);
        }
        else return $this->findLast($nums, $low, $mid-1, $key, $ans);
    }

}