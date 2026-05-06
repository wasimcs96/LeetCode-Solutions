class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        $arr = [[1]];
        $i = 1;
        while($i < $numRows){
            $j = 0;
            while($j <= $i){
                $previousRowSameIndexValue = $arr[$i-1][$j] ?? 0;
                $previousRowPreviousIndexValue = $arr[$i-1][$j-1] ?? 0;
                $arr[$i][$j] = $previousRowSameIndexValue + $previousRowPreviousIndexValue;
                $j++;
            }
            $i++;
        }
        return $arr;
    }
}