class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    // Intuition:
    //   The minimum is at the "rotation point" — where the array
    //   resets from a high value back to a low value.
    //
    //   Key observation at every step:
    //     If nums[low] <= nums[high]: segment is fully sorted.
    //       Minimum of this segment = nums[low]. Update & stop.
    //     Else (segment is rotated):
    //       If LEFT half sorted  (nums[low] <= nums[mid]):
    //         Left-half minimum  = nums[low]. Update, search RIGHT.
    //       Else RIGHT half sorted:
    //         Right-half minimum = nums[mid]. Update, search LEFT.
    //
    // Dry Run: nums=[4,5,6,7,0,1,2]
    //   low=0, high=6, mid=3 → nums[0]=4 > nums[6]=2 → rotated
    //     Left sorted? 4 ≤ 7 yes → min=4, low=4
    //   low=4, high=6, mid=5 → nums[4]=0 ≤ nums[6]=2 → fully sorted
    //     min=min(4,0)=0, break
    //   Result: 0  ✓
    //
    // TC: O(log N)
    // SC: O(1)
    function findMin($nums) {
        $low  = 0;
        $high = count($nums) - 1;
        $min  = PHP_INT_MAX;

        while ($low <= $high) {
            $mid = $low + intdiv($high - $low, 2);

            // Optimisation: fully sorted segment → minimum is nums[low]
            if ($nums[$low] <= $nums[$high]) {
                $min = min($min, $nums[$low]);
                break;
            }

            if ($nums[$low] <= $nums[$mid]) {
                // Left half [low..mid] is sorted; its minimum is nums[low]
                $min = min($min, $nums[$low]);
                $low = $mid + 1;   // Rotation point is in the right half
            } else {
                // Right half [mid..high] is sorted; its minimum is nums[mid]
                $min = min($min, $nums[$mid]);
                $high = $mid - 1;  // Rotation point is in the left half
            }
        }

        return $min;
    }
}