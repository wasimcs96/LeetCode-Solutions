class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */

//    Intuition: Three-step algorithm:
//   1. Find the RIGHTMOST index i where nums[i] < nums[i+1] (dip point)
//   2. Find the RIGHTMOST index j > i where nums[j] > nums[i], swap them
//   3. Reverse the suffix after index i (makes it the smallest arrangement)
//   If no dip found -> array is fully descending -> reverse all (wraps to first).
// TC: O(n)  |  SC: O(1)
// ============================================================
// find first one and then 3 then swap and reverse
//    ->1,   //swap 1 and 3 like just greate number and after aswap this make sort after 3 values 23 00145
//   2    5,  
//          4,
//         -> 3,
//              0,
//                0
//$nums = [2, 1, 5, 4, 3, 0, 0];
    function nextPermutation(&$nums) {
        $n = count($nums); $breakPoint = -1;

        //1. Find the RIGHTMOST index i where nums[i] < nums[i+1] (dip point)
        //Find the rightmost pair of indices (i, i+1) such that nums[i] < nums[i+1]. If no such pair exists, the array is in descending order, and we can simply reverse it to get the lowest order (first permutation).
        // Otherwise, let i be the first index of the pair, we need to find the rightmost index j such that nums[i] < nums[j]. Since the suffix nums[i+1..n-1] is in descending order, we can scan from the end until we find an element that is greater than nums[i]. 
        //Dry and Run: 
        // For example, if the input array is [2, 1, 5, 4, 3, 0,0], we can find the rightmost pair of indices (i, i+1) such that nums[i] < nums[i+1]. In this case, the pair is (5,6) because nums[5] = 0 and nums[6] = 0. Since 0 is not less than 0, we continue scanning until we find the next pair. The next pair is (1, 2) because nums[1] = 1 and nums[2] = 5. Since 1 is less than 5, we have found our break point at index 1.
        for($i=$n-2; $i>=0; $i--){
            if($nums[$i] < $nums[$i+1]){ //[2, 1,| 5, 4, 3, 0,0]
                $breakPoint = $i;
                break;
            }
        }
        // If no such index exists, the array is in descending order, and we can simply reverse it to get the lowest order (first permutation).
        // In our example, since we found the break point at index 1, we will not reverse the array. Instead, we will proceed to find the rightmost index j such that nums[i] < nums[j] and swap the values at indices i and j.
        // If no such index exists, the array is in descending order, and we can simply reverse it to get the lowest order (first permutation).
        // Like if the input array is [5, 4, 3, 2, 1], we will not find any pair of indices (i, i+1) such that nums[i] < nums[i+1]. In this case, the break point will remain -1, indicating that the array is in descending order. Therefore, we will reverse the array to get [1, 2, 3, 4, 5], which is the lowest order (first permutation).
        if($breakPoint == -1){
            // Reverse the array to get the first permutation.
            $nums = array_reverse($nums);
            return;
        }

        // 2. Find the RIGHTMOST index j > i where nums[j] > nums[i], swap them
        // If such an index exists, find the rightmost index j such that nums[i] < nums[j]. Since the suffix nums[i+1..n-1] is in descending order, we can scan from the end until we find an element that is greater than nums[i]. 
        for($i=$n-1; $i>$breakPoint; $i--){
            if($nums[$i] > $nums[$breakPoint]){
                // Swap the value of nums[i] with that of nums[breakPoint]. //give greate then 1 is 3 => 2,"1",5,4,"3"
                list($nums[$i], $nums[$breakPoint]) = [$nums[$breakPoint], $nums[$i]];
                break;
            }
        }
        // 3. Reverse the suffix after index i (makes it the smallest arrangement)
        // Finally, reverse the suffix nums[i+1..n-1] to get the next permutation.
        // After swapping the values at indices i and j, we need to reverse the suffix nums[i+1..n-1] to get the next permutation. 
        // This is because the suffix is in descending order, and reversing it will give us the lowest order (first permutation) for that suffix, 
        // which is necessary to ensure that we get the next permutation in lexicographical order. In our example, after swapping the values at indices 1 and 2, we will have the array 
        // [2, 5, 1, 4, 3, 0, 0]. We will then reverse the suffix starting from index 2 [1, 4, 3, 0, 0] to the end of the array, resulting in [2, 3, 0, 0, 1, 4, 5], 
        // which is the next permutation of the original array [2, 1, 5, 4, 3, 0, 0].
        while($breakPoint < $n-1){
            list($nums[$breakPoint+1], $nums[$n-1]) = [$nums[$n-1], $nums[$breakPoint+1]];
            $breakPoint++;
            $n--;
        }
        return;

    }
}