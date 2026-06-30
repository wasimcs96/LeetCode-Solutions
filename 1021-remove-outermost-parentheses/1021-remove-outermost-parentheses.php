class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeOuterParentheses($s) {
        $ans = ""; $openParenthesisCount = 0;

          for($i=0;$i<strlen($s);$i++){
            $str = $s[$i];

            if($str == "("){
                $openParenthesisCount++;
                if($openParenthesisCount != 1) $ans .= $str;
            }else{
                $openParenthesisCount--;
                if($openParenthesisCount != 0) $ans .= $str;
            }
          }
          return $ans;
    }
}