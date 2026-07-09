class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s)
    {
        // If the input string is empty,
        // return 0.
        if ($s === '') {
            return 0;
        }

        // 32-bit signed integer limits.
        $INT_MAX = 2147483647;
        $INT_MIN = -2147483648;

        // Indicates whether the number is negative.
        $isNegative = false;

        // Stores the converted integer.
        $result = 0;

        // Pointer used to traverse the string.
        $i = 0;

        // Length of the string.
        $n = strlen($s);

        // ----------------------------------------------------
        // Step 1: Skip only leading whitespaces.
        //
        // Example:
        // "    -42"
        //       ↑
        // Move pointer until first non-space character.
        // ----------------------------------------------------
        while ($i < $n && $s[$i] === ' ') {
            $i++;
        }

        // ----------------------------------------------------
        // Step 2: Check for optional '+' or '-'.
        //
        // Example:
        // "-42"
        //  ^
        //
        // If '-' is found,
        // remember that the final answer is negative.
        // ----------------------------------------------------
        if ($i < $n && ($s[$i] === '+' || $s[$i] === '-')) {

            $isNegative = ($s[$i] === '-');

            // Move to the first digit.
            $i++;
        }

        // ----------------------------------------------------
        // Step 3: Read consecutive digits.
        // Stop automatically when a non-digit is found.
        // ----------------------------------------------------
        while ($i < $n && $s[$i] >= '0' && $s[$i] <= '9') {

            // Convert current character into integer.
            //
            // '5' -> 5
            // '9' -> 9
            $digit = (int)$s[$i];

            // ------------------------------------------------
            // Overflow Check
            // ------------------------------------------------
            //
            // Suppose:
            //
            // result = 214748364
            //
            // Next digit = 8
            //
            // If we calculate:
            //
            // result * 10 + digit
            //
            // it becomes
            //
            // 2147483648
            //
            // which exceeds INT_MAX.
            //
            // Therefore, we must check BEFORE multiplying.
            //

            if ($result > intdiv($INT_MAX, 10)) {
                return $isNegative? $INT_MIN: $INT_MAX;
            }

            // If result is exactly
            // 214748364
            //
            // then only the last digit matters.
            if ($result == intdiv($INT_MAX, 10)) {

                // Negative numbers may end with 8.
                //
                // -2147483648
                if ($isNegative && $digit > 8) {
                    return $INT_MIN;
                }

                // Positive numbers may end with 7.
                //
                // 2147483647
                if (!$isNegative && $digit > 7) {
                    return $INT_MAX;
                }
            }

            // Safe to append the digit.
            //
            // Example
            //
            // result = 42
            //
            // digit = 5
            //
            // result = 425
            $result = $result * 10 + $digit;

            $i++;
        }

        // Apply sign.
        return $isNegative ? -$result : $result;
    }
}