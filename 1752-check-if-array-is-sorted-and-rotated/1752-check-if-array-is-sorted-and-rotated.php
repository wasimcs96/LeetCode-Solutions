class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function check($nums) {
        $count = count($nums);
        $rotationCount = 0;
        for($i=0;$i<$count;$i++){
          //nextIndex give 1,2,3,4,5,1 //if length 6
          $nextIndex = (int) ($i+1) % $count;
          if($nums[$i] > $nums[$nextIndex]){
             $rotationCount++;
          }
        }

        if($rotationCount > 1){
          return false;
        }
        return true;
    }
}