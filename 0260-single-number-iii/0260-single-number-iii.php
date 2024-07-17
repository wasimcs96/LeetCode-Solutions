class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function singleNumber($nums) {
        $length = count($nums);

        $XOR = 0;
        for($i = 0; $i < $length; $i++){
            $XOR = $XOR ^ $nums[$i];
        }
        $rightMostSetBit = ($XOR & $XOR-1) ^ $XOR;
        $setNotBitBucket = $setBitBucket = 0;
        for($i = 0; $i < $length; $i++){
           if($rightMostSetBit & $nums[$i]) $setBitBucket ^= $nums[$i];
           else $setNotBitBucket ^= $nums[$i];
        }

        return [$setBitBucket, $setNotBitBucket];
        
    }
}