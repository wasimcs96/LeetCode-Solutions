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
            $missingNumberTillMid = $arr[$mid] - ($mid+1);
            if($missingNumberTillMid < $k)
                $low = $mid+1;
            else
                $high = $mid-1;
        }
        //ANSWER WILL BE arr[$high]+$remainingMissingNumber;
        //$remainingMissingNumber = $k-$missingNumberTillMid
        //arr[$high]+$k-$missingNumberTillMid =>incase of high = -1 it will not work
        //arr[$high]+$k-($arr[$high] - ($high+1))
        return $high+1+$k;
    }
}