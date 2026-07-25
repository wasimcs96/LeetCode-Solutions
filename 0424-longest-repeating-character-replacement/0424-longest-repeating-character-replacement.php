class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    // function characterReplacement($s, $k) {
    //     $length = strlen($s);
    //     if($length == 0 || $length == 1) return $length;

    //     $left = $right = 0; $maxLength = 0;  $chrHashCounter = []; $maxFreq = 0;

    //     for($right; $right < $length; $right++){
    //         if(isset($chrHashCounter[$s[$right]])) $chrHashCounter[$s[$right]]++;
    //         else $chrHashCounter[$s[$right]] = 1;

    //         $maxFreq = max($chrHashCounter[$s[$right]], $maxFreq);

    //         while(($right - $left + 1) - $maxFreq > $k){
    //             $leftChr = $s[$left];
    //             $chrHashCounter[$leftChr]--;
    //             if($chrHashCounter[$leftChr] == 0) unset($chrHashCounter[$leftChr]);
    //             $left++;
    //         }

    //         $windowLength = $right - $left + 1;
    //         $maxLength = max($maxLength, $windowLength);
    //     }
    //     return $maxLength;
    // }

    function characterReplacement(string $s, int $k): int
    {
        $chars = [];
        $maxRepeat = 0;
        $res = 0;

        for ($l = 0, $r = 0; $r < strlen($s); $r++) {
            $chars[$s[$r]]++;
            $maxRepeat = max($maxRepeat, $chars[$s[$r]]);
            if ($r - $l + 1 - $maxRepeat > $k) {
                $chars[$s[$l]]--;
                //$maxRepeat = min($maxRepeat, $chars[$s[$l]]);
                $l++;
            }
            $res = max($res, $r - $l + 1);
        }

        return $res;
    }
}