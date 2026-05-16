class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean
     */
    function search($nums, $target) {
        $low  = 0;
        $high = count($nums) - 1;
        $key=$target; 

        while ($low <= $high) {
            $mid = (int) (($low + $high) / 2);

            if ($nums[$mid] === $key) {
                return true; // Target found
            }

            //Additional Check Edge Case
            if ($nums[$low] == $nums[$mid] && $nums[$mid] == $nums[$high]) {
                $low++;
                $high--;
                continue;
            }

            // Determine which half is sorted
            if ($nums[$low] <= $nums[$mid]) {
                // LEFT half [low .. mid] is sorted
                if ($nums[$low] <= $key && $key < $nums[$mid]) {
                    $high = $mid - 1; // Target is inside the sorted left half
                } else {
                    $low = $mid + 1;  // Target is in the rotated right half
                }
            } else {
                // RIGHT half [mid .. high] is sorted
                if ($nums[$mid] < $key && $key <= $nums[$high]) {
                    $low = $mid + 1;  // Target is inside the sorted right half
                } else {
                    $high = $mid - 1; // Target is in the rotated left half
                }
            }
        }

        return false; // Not found
    }
}