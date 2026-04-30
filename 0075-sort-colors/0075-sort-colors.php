class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        // Intuition: Three-pointer approach -- low, mid, high.
        //   - 0s go to [0..low-1]
        //   - 1s go to [low..mid-1]
        //   - 2s go to [high+1..n-1]
        //   mid scans; swap with low for 0, swap with high for 2.
        // TC: O(n)  |  SC: O(1)
        // ============================================================
            $low  = 0;
            $mid  = 0;
            $high = count($nums) - 1;

            while ($mid <= $high) {
                if ($nums[$mid] === 0) {
                    [$nums[$low], $nums[$mid]] = [$nums[$mid], $nums[$low]];
                    $low++;
                    $mid++;
                } elseif ($nums[$mid] === 1) {
                    $mid++;            // 1 is already in correct zone
                } else {               // nums[$mid] === 2
                    [$nums[$high], $nums[$mid]] = [$nums[$mid], $nums[$high]];
                    $high--;           // Do NOT increment mid; re-examine swapped value
                }
            }
        
    }
}