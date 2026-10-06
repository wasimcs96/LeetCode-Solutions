class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) {
        $matrix = [];

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                // Assign a value (e.g., 0, or a calculated value like $i * $j)
                $matrix[$i][$j] = 0; 
            }
        }

        $col = count($matrix[0]);
        $row = count($matrix);

        $upRow = 0;
        $rightCol = $col-1;
        $botRow = $row-1;
        $leftCol = 0;
        $ans = [];

        $counter = 0;

        while($upRow <= $botRow && $leftCol <= $rightCol && $counter <= $n*$n){
            $j=$leftCol;
            
            while($j <= $rightCol){
              $matrix[$upRow][$j] = ++$counter;
              $j++;
            }
            $upRow++;

            $i=$upRow;
            while($i <= $botRow){
              $matrix[$i][$rightCol] = ++$counter;
              $i++;
            }
            $rightCol--;

            if ($upRow <= $botRow) {
              $j=$rightCol;
              while($j >= $leftCol){
                $matrix[$botRow][$j] = ++$counter;
                $j--;
              }
              $botRow--;
            }

            if ($leftCol <= $rightCol) {
              $i = $botRow;
              while($i >= $upRow){
                $matrix[$i][$leftCol] = ++$counter;
                $i--; 
              }
              $leftCol++;
            }
            
        }
        return $matrix;
    }
}