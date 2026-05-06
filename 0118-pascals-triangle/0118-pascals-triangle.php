class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        // $arr = [[1]];
        // $i = 1;
        // while($i < $numRows){
        //     $j = 0;
        //     while($j <= $i){
        //         $previousRowSameIndexValue = $arr[$i-1][$j] ?? 0;
        //         $previousRowPreviousIndexValue = $arr[$i-1][$j-1] ?? 0;
        //         $arr[$i][$j] = $previousRowSameIndexValue + $previousRowPreviousIndexValue;
        //         $j++;
        //     }
        //     $i++;
        // }
        // return $arr;

        $ans = [];
        for($i=1; $i<=$numRows; $i++){ //for each row
            $ans[] = $this->NCR($i);
        }
        return $ans;
    }

    function NCR($n){
        $row = [];
        $val = 1;
        $row[0] = $val;
        for($k=1; $k<$n; $k++){ // nCk = nC(k-1) * (n-k+1) / k
            $val = $val * ($n - $k) / $k;
            $row[$k] = $val;
        }
        return $row;
    }
}