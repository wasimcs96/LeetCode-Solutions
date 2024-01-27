class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {

      $row = count($matrix);
      $col = count($matrix[0]);
      $hash = [];

      for($i = 0; $i < $row; $i++){
        for($j = 0; $j < $col; $j++){
          if($matrix[$i][$j] == 0){
            $hash[] = $i."-".$j;
          }
        }
      }

      foreach($hash as $value){
        $rowColum = explode('-', $value);
        $this->makeZero($rowColum[0], $rowColum[1], $row, $col, $matrix);
      }
    }

    function makeZero($ic, $jc, $row, $col, &$num){
      // for($i = 0; $i < $row; $i++){
      //   for($j = 0; $j < $col; $j++){
      //     if($i == $ic || $j == $jc){
      //       $num[$i][$j] = 0;
      //     }
      //   }
      // }
      //while take less time compare for loops
        $x=$ic;
        $y=0;
        //up to dwon change column values 
        while($y < $col){
          $num[$x][$y] = 0;
          $y++;
        }

        $x=0;
        $y=$jc;
        //<--> left to right change row values
        while($x < $row){
          $num[$x][$y] = 0;
          $x++;
        }
    }
}