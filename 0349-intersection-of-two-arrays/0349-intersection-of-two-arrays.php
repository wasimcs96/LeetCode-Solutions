class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        $count1 = count($nums1);
        $count2 = count($nums2);
        $ans = [];
        $indexArr = [];

        for($i=0;$i<$count1;$i++){
            $indexArr[$nums1[$i]] = 1;
        }

        for($i=0;$i<$count2;$i++){
            if($indexArr[$nums2[$i]] == 1) {
                $indexArr[$nums2[$i]] = 0;
                array_push($ans, $nums2[$i]);
            };
        }

        return $ans;
    }
}