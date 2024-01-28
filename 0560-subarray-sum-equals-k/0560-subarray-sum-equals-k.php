class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k) {
        $length = count($nums);
        $ansCounter = 0;
        $hash [0]= 1;
        $sum = 0;

        //rem = sum-k => sum = rem + k
        //<-------------------------->Sum (sum till i) ->set sum in hashmap
        //<------->rem (sum till i) ->check rem in haspmap 
        //         <----------------->k  
        for($i = 0; $i < $length; $i++){
          $sum += $nums[$i];
          $removal = $sum-$k;
          $ansCounter += $hash[$removal] ?? 0;
          $hash[$sum] = ($hash[$sum] ?? 0) + 1;
        }
        return $ansCounter;
    }
}