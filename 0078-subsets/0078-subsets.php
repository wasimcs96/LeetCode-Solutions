class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $ans = $output = [];
        $this->powerSet($nums, $output, 0, $ans);
        return $ans;
    }
    function powerSet($arr, $output, $index, &$ans){
        if($index >= count($arr)){
            $ans[] = $output;
            return ;
        }
        //exclude
        $this->powerSet($arr, $output, $index+1, $ans);

        //incude
        $output[] = $arr[$index];
        $this->powerSet($arr, $output, $index+1, $ans);
    }
}