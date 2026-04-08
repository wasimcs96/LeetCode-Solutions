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
            if ($result > 214748364 || ($result == 214748364 && $digit > 7)) { //2147483647, check are adding 7 or less
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