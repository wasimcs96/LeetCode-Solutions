class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
          $romanMap = ['I' => 1, 'IV'=>4, 'V'=>5, 'IX' => 9, 'X'=>10, 'L' => 50, 'C'=>100,'D' => 500, 'M'=>1000,'XL' => 40, 'XC'=>90,'CD' => 400, 'CM'=>900];
          $slength = strlen($s);
          $sum = 0; $low = 0;
          while($low < $slength-1){
            if(isset($romanMap[$s[$low].$s[$low+1]])){
              $sum += $romanMap[$s[$low].$s[$low+1]]; 
              $low +=2;
            }else{
              if(isset($romanMap[$s[$low]])){
                $sum += $romanMap[$s[$low]]; 
                $low++;
              }
            }
          }
          if($low < $slength && isset($romanMap[$s[$low]])){
            $sum += $romanMap[$s[$low]];
          }
          return $sum;
        }
}