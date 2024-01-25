class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        sort($nums); //using sort in O(n)

        $length = count($nums);
        for($i=0;$i<$length;$i++){
          if($nums[$i] != $i) break;
        }

        return $i;

        //sum of n ((N * (N+1))/2 ) and minus arr[i] from sum of array and end of loop sum will give missing value
    }
}