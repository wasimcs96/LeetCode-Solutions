class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        if(empty($s)) return true;
        $splitStr = str_split($s);
        $strLength = count($splitStr);
        $newStr = [];
        if($strLength == 1 && ctype_alnum($s)) return true;
        foreach($splitStr as $key => $value){
            if(ctype_alnum($value)){
                $newStr[] = strtolower($splitStr[$key]);
            }
        }
        if(count($newStr) == 1 || count($newStr) == 0) return true;
        return $this->checkString($newStr, 0, count($newStr) - 1);
    }

    function checkString($strArr, $i, $j){
         if($i >= $j) return true;
         if($strArr[$i] != $strArr[$j]) return false;
         $i++;
         $j--;
         return $this->checkString($strArr, $i, $j);
    }
}