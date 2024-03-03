class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
      $ans = ""; $temp = ""; $s = trim($s);
      $low = 0; $high = strlen($s)-1;

      while ($low <= $high){ 
          if($s[$low] != ' '){
            $temp .= $s[$low];
          } else {
              if($ans != ""){
                $ans = trim($temp)." ".trim($ans);
              }else{
                $ans = trim($temp);
              }
              $temp = "";
          }
        $low++;
      }

      if($temp != ' ') {
        if($ans != ""){
          $ans = trim($temp)." ".trim($ans);
        }else{
          $ans = trim($temp);
        }
      }
      return $ans;
    }
}