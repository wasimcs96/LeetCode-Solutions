class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        //sort both string and compare both char one by one
        //OR use hasmap and store first string chr and unset for second string 
        $strLen1 = strlen($s);
        $strLen2 = strlen($t);
        $chrHasMap = array();
        for ($i = 0; $i < $strLen1; $i++) {
          if(isset($chrHasMap[$s[$i]])){
            $chrHasMap[$s[$i]]++;
          }else{
            $chrHasMap[$s[$i]] = 1;
          }
        }

        for ($i = 0; $i < $strLen2; $i++) {
          if(isset($chrHasMap[$t[$i]])){
            if($chrHasMap[$t[$i]] > 0) {
              $chrHasMap[$t[$i]]--;
              if($chrHasMap[$t[$i]] == 0){
                unset($chrHasMap[$t[$i]]);
              }
            }else{
              return false;
            }
          }else{
            return false;
          }
        }
        return count($chrHasMap) == 0 ? true : false;
    }
}