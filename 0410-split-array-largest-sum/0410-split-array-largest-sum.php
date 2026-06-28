class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function splitArray($nums, $k) {
        $low  = max($nums);       // Each subarray must hold at least the largest element
        $high = array_sum($nums); // Worst case: one subarray for the whole array

        // for($i = $low; $i <= $high; $i++){
        //   if(canSplitArray($nums, $k, $i) == true){
        //     echo $i; break;
        //   }
        // }

        while ($low <= $high) {
            $mid = $low + intdiv($high - $low, 2);

            if ($this->canSplitArray($nums, $k, $mid)) {
                $high = $mid - 1; // Feasible → try smaller max sum
            } else {
                $low = $mid + 1;  // Not feasible → increase the sum limit
            }
        }

        return $low; // Minimum possible largest subarray sum
    }

    function canSplitArray(array $arr, int $k, int $maxSum): bool
    {
        $partsNeeded = 1; // Start with one subarray
        $currentSum  = 0;

        foreach ($arr as $val) {
            if ($currentSum + $val <= $maxSum) {
                $currentSum += $val; // Extend the current subarray
            } else {
                // Start a new subarray with this element
                $partsNeeded++;
                $currentSum = $val;
            }
        }

        return $partsNeeded <= $k; // Feasible if within $k splits
    }
}