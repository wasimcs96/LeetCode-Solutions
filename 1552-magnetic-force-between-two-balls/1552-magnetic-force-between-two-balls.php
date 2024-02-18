class Solution {

    /**
     * @param Integer[] $position
     * @param Integer $m
     * @return Integer
     */
    function maxDistance($position, $m) {
            //Apprach
            //1. find range which is max-min
            //2. check we can put balls in basket for range value
        
          sort($position);
          $length = count($position);
          $limit = max($position)-min($position); //valuue must be range  of stall number.   1->6 in this we can get min distanse
          // for($i = 1; $i <= $limit; $i++) {
          //   if($this->canPutBalls($position, $m, $i) == false){
          //     return $i-1;
          //   }
          // }
          // return $limit;

          //BS Aprroch
          $min = 1; $high = $limit;
          while($min<=$high){
                $mid = (int)(($min+$high)/2);
                if($this->canPutBalls($position, $m, $mid) == true){ //check for value mid we can put all 3 balls in arr => mid 1,2,3 give true but for 4 we can not put all balls in arr basket 
              $min = $mid+1;
                }else{
                    $high = $mid-1;
                }
            }
            return $high;
  
    }
    function canPutBalls($arr, $cow, $minDistance){ //1,2,3,4,7
        $last = $arr[0]; $length = count($arr)-1;
        $cntCows = 1;// no. of balls placed
        for($j = 1; $j <= $length; $j++){
            if($arr[$j]-$last >= $minDistance){ //2-1=1 => 1 so true then check  next condition 3-2 >= 1 >=1 and so on
            $cntCows++;
            $last = $arr[$j]; //1=>2 , first two index
        }
        if($cntCows >= $cow) return true;
        }
        return false;
    }
}