class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k) {
        // Intuition: Same prefix-sum trick as problem 12.
        //   hash[0]=1 accounts for subarrays starting from index 0.
        //   For each prefix sum, add hash[sum-k] to answer count.
        // TC: O(n)  |  SC: O(n)
        // ============================================================

        $length = count($nums);
        $ansCounter = 0;
        $hash [0]= 1;
        $sum = 0;

        //rem = sum-k => sum = rem + k
        //<-------------------------->Sum (sum till i) ->set sum in hashmap
        //<------->rem (sum till i) ->check rem in haspmap  -> if rem exists in hashmap then add count of rem in hashmap to answer counter because it means there is a subarray from index after rem to current index i which sums to k.
        //         <----------------->k  -> subarray sum from rem+1 to i = k
        // If rem exists in hashmap then add count of rem in hashmap to answer counter because it means there is a subarray from index after rem to current index i which sums to k.

        for($i = 0; $i < $length; $i++){
          $sum += $nums[$i];
          $removal = $sum-$k;
          // If the removal (sum-k) exists in the hash map, it means there is a subarray that sums to k ending at index i. We add the count of such subarrays (hash[removal]) to our answer counter.
          $ansCounter += $hash[$removal] ?? 0;
          // We then update the hash map to include the current prefix sum. If this prefix sum has been seen before, we increment its count; otherwise, we initialize it to 1.
          $hash[$sum] = ($hash[$sum] ?? 0) + 1;
        }
        return $ansCounter;
    }
}