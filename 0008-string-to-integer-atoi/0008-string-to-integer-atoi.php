class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $result = 0;
        $isNegative = false;
        $i = 0;

        $s=trim($s); $sLength = strlen($s);

        if($s[0] === '-'){
            $isNegative = true;
            $i++;
        }
        if($s[0] === '+') $i++;

        $PHP_INT_MAX = 2147483647;
        $PHP_INT_MIN = -2147483648;

        while($i<$sLength){
            $char = $s[$i];
            if(is_numeric($char) || $char === '0'){
                if($result > (int) ($PHP_INT_MAX / 10)){
                    return $isNegative ? $PHP_INT_MIN : $PHP_INT_MAX;
                }else if($result == (int) ($PHP_INT_MAX / 10)){
                    $lastBigDigit = $PHP_INT_MAX % 10;
                    if($char > $lastBigDigit){
                        return $isNegative ? $PHP_INT_MIN : $PHP_INT_MAX; 
                    }
                    $result = $result * 10 + (int)$char;
                }else{
                    $result = $result * 10 + (int)$char;
                }
            }else{
                break;
            }
            $i++;
        }
        return $isNegative ? -$result : $result;
    }
}