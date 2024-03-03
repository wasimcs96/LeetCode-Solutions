class Solution {

    /**
     * @param String $num
     * @return String
     */
    function largestOddNumber($num) {
      $temp = "";
      $low = 0; $high = strlen($num)-1;

      while($high >= $low){
        if($num[$high] % 2 != 0){
            return substr($num, 0, $high+1);
        }
        $high--;
      }
      return "";
    }
}