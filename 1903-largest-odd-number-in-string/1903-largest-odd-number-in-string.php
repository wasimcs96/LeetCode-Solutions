class Solution {

    /**
     * @param String $num
     * @return String
     */
    function largestOddNumber($num) {
      $temp = "";
      $low = 0; $high = strlen($num)-1;

      while($high >= $low){
        if($num[$high] % 2 == 0){
            $num = substr($num, 0, -1);
        }else{
          return $num;
        }
        $high--;
      }
      return $num;
    }
}