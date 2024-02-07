class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
      $high = count($nums)-1; $low = 0; $key=$target; $ans = -1;

      while($low <= $high){
          $mid = (int) (($low + $high) / 2);
          if ($nums[$mid] == $key ){
              return $mid;
          }

          if($nums[$low] <= $nums[$mid]){
              if($nums[$low] <= $key && $key < $nums[$mid]){
                  $high = $mid-1;
              }else{
                  $low = $mid+1;
              }
          }else{
              if($nums[$mid] < $key && $key <= $nums[$high]){
                  $low = $mid+1;
              }else{
                  $high = $mid-1;
              }
          }
      }

      return -1;

        // $high = $length = count($nums)-1; $low = $start = 0; $key=$target;
        // $ans = -1;
        // $roatePoint = -1;
        // while($start < $length){
        //     if($nums[$start] > $nums[$start+1]){
        //         $roatePoint = $start+1;
        //         break;
        //     }
        //     $start++;
        // }

        // if($roatePoint != -1){
        //     if($key == $nums[$roatePoint]){
        //       return $roatePoint;
        //     }else if($nums[$roatePoint] <= $key && $key <= $nums[$high]){
        //       return $this->searchIndex($nums, $roatePoint, $high, $key, $ans);
        //     }else{
        //       return $this->searchIndex($nums, $low, $roatePoint-1, $key, $ans);
        //     }
        //     return $ans;
        // }else{
        //   return $this->searchIndex($nums, $low, $high, $key, $ans);
        // }
        // return -1;
    }

    //take TC -> O(N)
    // function searchIndex($nums, $low, $high, $key, $ans){
    //     if($low > $high) return $ans;
      
    //     $mid = (int) (($low+$high) / 2);
    //     if($nums[$mid] == $key ) {
    //         return $mid;
    //     }else if($nums[$mid] > $key){
    //         return $this->searchIndex($nums, $low, $mid-1, $key, $ans);
    //     }
    //     else{
    //         return $this->searchIndex($nums, $mid+1, $high, $key, $ans);
    //     }
    // }
}