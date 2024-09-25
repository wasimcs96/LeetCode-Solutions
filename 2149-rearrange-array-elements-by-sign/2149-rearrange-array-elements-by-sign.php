class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function rearrangeArray($nums) {
          $length = count($nums);
          $ans = array_fill(0, $length, null);

          if($length == 0){
              return $ans;
          }

          $counter = 0;
          $negCounter = 1;
          for($i=0;$i<$length;$i++){
              if($nums[$i] > 0){
                  $ans[$counter]= $nums[$i];
                  $counter += 2;
              }else{
                  $ans[$negCounter]= $nums[$i];
                  $negCounter += 2;
              }  
          }
          return $ans;
    }
}