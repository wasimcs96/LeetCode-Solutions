class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) {
        $result = []; $i=0; $n = count($nums); $temp = [];
        sort($nums);
        $this->subsetSumsHelper($nums, $result, $i, $n, $temp);
        return array_values($result);
    }



    function subsetSumsHelper($candidates, &$result, $i, $n, $temp){
        if($i >= $n){
            sort($temp);
            $key = implode(',', $temp);
            $result[$key] = $temp;
            return;
        }
        //exclude
        $this->subsetSumsHelper($candidates, $result, $i+1, $n, $temp);
        
        //include
        $temp[] = $candidates[$i];
        $this->subsetSumsHelper($candidates, $result, $i+1, $n, $temp);
    }
}