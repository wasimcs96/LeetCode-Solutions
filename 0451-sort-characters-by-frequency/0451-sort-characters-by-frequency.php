class Solution {

    /**
     * @param String $s
     * @return String
     */
    function frequencySort($s) {
      $ans = "";
      if(empty($s)) return $ans;

      $chrArr=array();
      $strLen = strlen($s);

      for($i=0;$i<$strLen;$i++){
        $chrArr[ord($s[$i])] = isset($chrArr[ord($s[$i])]) ? ++$chrArr[ord($s[$i])] : 1;
      }

      $chrCountMap=array();
      foreach($chrArr as $chr => $count){
          $chrCountMap[$count][] = $chr;
      }
      krsort($chrCountMap); 

      foreach($chrCountMap as $key=>$insideArr){
        sort($insideArr);
        foreach($insideArr as $value){
          $j=$key;
          while($j>0){
            $ans .= chr($value);
            $j--;
          }
        }
      }
      return $ans;
    }
}