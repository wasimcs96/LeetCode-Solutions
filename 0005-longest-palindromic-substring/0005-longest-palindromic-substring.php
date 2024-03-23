class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        if(empty($s)) return $s;
        $strLength = strlen($s);
        $longestPalindromeStr= "";
        //BF approch
        // for($i=0;$i<$strLength;$i++){
        //   $temp = ""; 
        //   for($j=$i;$j<$strLength;$j++){
        //     $temp .= $s[$j];
        //     if($temp == strrev($temp)){
        //       if(strlen($temp) > strlen($longestPalindromeStr))
        //         $longestPalindromeStr = $temp;
        //     }
        //   }
        // }
        
        for($i=0;$i<$strLength;$i++){
          $temp = ""; 
          $expendStr1 = $this->getExpendStr($s, $i, $i);
          echo "1-".$expendStr1."<BR>";
          $expendStr2 = $this->getExpendStr($s, $i, $i+1);
          echo "2-".$expendStr2."<BR>";
          if(strlen($expendStr1) > strlen($expendStr2)){
            $longestPalindromeStr = (strlen($longestPalindromeStr) < strlen($expendStr1)) ? $expendStr1 : $longestPalindromeStr;
          }else{
            $longestPalindromeStr = (strlen($longestPalindromeStr) < strlen($expendStr2)) ? $expendStr2 : $longestPalindromeStr;
          }
        }
        return $longestPalindromeStr;
    }
    
    function getExpendStr($s, $left, $right){
      $strlen = strlen($s); $temp = '';
      while($left >= 0 && $right < $strlen && $s[$left] == $s[$right]){
        $temp = ($left == $right) ? $s[$left].$temp : $s[$left].$temp.$s[$right];
        $right++;
        $left--;
      }
      return $temp;
    }
}