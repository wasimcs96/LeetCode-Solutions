class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
        $arrLength = count($nums);
    
        // $suffixProductArr = $prefixProdcutArr = []; $suffixProduct = $prefixProdcut = 1; $answer = [];
        // for($i = 0; $i < $arrLength; $i++){
        //     $prefixProdcut *= $nums[$i];
        //     $prefixProdcutArr[$i] = $prefixProdcut;

        //     $suffixProduct *= $nums[$arrLength - $i - 1];
        //     $suffixProductArr[$arrLength - $i - 1] = $suffixProduct;
        // }

        // for($i = 0; $i < $arrLength; $i++){
        //     $answer[$i] = ($prefixProdcutArr[$i-1] ?? 1) * ($suffixProductArr[$i+1] ?? 1);
        // }

        $answer[0] = 1;
        for($i = 1; $i < $arrLength; $i++){
            $answer[$i] = $answer[$i-1] * $nums[$i-1];
        }
        $suffixProduct = 1;
        for($i = $arrLength-1; $i >= 0; $i--){
            $answer[$i] = $answer[$i] * $suffixProduct;
            $suffixProduct *= $nums[$i];
        }

        return $answer;
    }
}