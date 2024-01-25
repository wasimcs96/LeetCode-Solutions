class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $arrLength = count($nums);
        $sum = 0;  $max = PHP_INT_MIN; $tempStr = $str = $end = -1;
        for($i=0;$i<$arrLength;$i++){
          if($sum == 0) $tempStr = $i; //when sum ==0 then actual array start
          $sum +=$nums[$i];
          if($sum > $max){
            $max = $sum;
            $str = $tempStr;
            $end = $i; //max value have end of array
          }
          if($sum < 0) $sum = 0;
          //str and end are indexs of max subarray 
          //another varient of question if question want to print subsarry
        }
        return $max;
    }
}