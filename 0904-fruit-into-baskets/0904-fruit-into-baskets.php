class Solution {

    /**
     * @param Integer[] $fruits
     * @return Integer
     */
    function totalFruitV1($fruits) {
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

    function totalFruit($fruits) {
        $length = count($fruits);

        if($length == 0) return 0;

        $maxCollection = 0; $fruitHashMap = [];
        $left = 0;
        for($right=0;$right<$length;$right++){
            $fruitHashMap[$fruits[$right]] = $right;
            $minValue = PHP_INT_MAX;
            if(count($fruitHashMap) > 2){
                $unsetKey = -1;
                foreach($fruitHashMap as $key => $value){
                    if($minValue > $value){
                        $minValue = $value;
                        $left = $value;
                        $unsetKey = $key;
                    }
                }
                unset($fruitHashMap[$unsetKey]);
                $left++;
            }
            $maxCollection = max($maxCollection, $right - $left + 1);
        }
        return $maxCollection;
    }
}