class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        $arrLength = count($nums);
        if($arrLength == 0) return 0;

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