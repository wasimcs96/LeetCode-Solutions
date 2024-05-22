class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        $result = []; $i=0; $tempArr = [];
        $this->combinationSumRecursive($candidates, $target, $i, $tempArr, $result);
        return $result;
    }
    
    function combinationSumRecursive($candidates, $target, $i, $tempArr, &$result){
        if($i >= count($candidates)){
            return;
        }

        if(array_sum($tempArr) == $target){
            $result[] = $tempArr;
            return;
        }elseif(array_sum($tempArr) > $target){
            return;
        }else{
            $tempArr[] = $candidates[$i];
        }

        $this->combinationSumRecursive($candidates, $target, $i, $tempArr, $result);

        array_pop($tempArr);
        $this->combinationSumRecursive($candidates, $target, $i+1, $tempArr, $result);

        return;
    }
}