class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraysWithKDistinct($nums, $k) {
        $length = count($nums);
        if($k>$length) return 0;

        return $this->subarraysCountZeroToKDistinct($nums, $k) - $this->subarraysCountZeroToKDistinct($nums, $k-1);

        //Bruite Force APProch
        // $s = $nums;
        // $length = count($s);
        // if($k>$length) return 0;

        // $strMap = [];
        // for($i=0;$i<$length;$i++){
        //     $strPoint = $i; $appendStr = []; $chrMap = [];
        //     while($strPoint < $length){
        //         $chr = $s[$strPoint];

        //         if(isset($chrMap[$chr])) $chrMap[$chr]++;
        //         else $chrMap[$chr] = 1;

        //         $newKLength = count($chrMap);
        //         if($newKLength == $k){
        //             $appendStr[] = $chr;
        //             $strMap[] = $appendStr;
        //             $strPoint++;
        //         }elseif($newKLength < $k){
        //             $appendStr[] = $chr;
        //             $strPoint++;
        //         }else{
        //             break;
        //         }
        //     }
        // }
        // return count($strMap);
    }

    public function subarraysCountZeroToKDistinct($nums, $k) {
        $length = count($nums);
        
        $left = $right = 0;  $distinctMap=[]; $result = 0;
        
        for($right = 0; $right < $length; $right++){
            $rightValue = $nums[$right];

            if(isset($distinctMap[$rightValue])) $distinctMap[$rightValue]++;
            else $distinctMap[$rightValue] = 1;

            while(count($distinctMap) > $k){
                $leftValue = $nums[$left];
                $distinctMap[$leftValue]--;

                if($distinctMap[$leftValue] == 0) unset($distinctMap[$leftValue]);
                $left++;
            }

            $result += ($right - $left + 1);
        }
        return $result;
    }
}