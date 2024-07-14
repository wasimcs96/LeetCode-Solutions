class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        $sign = 1;
        if(($dividend > 0 && $divisor < 0) || ($dividend <0 && $divisor > 0)) $sign = 0;

        $n = $dividend = abs($dividend);
        $d = $divisor = abs($divisor);
        if($dividend == $divisor) return ($sign) ? 1 : -1;
        //$dividend = 22;
        //$$divisor = 3;
        // 3 *  pow(2, 0) + 3 *  pow(2, 1) + 3 *  pow(2, 2)
        // 3 + 6 + 12 < 22 
        // ans = pow(2, 0) + pow(2, 1) + pow(2, 2) = 7;
        $sum = 0; $i=0; $ans=0;
        while($n >= $d){
            $cnt = 0;
            while($n >= ($d<<($cnt+1))) $cnt++; //chekck max value of 3 * pow(2, $cnt) : 2,1,0
            $ans += (1<<$cnt); //4,2,1
            $n -= ($d << $cnt); // 22-(3*4) = 10, 10-(3*2)=> 4, 4-(3*1)=>1
        }

        $ans = ($sign) ? $ans : -1*$ans;
        if($sign && $ans >= pow(2,31)) $ans = pow(2,31)-1;
        if(!$sign && $ans >= pow(2,31)) $ans = pow(2,31);
        return $ans;
    }
}