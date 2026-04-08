class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $result = 0;

        while ($x != 0) {
            // Get last digit
            $digit = $x % 10;

            // Remove last digit from x
            $x = (int)($x / 10);
            
            //-2147483648 to 2147483647
            // Check overflow BEFORE multiplying
            //$result > 214748364 => let assume $result is  214748365 , for this next opration 214748365 * 10 + 0 (min) become 2147483650 which is  > 2147483647
            if ($result > 214748364 || ($result == 214748364 && $digit > 7)) { //214748364, check are we adding 7 or less
                return 0;
            }
            if ($result < -214748364 || ($result == -214748364 && $digit < -8)) {
                return 0;
            }

            // Build reversed number
            $result = $result * 10 + $digit;
        }
        return $result;
    }
}