class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
        $arrLength = count($nums);
    
        $suffixProductArr = $prefixProdcutArr = []; $suffixProduct = $prefixProdcut = 1; $answer = [];
        for($i = 0; $i < $arrLength; $i++){
            $prefixProdcut *= $nums[$i];
            $prefixProdcutArr[$i] = $prefixProdcut;

            $suffixProduct *= $nums[$arrLength - $i - 1];
            $suffixProductArr[$arrLength - $i - 1] = $suffixProduct;
        }

        for($i = 0; $i < $arrLength; $i++){
            $answer[$i] = ($prefixProdcutArr[$i-1] ?? 1) * ($suffixProductArr[$i+1] ?? 1);
        }

        return $answer;
    }
}