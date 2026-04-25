class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        //APP-1
        // $result = [];
        // foreach ($nums as $num) {
        //     if (!in_array($num, $result)) {
        //         $result[] = $num;
        //     }
        // }
        // $nums = $result;
        // return count($result);

        //APP-2
        $length = count($nums);
        if($length == 1 || $length == 0) return $length;

        $i=0;$j=1;
        // Dry Run  ->  $nums = [-4, -4, 0, 0, 1, 1, 1, 2, 2, 3, 3, 4]
        // i=0(-4), j scans:
        //   j=1: -4==-4 skip
        //   j=2:  0!=-4 -> i=1, nums[1]=0
        //   j=3:  0==0  skip
        //   j=4:  1!=0  -> i=2, nums[2]=1
        //   ...continues until all uniques written
        // Output array: [-4,0,1,2,3,4,...], returns 6
        while($j<$length){
            if($nums[$i] != $nums[$j]){
                $i++;
                $nums[$i] = $nums[$j];
            }
            $j++;
        }
        return $i+1;
    }
}