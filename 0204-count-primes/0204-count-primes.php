class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */

    function isPrime($num) {
      $count=0;
      for($i=1;$i<=sqrt($num);$i++){
        if($num%$i == 0){
          $count++;
          if($num/$i != $i){
            $count++;
          }
        }
      }
    
      if($count == 2){
        return 1;
      }else{
        return 0;
      }
    }

    function countPrimes($n) {
        // $ans = 0;
        // if($n == 1){
        //   return 0;
        // }else{
        //   for($i=2;$i<$n;$i++){
        //     $ans += $this->isPrime($i);
        //   }
        // }
        // return $ans;
        if($n <= 1){
          return 0;
        }
        $numsOfArr = array_fill(2, $n-1, 1);

        for($i=2;$i<=sqrt($n);$i++){
            if($numsOfArr[$i] == 1){
                for($j=$i*$i;$j<=$n;$j+=$i){
                    $numsOfArr[$j] = 0;
                }
            }
        }
        $count=0;
        foreach($numsOfArr as $key => $value){
            if($key < $n && $value == 1){
                $count++;
            }
        }
        return $count;
    }


}