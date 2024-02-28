class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function splitArray($nums, $k) {
        $max = array_sum($nums); $min = max($nums);

        // for($i = $min; $i <= $max; $i++){
        //   if(canSplitArray($nums, $k, $i) == true){
        //     echo $i; break;
        //   }
        // }

        while($min <= $max ){
          $mid = (int)(($min + $max) / 2);
          if($this->canSplitArray($nums, $k, $mid)){
            $min = $mid+1;
          }else{
            $max = $mid-1;
          }
        }

        return $min;
    }

    function canSplitArray($arr, $k, $sum){
      $length = count($arr)-1; 
      $cnt = 0; $cntArr = 1;
      for ($j=0; $j<= $length ; $j++) {
        if($arr[$j] + $cnt <= $sum){ 
          $cnt += $arr[$j];
        }else{
          $cnt = $arr[$j];
          $cntArr++;
        }
      }
      return $cntArr >  $k ? true : false;
    }
    
}