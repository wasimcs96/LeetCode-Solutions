class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        for($j = $m;$j<$m+$n;$j++){
            //$nums1[$j] = array_shift($nums2);
            $nums1[$j] = $nums2[$j-$m];
        }
        sort($nums1);
    }
}