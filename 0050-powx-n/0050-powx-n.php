class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($n == 0) return 1;

//         $result = 1.0;
//         $absN = abs($n);

//         while ($absN > 0) {
//             if ($absN % 2 == 1) {
//                 $result *= $x;
//             }
//             $x *= $x;
//             $absN = (int) ($absN / 2);
//         }

//         return  ($n < 0) ? (float) (1 / $result) :  (float) ($result);
        
//         //Or Recursive
//         if($n == 0) return 1;

//         if($n > 0){
//             $x = (float) (1 * $this->myRecursivePow($x, $n));
//         }else{
//             $x = (float) (1 / $this->myRecursivePow($x, $n));
//         }
//         return $x;
        
        //Another Approch
        return  $n > 0 ? $this->myPowAnother($x, $n) : 1 / $this->myPowAnother($x, $n);
    }

    function myRecursivePow($x, $n) {
        if($n == 0) return 1;
        $isOdd = (int) ($n % 2);

        if($isOdd){
            $x = (float) ($x * $this->myRecursivePow($x, $n-1));
        }else{
            $x = (float) ($this->myRecursivePow($x*$x, $n/2));
        }

        return $x;
    }
    
    //Another Approch
    function myPowAnother(float $x, $n) { 
        if($n == 0){
            return 1;
        }
        if($n % 2 == 0){
            return (float) $this->myPowAnother($x * $x, $n/2);  
        }
        else{
            return (float) $x * $this->myPowAnother($x * $x, $n/2);
        }
    }
    
    
}