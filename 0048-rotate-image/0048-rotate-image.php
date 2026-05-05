class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    // if you want to rotate clockwise, first transpose first column to first row and then reverse each row 
    // if you want to rotate anti-clockwise, first transpose last column to first row and then reverse each row
    
    // Intuition: Two-step process:
    //   1. Transpose  -> matrix[i][j] swaps with matrix[j][i] where i = n - 1 - j to get the mirror image along the main diagonal  
    //   2. Reverse each row  -> completes the 90 degree clockwise rotation
    // TC: O(n^2)  |  SC: O(1)
    function rotate(&$matrix) {
        $row = count($matrix);
        $col = count($matrix[0]);

        //convert row to column and coulm to row [j=0 => 1,4,7] -> [row=0=>1,4,7]
        //reverse each row in metrix [row=0=>1,4,7] => [4,7,1]

        //convert row to column and coulm to row 
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $i; $j++) {
            list($matrix[$j][$i], $matrix[$i][$j]) = [$matrix[$i][$j], $matrix[$j][$i]];
            }
        }

        //reverse each row in metrix
        for($rowStart = 0; $rowStart < $row; $rowStart++){
            $i=0;$j=$col-1;
            while($i < $j){
            list($matrix[$rowStart][$j], $matrix[$rowStart][$i]) = [$matrix[$rowStart][$i], $matrix[$rowStart][$j]];
            $i++; $j--;
            }
        }
            
        //for anticlockwise
            // for($j=0;$j<$row;$j++){ 
            //       $up=0; $down = $row-1;
            //       while($up<$down){
            //         list($matrix[$down][$j], $matrix[$up][$j]) = [$matrix[$up][$j], $matrix[$down][$j]];
            //         $up++; $down--;
            //       }
            //     }
    }
}