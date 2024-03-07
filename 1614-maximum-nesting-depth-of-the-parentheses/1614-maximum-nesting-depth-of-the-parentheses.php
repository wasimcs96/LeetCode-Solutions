class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxDepth($s) {
        if(empty($s)) return 0;
        $depth = 0; $maxDepth = 0; $strLength = strlen($s);
        for($i = 0; $i < $strLength; $i++){
          if($s[$i] == '(') $depth++;
          elseif ($s[$i] == ')') $depth--;
          $maxDepth = max($depth, $maxDepth);
        }
        return $maxDepth;
    }
}