class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
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
    }
}