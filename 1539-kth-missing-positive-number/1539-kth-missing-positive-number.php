class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function findKthPositive($arr, $k) {
        $low = 0; $high = count($arr)-1;
        while($low <= $high){
            $mid = (int)(($low+$high)/2);
            $remainingMissingNumber = $arr[$mid] - ($mid+1);
            if($remainingMissingNumber < $k)
                $low = $mid+1;
            else
                $high = $mid-1;
        }
        return $high+1+$k;
    }
}