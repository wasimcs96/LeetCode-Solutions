class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $goal
     * @return Integer
     */
    // function numSubarraysWithSum($nums, $goal) {
    //     /*
    //      * HashMap
    //      *
    //      * Stores:
    //      * Prefix Sum => Frequency
    //      *
    //      * Example:
    //      * 0 => 1
    //      * 1 => 2
    //      * 2 => 1
    //      */
    //     $prefixSumCount = [];

    //     /*
    //      * Base Case
    //      *
    //      * A prefix sum of 0 exists once before
    //      * we start traversing the array.
    //      */
    //     $prefixSumCount[0] = 1;

    //     // Running prefix sum
    //     $sum = 0;

    //     // Total number of valid subarrays
    //     $count = 0;

    //     // Traverse the array
    //     foreach ($nums as $num) {

    //         // Update running prefix sum
    //         $sum += $num;

    //         /*
    //          * We need:
    //          *
    //          * Current Prefix Sum - Previous Prefix Sum = Goal
    //          *
    //          * Therefore,
    //          *
    //          * Previous Prefix Sum = Current Prefix Sum - Goal
    //          *
    //          * If this prefix sum has appeared before,
    //          * then every occurrence forms one valid subarray.
    //          */
    //         $requiredPrefixSum = $sum - $goal;

    //         if (isset($prefixSumCount[$requiredPrefixSum])) {
    //             $count += $prefixSumCount[$requiredPrefixSum];
    //         }

    //         /*
    //          * Store current prefix sum
    //          *
    //          * Increase its frequency because
    //          * the same prefix sum may occur again.
    //          */
    //         if (isset($prefixSumCount[$sum])) {
    //             $prefixSumCount[$sum]++;
    //         } else {
    //             $prefixSumCount[$sum] = 1;
    //         }
    //     }

    //     return $count;
    // }

    // Function to calculate number of subarrays with sum exactly equal to goal
    public function numSubarraysWithSum($nums, $goal)
    {
        // Return difference between atMost(goal) and atMost(goal - 1)
        return $this->atMost($nums, $goal) - $this->atMost($nums, $goal - 1);
    }

    // Helper function to count number of subarrays with sum at most k
    private function atMost($nums, $k)
    {
        // No valid subarrays if k is negative
        if ($k < 0) {
            return 0;
        }

        $left = 0;
        $sum = 0;
        $count = 0;

        // Traverse array using right pointer
        for ($right = 0; $right < count($nums); $right++) {

            // Add current element into window sum
            $sum += $nums[$right];

            // Shrink window until sum becomes <= k
            while ($sum > $k) {
                $sum -= $nums[$left];
                $left++;
            }

            // All subarrays ending at 'right' and starting
            // from left to right are valid.
            $count += ($right - $left + 1);
        }

        return $count;
    }
}