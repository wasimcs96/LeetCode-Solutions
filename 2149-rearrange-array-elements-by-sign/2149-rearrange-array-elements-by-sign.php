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

        //Rearrange Array Elements by Sign if size is not equal of negative and positive numbers
        // function rearrangeArray($nums) {
        //   $length = count($nums);
        //   $ans = array_fill(0, $length, null);
        //   $negArr = $posArr = [];
          
        //   if($length == 0){
        //       return $ans;
        //   }

        //   for($i = 0; $i < $length; $i++){
        //     if($nums[$i] > 0){
        //       array_push($posArr, $nums[$i]);
        //     }else{
        //       array_push($negArr, $nums[$i]);
        //     }
        //   }

        //   $posArrLength = count($posArr);
        //   $negArrLength = count($negArr);

        //   if($posArrLength < $negArrLength){
        //     for($i = 0; $i < $posArrLength; $i++){
        //       $ans[$i*2] = $posArr[$i];
        //       $ans[($i*2) + 1] = $negArr[$i];
        //     }
        //     $index = $posArrLength*2;
        //     for($i=$posArrLength; $i < $negArrLength;$i++){
        //       $ans[$index] = $negArr[$i];
        //       $index++;
        //     }
        //   }else{
        //     for($i = 0; $i < $negArrLength; $i++){
        //       $ans[$i*2] = $posArr[$i];
        //       $ans[($i*2) + 1] = $negArr[$i];
        //     }
        //     $index = $negArrLength*2;
        //     for($i=$negArrLength; $i < $posArrLength;$i++){
        //       $ans[$index] = $posArr[$i];
        //       $index++;
        //     }
        //   }
        //   return $ans;
        // }

    }
}