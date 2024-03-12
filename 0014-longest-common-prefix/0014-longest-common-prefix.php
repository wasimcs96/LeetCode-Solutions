class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $length = count($strs);
        if($length == 1) return $strs[0];
        $ans = ""; $chrIndex=0;$isCommon = true; 
        while($isCommon){
          for($i = 1; $i < $length; $i++) {
            $currStr = $strs[$i]; 
            if(isset($currStr[$chrIndex]) && $currStr[$chrIndex] == $strs[0][$chrIndex]){
              $isCommon = true;
            }else{
              $isCommon = false;
              break;
            }
          }
          if($isCommon) {
            $ans .= $strs[0][$chrIndex]; $chrIndex++;
          }
        }
        return $ans;
    }
}