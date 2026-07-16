class Solution {

    /**
     * @param String $s
     * @return String
     */

    function longestPalindrome($s)
        {
            $n = strlen($s);

            // If the string has 0 or 1 character, it is already a palindrome.
            if ($n <= 1) {
                return $s;
            }

            // Start index of the longest palindrome.
            $start = 0;

            // Length of the longest palindrome.
            $maxLength = 1;

            // Try every character as the center.
            for ($i = 0; $i < $n; $i++) {

                // Case 1: Odd-length palindrome (center at i)
                $this->expandAroundCenter($s, $i, $i, $start, $maxLength);

                // Case 2: Even-length palindrome (center between i and i+1)
                $this->expandAroundCenter($s, $i, $i + 1, $start, $maxLength);
            }

            // Return the longest palindrome found.
            return substr($s, $start, $maxLength);
        }

        /**
        * Expand from the given center and update the longest palindrome.
        */
        private function expandAroundCenter($s, $left, $right, &$start, &$maxLength)
        {
            $n = strlen($s);

            // Expand while characters are equal.
            while ($left >= 0 && $right < $n && $s[$left] == $s[$right]) {
                $left--;
                $right++;
            }

            /*
            * We expanded one step too far.
            *
            * Example:
            *
            * String: "abba"
            *
            * left = -1
            * right = 4
            *
            * Actual palindrome length:
            *
            * right - left - 1
            */
            $currentLength = $right - $left - 1;

            // Update answer if we found a longer palindrome.
            if ($currentLength > $maxLength) {
                $maxLength = $currentLength;
                $start = $left + 1;
            }
        }
}