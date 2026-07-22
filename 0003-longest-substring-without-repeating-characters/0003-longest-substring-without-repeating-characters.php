class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $length = strlen($s);
        if($length == 0 || $length == 1){
            return $length;
        }
        $left = $right = 0; $maxLength = 0; $chrHashMap = [];

        while($right < $length){
            $chr = $s[$right];
            if(isset($chrHashMap[$chr])) {
                $chrHashMap[$chr]++;
                $maxLength = max($maxLength, count($chrHashMap));
                while($left < $right){
                    $leftChr = $s[$left];
                    $left++;
                    
                    $chrHashMap[$leftChr]--;
                    if($chrHashMap[$leftChr] == 0) unset($chrHashMap[$leftChr]);

                    if($leftChr == $s[$right]){
                        break;
                    }
                    
                }
            }
            else $chrHashMap[$chr] = 1;
            $right++;
        }

        $maxLength = max($maxLength, count($chrHashMap));
        return $maxLength; 
    }
}