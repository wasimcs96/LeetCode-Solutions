class Solution {

    /**
     * @param Integer[] $fruits
     * @return Integer
     */
    function totalFruit($fruits) {
        $length = count($fruits);

        if($length == 0) return 0;

        $maxCollection = 0; $fruitHashMap = [];
        $left = 0;
        for($right=0;$right<$length;$right++){
            if(isset($fruitHashMap[$fruits[$right]])){
                $fruitHashMap[$fruits[$right]]++;
            }else{
                $fruitHashMap[$fruits[$right]] = 1;
            }

            while($left <= $right && count($fruitHashMap) > 2){
                
                $fruitHashMap[$fruits[$left]]--;

                if($fruitHashMap[$fruits[$left]] == 0) {
                    unset($fruitHashMap[$fruits[$left]]);
                }
                
                $left++;
            }
            
            $maxCollection = max($maxCollection, $right - $left + 1);
        }
        return $maxCollection;
    }
}