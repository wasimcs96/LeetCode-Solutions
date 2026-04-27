class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $arrLength = count($nums);
        if($arrLength == 0 || $arrLength == 1) return;

        $i=$j=0;
        while($j<$arrLength){
            if($nums[$j] != 0){
                list($nums[$i], $nums[$j]) = [$nums[$j], $nums[$i]];
                $i++;
            }
            $j++;
        }
        // Dry Run  ->  $nums = [0, 1, 0, 3, 12]
        // j=0: 0 skip
        // j=1: 1!=0 -> swap(nums[0],nums[1]) -> [1,0,0,3,12], i=1
        // j=2: 0 skip
        // j=3: 3!=0 -> swap(nums[1],nums[3]) -> [1,3,0,0,12], i=2
        // j=4: 12!=0-> swap(nums[2],nums[4]) -> [1,3,12,0,0], i=3
        // Output: [1,3,12,0,0]

        //Another solution is 
        // We can optimize the approach using 2 pointers i.e. i and j. The pointer j will point to the first 0 in the array and i will point to the next index.
        // Assume, the given array is {1, 0, 2, 3, 2, 0, 0, 4, 5, 1}. Now, initially, we will place the 2-pointers like the following:
        // First, we iterate through the array to locate the position of the first zero, using a pointer j. If no zero is found, no further steps are needed.
        // Next, we set a second pointer i to j + 1 and start moving it forward through the array.
        // While moving i, whenever we encounter a non-zero element a[i], we swap it with the element at index j. After the swap, since j now holds a non-zero value, we increment j to point to the next zero.
    }
}