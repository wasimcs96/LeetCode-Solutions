class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $col = count($matrix[0]);
        $row = count($matrix);

        $upRow = 0;
        $rightCol = $col-1;
        $botRow = $row-1;
        $leftCol = 0;
        $ans = [];


        while($upRow <= $botRow && $leftCol <= $rightCol){
            $j=$leftCol;
            
            while($j <= $rightCol){
              $ans[] = $matrix[$upRow][$j];
              $j++;
            }
            $upRow++;

            $i=$upRow;
            while($i <= $botRow){
              $ans[] = $matrix[$i][$rightCol];
              $i++;
            }
            $rightCol--;

            if ($upRow <= $botRow) {
              $j=$rightCol;
              while($j >= $leftCol){
                $ans[] = $matrix[$botRow][$j];
                $j--;
              }
              $botRow--;
            }

            if ($leftCol <= $rightCol) {
              $i = $botRow;
              while($i >= $upRow){
                $ans[] = $matrix[$i][$leftCol];
                $i--; 
              }
              $leftCol++;
            }
            
        }
        return $ans;
    }
}