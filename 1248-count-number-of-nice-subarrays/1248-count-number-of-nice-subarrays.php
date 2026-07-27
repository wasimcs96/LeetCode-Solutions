class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numberOfSubarrays($nums, $k) {
        return $this->niceSubarrays($nums, $k) - $this->niceSubarrays($nums, $k - 1);
    }

    function niceSubarrays($nums, $k) {

        // Total number of elements
        $arrLength = count($nums);

        // Edge case
        if ($arrLength == 0) return 0;

        // Sliding window pointers
        $left = 0;

        // Stores total valid subarrays having at most k odd numbers
        $subArrCounter = 0;

        // Current number of odd elements inside window
        $oddNumberCounter = 0;

        // Expand the window
        for ($right = 0; $right < $arrLength; $right++) {

            // If current element is odd, increase odd counter
            if ($nums[$right] % 2 != 0) {
                $oddNumberCounter++;
            }

            // Window has more than k odd numbers
            // Shrink it from the left
            while ($oddNumberCounter > $k) {

                // Remove left element contribution
                if ($nums[$left] % 2 != 0) {
                    $oddNumberCounter--;
                }

                $left++;
            }

            /*
            Window [left...right] now contains
            at most k odd numbers.

            Every subarray ending at "right"
            and starting anywhere from
            left to right is valid.

            Number of such subarrays

                = right - left + 1
            */
            $subArrCounter += ($right - $left + 1);
        }

        return $subArrCounter;
    }
}