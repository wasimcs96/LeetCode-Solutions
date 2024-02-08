class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        $length = count($nums);
        $low = 0; $high = $length-1; 

        if($length == 1 || $nums[0] != $nums[1]){
            return $nums[0];
        }
        if($nums[$high] != $nums[$high-1]){
            return $nums[$high];
        }
        
        while($low <= $high){
          $mid = (int) (($low+$high)/2);
      
          $midIsEven = ($mid+1) % 2 == 0 ? true : false;

          if($nums[$mid] != $nums[$mid-1] && $nums[$mid] != $nums[$mid+1]){
              return $nums[$mid];
          }
         
        
          if($midIsEven){
            if($nums[$mid] == $nums[$mid-1]){
                $low = $mid+1;
            }else{
                $high = $mid-1;
            }
          }else{
            if($mid != $high && $nums[$mid] == $nums[$mid+1]){
                $low = $mid+2;
            }else{
                $high = $mid-2;
            }
          }
        }
        return $nums[$mid];
      }
}