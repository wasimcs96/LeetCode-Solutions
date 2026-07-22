class Solution {

    /**
     * @param String $s
     * @return String
     */

    function reverseWords($s) {
    trim($s);
    $length = strlen($s);
    if($length == 0) return "";

    $tempStr = $finalStr = ""; 
    for($i=0;$i<$length;$i++){
        $chr = $s[$i];
        
        if($chr != " "){
            $tempStr .= $chr;
        }else{
            $finalStr = trim($tempStr) ." ". trim($finalStr);
            $tempStr = "";
        }

        //echo $tempStr."\n";
    }
    if($tempStr != ""){
        $finalStr = trim($tempStr) ." ". trim($finalStr);
    }


    return trim($finalStr);
    
}
    function reverseWordss($s) {
        $s = trim($s);
        $stringLength = strlen($s);

        if($stringLength == 0) return "";

        $tempWord = ""; $finalStr = "";
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

    //With Comments
    function reverseWord($s)
    {
        // Remove leading and trailing spaces
        $s = trim($s);

        // Find the length of the trimmed string
        $stringLength = strlen($s);

        // If the string is empty after trimming, return an empty string
        if ($stringLength == 0) {
            return "";
        }

        // Stores the current word while traversing the string
        $tempWord = "";

        // Stores the final answer in reverse order
        $finalStr = "";

        // Traverse each character of the string
        for ($i = 0; $i < $stringLength; $i++) {

            // Get current character
            $str = $s[$i];

            // If current character is NOT a space,
            // keep building the current word
            if ($str != ' ') {

                $tempWord .= $str;

            } else {

                // Remove extra spaces from the current word
                $tempWord = trim($tempWord);

                // Ignore consecutive spaces
                if (!empty($tempWord)) {

                    // Insert current word at the beginning
                    if (!empty($finalStr)) {
                        $finalStr = $tempWord . " " . $finalStr;
                    } else {
                        // First word
                        $finalStr = $tempWord;
                    }
                }

                // Reset for the next word
                $tempWord = "";
            }
        }

        // Process the last word because the loop ends without a trailing space
        $tempWord = trim($tempWord);

        if (!empty($tempWord)) {
            if (!empty($finalStr)) {
                $finalStr = $tempWord . " " . $finalStr;
            } else {
                $finalStr = $tempWord;
            }
        }

        // Return reversed string
        return $finalStr;
    }
}