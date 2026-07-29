class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    /**
    * Optimized solution for strings containing only:
    *
    *      a, b and c
    *
    * Instead of storing frequencies,
    * store the latest index of each character.
    *
    * Whenever all three characters have been seen,
    * the earliest last occurrence determines how many
    * valid substrings end at the current index.
    *
    * Time Complexity  : O(n)
    * Space Complexity : O(1)
    */

    function numberOfSubstringsV1($s)
    {
        $k = 3;
        $strLength = strlen($s);

        if ($strLength == 0) {
            return 0;
        }

        // Stores the latest index of each character
        $lastSeen = [];

        $subArrCounter = 0;

        for ($right = 0; $right < $strLength; $right++) {

            // Update latest occurrence
            $lastSeen[$s[$right]] = $right;

            // Once all K distinct characters are present
            if (count($lastSeen) == $k) {

                /**
                * Earliest occurrence among
                * a,b,c determines how many
                * substrings end at current position.
                */
                $subArrCounter += min(
                    $lastSeen['a'],
                    $lastSeen['b'],
                    $lastSeen['c']
                ) + 1;
            }
        }

        return $subArrCounter;
    }

    /**
    * Count substrings containing exactly/at least K distinct characters
    * (This implementation works for problems like LeetCode 1358 when k = 3).
    *
    * Time Complexity  : O(n)
    * Space Complexity : O(k)
    *
    * Idea:
    * -----
    * Expand the window using the right pointer.
    *
    * As soon as the window contains exactly K distinct characters,
    * every substring starting from 'left' and ending at
    * 'right', 'right+1', ..., 'n-1' will also satisfy the condition.
    *
    * Therefore, instead of checking each substring individually,
    * we add:
    *
    *      n - right
    *
    * Then shrink the window from the left to search for more valid windows.
    */

    function numberOfSubstrings($s)
    {
        $k = 3;
        $strLength = strlen($s);

        // Edge case
        if ($strLength == 0) {
            return 0;
        }

        // Left pointer of sliding window
        $left = 0;

        // Character frequency inside current window
        $distinctCharCount = [];

        // Final answer
        $subArrCounter = 0;

        // Expand window
        for ($right = 0; $right < $strLength; $right++) {

            // Include current character
            $distinctCharCount[$s[$right]] =
                isset($distinctCharCount[$s[$right]])
                    ? $distinctCharCount[$s[$right]] + 1
                    : 1;

            /**
            * If window contains exactly K distinct characters,
            * then every extension of this window is also valid.
            */
            while (count($distinctCharCount) == $k) {

                /**
                * Count all valid substrings.
                *
                * Example:
                *
                * String : abcabc
                * Right  : 2 ('c')
                *
                * Valid endings:
                *
                * abc
                * abca
                * abcab
                * abcabc
                *
                * Total = n - right
                */
                $subArrCounter += $strLength - $right;

                // Remove leftmost character
                $leftChar = $s[$left];
                $distinctCharCount[$leftChar]--;

                // Remove key if frequency becomes zero
                if ($distinctCharCount[$leftChar] == 0) {
                    unset($distinctCharCount[$leftChar]);
                }

                // Shrink window
                $left++;
            }
        }

        return $subArrCounter;
    }
}