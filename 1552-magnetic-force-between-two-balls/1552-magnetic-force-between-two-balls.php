class Solution {

    /**
     * @param Integer[] $position
     * @param Integer $m
     * @return Integer
     */
    function maxDistance($position, $m) {
            sort($position);
          $length = count($position);
          $limit = max($position)-min($position); //valuue must be range  of stall number.   0->10 in this we can get min distanse
          // for($i = 1; $i <= $limit; $i++) {
          //   if($this->canputCows($position, $m, $i) == false){
          //     return $i-1;
          //   }
          // }
          // return $limit;

          //BS Aprroch
          $min = 1; $high = $limit;
          while($min<=$high){
                $mid = (int)(($min+$high)/2);
                if($this->canputCows($position, $m, $mid) == true){ //check for value mid we can put all 4 cows in arr => mid 1,2,3 give true but for 4 we can not put all cows in arr 
              $min = $mid+1;
                }else{
                    $high = $mid-1;
                }
            }
            return $high;
  
    }
    function canputCows($arr, $cow, $minDistance){ //0,3,4,7,10,9
        $last = $arr[0]; $length = count($arr)-1;
        $cntCows = 1;// no. of cows placed
        for($j = 1; $j <= $length; $j++){
            if($arr[$j]-$last >= $minDistance){ //3-0=3 > 1 so true then check  next condition 4-3 = 1 >=1 and so on
            $cntCows++;
            $last = $arr[$j]; //0=>3 , first two index
        }
        if($cntCows >= $cow) return true;
        }
        return false;
    }
}