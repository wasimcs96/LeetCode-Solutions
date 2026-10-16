class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        $arrLength = count($nums);
        if($arrLength == 0) return 0;

        // $result = $nums[0];
        // for($i=0;$i<$arrLength;$i++){
        //     $p = $nums[$i];
        //     for($j=$i+1;$j<$arrLength;$j++){
        //         $result = max($result, $p);
        //         $p *= $nums[$j];
        //     }
        //     $result = max($result, $p);
        // }
        // return $result;

        $preFixProduct = $suffixProduct = 1; $maxProduct = -2147483648;
        
        for($i=0;$i<$arrLength;$i++){
            $preFixProduct = $preFixProduct*$nums[$i];
            $suffixProduct = $suffixProduct*$nums[$arrLength-$i-1];

            $maxProduct = max($maxProduct, $preFixProduct, $suffixProduct);

            if($preFixProduct == 0) $preFixProduct = 1;
            if($suffixProduct == 0) $suffixProduct = 1;
        }

        return $maxProduct;
    }
}