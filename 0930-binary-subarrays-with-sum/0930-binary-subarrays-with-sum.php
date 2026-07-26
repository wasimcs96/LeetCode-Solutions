class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $goal
     * @return Integer
     */
    function numSubarraysWithSum($nums, $goal) {
        /*
         * HashMap
         *
         * Stores:
         * Prefix Sum => Frequency
         *
         * Example:
         * 0 => 1
         * 1 => 2
         * 2 => 1
         */
        $prefixSumCount = [];

        /*
         * Base Case
         *
         * A prefix sum of 0 exists once before
         * we start traversing the array.
         */
        $prefixSumCount[0] = 1;

        // Running prefix sum
        $sum = 0;

        // Total number of valid subarrays
        $count = 0;

        // Traverse the array
        foreach ($nums as $num) {

            // Update running prefix sum
            $sum += $num;

            /*
             * We need:
             *
             * Current Prefix Sum - Previous Prefix Sum = Goal
             *
             * Therefore,
             *
             * Previous Prefix Sum = Current Prefix Sum - Goal
             *
             * If this prefix sum has appeared before,
             * then every occurrence forms one valid subarray.
             */
            $requiredPrefixSum = $sum - $goal;

            if (isset($prefixSumCount[$requiredPrefixSum])) {
                $count += $prefixSumCount[$requiredPrefixSum];
            }

            /*
             * Store current prefix sum
             *
             * Increase its frequency because
             * the same prefix sum may occur again.
             */
            if (isset($prefixSumCount[$sum])) {
                $prefixSumCount[$sum]++;
            } else {
                $prefixSumCount[$sum] = 1;
            }
        }

        return $count;
    }
}