class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $hashMap = $ans = [];
//       for($i=0;$i<count($nums);$i++){
//         $hashMap = [];
//         for($j=$i+1;$j<count($nums);$j++){
//             $sum = $nums[$i] + $nums[$j];
//             $sum = $sum == 0 ? 0 : -$sum;
//             if(isset($hashMap[$sum])){
//                 $temp_ans = [$nums[$i], $nums[$j], $sum];
//                 sort($temp_ans);
//                 $ans[$temp_ans[0]."_".$temp_ans[1]."_".$temp_ans[2]] = $temp_ans;
//             }
//             $hashMap[$nums[$j]] = $nums[$j];
//         }
//       }

//       $hashMap = [];
//       foreach ($ans as $hash){
//         $hashMap[] = $hash;
//       }
//       return $hashMap;

      $ans = [];
      sort($nums);
      $i=0; $k=count($nums)-1;

      for($i=0;$i<count($nums);$i++){
        if($i>0 && $nums[$i] == $nums[$i-1]) continue;

        $j=$i+1; 
        $k=count($nums)-1;
        while($j<$k){
            $sum = $nums[$i] + $nums[$j] + $nums[$k];
            if($sum > 0){
                $k--;
            }else if($sum < 0){
                $j++;
            }else{
                $temp_ans = [$nums[$i], $nums[$j], $nums[$k]];
                //sort($temp_ans);
                //$ans[$temp_ans[0]."_".$temp_ans[1]."_".$temp_ans[2]] = $temp_ans;
                $ans[] = $temp_ans;
                $j++;
                $k--;
                while($j<$k && $nums[$j] == $nums[$j-1])  $j++;
                while($j<$k && $nums[$k] == $nums[$k+1])  $k--;
            }
        }
    }
      return $ans; //!empty($ans) ? array_values($ans) : [];
    }
     
}