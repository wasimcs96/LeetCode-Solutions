class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        //sort both string and compare both char one by one
        //OR use hasmap and store first string chr and unset for second string 
        $sLength = strlen($s);
        $tLength = strlen($t);

        if($sLength != $tLength) return false;

        $hashMap = array_fill(0,26,0);
        
        for($i=0;$i<$sLength;$i++){
            $chr = $s[$i];
            $hashMap[ord($chr) - ord('a')]++;
        }
        for($i=0;$i<$tLength;$i++){
            $chr = $t[$i];
            $hashMap[ord($chr) - ord('a')]--;
        }
        for($i=0;$i<26;$i++){
            if($hashMap[$i] != 0) return false;
        }

        return true;
    }
}