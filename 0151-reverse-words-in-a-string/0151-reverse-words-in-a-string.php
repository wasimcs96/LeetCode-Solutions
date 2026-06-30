class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $strArr = []; $finalStr = "";
        $tempWord = "";
        $s = trim($s);
        $stringLength = strlen($s);

        if($stringLength == 0) return "";

        for($i=0;$i<$stringLength;$i++){
            $str = $s[$i];
            
            if($str != ' '){
                $tempWord .= $str;
            }else{
                $tempWord = trim($tempWord);

                if(!empty($finalStr)) $finalStr  = $tempWord ." ". trim($finalStr);
                else $finalStr = $tempWord;

                $tempWord = "";
            }
        }
        $tempWord = trim($tempWord);
        if(!empty($finalStr)) $finalStr  = $tempWord ." ". trim($finalStr);
        else $finalStr = $tempWord;
        
        return $finalStr;
    }
}