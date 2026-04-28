class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        //Approch-1 - HashMap
        //Approch-2 - XOR
        //Intuition: XOR of a number with itself = 0; XOR with 0 = itself.
        //All duplicates cancel out -> only the unique element remains.
        //TC: O(n)  |  SC: O(1)
        $count=count($nums);
        $ans = 0;
        if($count == 1) return $nums[0];
        
        for($i=0;$i<$count;$i++){
            $ans ^= $nums[$i]; //a^a=0, a^0=a -> duplicates cancel
        }
        return $ans;
    }
}