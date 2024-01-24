class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */

      function twoSum($nums, $target) {
        $arrLength = count($nums);
        $haspMap = [];
        for($i=0;$i<$arrLength;$i++){
          //2,7,11,15  k=9
          //9-2 = 7 => set 2 in hasmap with i
          //9-7 = 2 => isset 2 in hasmap then return map i and for loop i
          if(!isset($haspMap[$nums[$i]])){
            $haspMap[$target-$nums[$i]] = $i;
          }else{
            return [$haspMap[$nums[$i]], $i];
          }
        }

        //Just return Yes if sum exits
          // $target=10;
          // $nums = [2,5,5,11];
          // $arrLength = count($nums);
          // sort($nums);
          // $i=0; $j=$arrLength-1;
          // $sum=$nums[$i];
          // while($i<$j){
          //   $sum = $nums[$i] + $nums[$j];
          //   if($sum == $target){
          //   echo "YES"; die;
          //   }else if($sum < $target){
          //     $i++;
          //   }else{
          //     $j--;
          //   }
          // }
      }
}