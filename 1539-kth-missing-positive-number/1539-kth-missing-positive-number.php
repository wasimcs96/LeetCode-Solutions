class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    function findKthPositive(array $arr, int $k): int {
        // Binary search start index.
        $low = 0;

        // Binary search end index.
        $high = count($arr) - 1;

        // Perform binary search.
        while ($low <= $high) {

            // Calculate middle index.
            $mid = (int)(($low + $high) / 2);

            /*
            * Formula:
            * Missing numbers before arr[mid]
            *
            * Expected value at index mid = mid + 1
            * Actual value at index mid   = arr[mid]
            *
            * Missing Count = Actual - Expected
            *
            * Example:
            * arr = [2,3,4,7,11]
            *
            * mid = 3
            * arr[3] = 7
            *
            * Expected value at index 3 = 4
            *
            * Missing numbers before 7:
            * 1,5,6
            *
            * Count = 7 - 4 = 3
            */
            $currentMissingNumber = $arr[$mid] - ($mid + 1);

            /*
            * If missing count is greater than or equal to k,
            * then the kth missing number lies on the left side
            * (including current position).
            */
            if ($currentMissingNumber >= $k) {

                // Move search space to left half.
                $high = $mid - 1;

            } else {

                /*
                * Missing count is still less than k.
                * We need more missing numbers,
                * so move to the right half.
                */
                $low = $mid + 1;
            }
        }

        /*
        * After binary search:
        *
        * high = last index where
        *        missingCount < k
        *
        * low = first index where
        *       missingCount >= k
        *
        * kth missing number = low + k
        *
        * Example:
        * arr = [2,3,4,7,11]
        * k = 5
        *
        * After search:
        * low = 4
        *
        * Answer = low + k
        *        = 4 + 5
        *        = 9
        */
        //return $low + $k;
        return $high + 1 + $k;
    }
}