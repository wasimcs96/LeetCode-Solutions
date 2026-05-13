class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $low  = 0;
        $high = count($nums) - 1;
        $key=$target; 

        while ($low <= $high) {
            $mid = (int) (($low + $high) / 2);

            if ($nums[$mid] === $key) {
                return $mid; // Target found
            }

            // Determine which half is sorted
            if ($nums[$low] <= $nums[$mid]) {
                // LEFT half [low .. mid] is sorted
                if ($nums[$low] <= $key && $key < $nums[$mid]) {
                    $high = $mid - 1; // Target is inside the sorted left half
                } else {
                    $low = $mid + 1;  // Target is in the rotated right half
                }
            } else {
                // RIGHT half [mid .. high] is sorted
                if ($nums[$mid] < $key && $key <= $nums[$high]) {
                    $low = $mid + 1;  // Target is inside the sorted right half
                } else {
                    $high = $mid - 1; // Target is in the rotated left half
                }
            }
        }

        return -1; // Not found

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