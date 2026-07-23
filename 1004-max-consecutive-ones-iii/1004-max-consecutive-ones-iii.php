class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    // function longestOnes($nums, $k) {
    //     $length = count($nums);
    //     if($length == 0) return 0;

    //     $left = $right = 0; $maxWindowLength = 0; $bineryHashArray = [0=>0,1=>0];

    //     while($right < $length){
    //         $bineryHashArray[$nums[$right]]++;
    //         $counterOfZero = $bineryHashArray[0];
    //         while($counterOfZero > $k){
    //             if($nums[$left] == 0) {
    //                 $counterOfZero--;
    //             }
    //             $left++;
    //         }
    //         $bineryHashArray[0] = $counterOfZero;

    //         $windowLength = $right - $left + 1;
    //         $maxWindowLength = max($maxWindowLength, $windowLength);
    //         $right++;
    //     }

    //     return $maxWindowLength;
    // }

    //Striver Optimal Solution
    function longestOnes($nums, $k)
    {
        // Total number of elements
        $length = count($nums);

        // Edge case: Empty array
        if ($length == 0) {
            return 0;
        }

        // Sliding Window pointers
        $left = 0;
        $right = 0;

        // Stores maximum valid window length found so far
        $maxWindowLength = 0;

        /*
        * Frequency array
        *
        * Index 0 -> Count of zeros inside current window
        * Index 1 -> Count of ones inside current window
        */
        $binaryHashArray = [
            0 => 0,
            1 => 0
        ];
        //Instead of you can use only ZeroCounter

        // Expand the window using right pointer
        while ($right < $length) {

            // Include current element into window
            $binaryHashArray[$nums[$right]]++; //        //Instead of you can use only ZeroCounter


            /*
            * If number of zeros becomes greater than k,
            * our window becomes invalid.
            *
            * Shrink the window from the left until
            * it becomes valid again.
            */
            if ($binaryHashArray[0] > $k) {

                // Remove left element from window
                if ($nums[$left] == 0) {
                    $binaryHashArray[0]--;          //Instead of you can use only ZeroCounter

                }

                // Move left pointer
                $left++;
            }

            // Current valid window length
            $windowLength = $right - $left + 1;

            // Store maximum window length
            $maxWindowLength = max($maxWindowLength, $windowLength);

            // Expand window
            $right++;
        }

        return $maxWindowLength;
    }
    
}