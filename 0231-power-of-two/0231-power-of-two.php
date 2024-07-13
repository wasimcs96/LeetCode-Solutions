class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n) {
      if($n < 0 || $n == 0) return false;
//       for($i=0;$i<31;$i++){
//         $ans = pow(2,$i);
//         if($ans == $n){
//           return true;  
//         }
//       }

//       return false;

        return ($n & ($n - 1)) == 0;
        
    }
}