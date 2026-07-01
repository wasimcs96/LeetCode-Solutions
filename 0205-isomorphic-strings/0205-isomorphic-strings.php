class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {
        $sLength = strlen($s);
        $tLength = strlen($t);

        if($sLength != $tLength) return false;

        for($i=0;$i<$sLength;$i++){
            $sChar = $s[$i];
            $tChar = $t[$i];
            // Find the first occurrence of each character.
            // If first occurrence positions differ,
            // mapping is inconsistent.
            if(strpos($s, $sChar) != strpos($t, $tChar)){
                return false;
            }

        }
        return true;

        //Solution 2
        // $strMap1 = $strMap2 = array();
        // $sLength = strlen($s);
        // $tLength = strlen($t);
        // if($sLength != $tLength) return false;

        // for($i = 0; $i < $sLength; $i++){
        //     if(isset($strMap1[$s[$i]])){
        //     if($strMap1[$s[$i]] != $t[$i]) {
        //         return false;
        //     }
        //     }else{
        //         $strMap1[$s[$i]] = $t[$i];
        //     }

        //     if(isset($strMap2[$t[$i]])){
        //     if($strMap2[$t[$i]] != $s[$i]) {
        //         return false;
        //     }
        //     }else{
        //         $strMap2[$t[$i]] = $s[$i];
        //     }
        // }
        // return true;
    }
}