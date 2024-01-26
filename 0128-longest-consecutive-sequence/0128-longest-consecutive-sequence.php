class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
        $maxCount = 0;
        $hash = [];
        $count = count($nums);

        for($i = 0; $i < $count; $i++){
          $hash[$nums[$i]] = 0;
        }

        foreach($hash as $key => $val){
          //if key = 5 then while check 6,7,8
          $counter=0;
          $counterStart = $key;
          while(isset($hash[$key])){ //check 5,6,7,8
            if($hash[$key] != 0){ //if already calculated for 6 will be 3 =>6,7,8
              $counter += $hash[$key];
              unset($hash[$key]);
            }else{
              unset($hash[$key]);
              $counter++;
              $key++;
            }
           
          }
          $hash[$counterStart] = $counter;
          $maxCount = max($maxCount, $counter);
        }
        return $maxCount;
    }
}