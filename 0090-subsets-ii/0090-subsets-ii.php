class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) {
        $result = []; $i=0; $n = count($nums); $temp = [];
        sort($nums);
        $this->subsetsWithDupHelper($nums, $result, $i, $n, $temp);
        return array_values($result);
    }



    function subsetsWithDupHelper($candidates, &$result, $i, $n, $temp){
        if($i >= $n){
            sort($temp);
            $key = implode(',', $temp);
            $result[$key] = $temp;
            return;
        }
        //exclude
        $this->subsetsWithDupHelper($candidates, $result, $i+1, $n, $temp);
        
        //include
        $temp[] = $candidates[$i];
        $this->subsetsWithDupHelper($candidates, $result, $i+1, $n, $temp);
    }
}