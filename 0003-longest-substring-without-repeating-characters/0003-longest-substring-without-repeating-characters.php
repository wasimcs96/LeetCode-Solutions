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

    //Striver  Approch
    function lengthOfLongestSubstringStriver($s)
    {
        $length = strlen($s);

        // Edge cases
        if ($length <= 1) {
            return $length;
        }

        // Stores:
        // ASCII Value -> Last Index
        $hash = array_fill(0, 256, -1);

        // Left pointer of current window
        $left = 0;

        // Maximum window length found
        $maxLength = 0;

        // Expand the window
        for ($right = 0; $right < $length; $right++) {

            // Current character
            $ascii = ord($s[$right]);

            // Duplicate found?
            if ($hash[$ascii] != -1) {

                /*
                 * Move left pointer
                 *
                 * Previous occurrence + 1
                 *
                 * But never move left backwards.
                 */
                $left = max($hash[$ascii] + 1, $left);
            }

            // Current window length
            $currentLength = $right - $left + 1;

            // Update answer
            $maxLength = max($maxLength, $currentLength);

            // Store latest index
            $hash[$ascii] = $right;
        }

        return $maxLength;
    }
}