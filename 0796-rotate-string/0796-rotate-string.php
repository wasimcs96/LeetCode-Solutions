class Solution {

    /**
     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    function rotateString($s, $goal) {
        $sLength = strlen($s);
        $goalLength = strlen($goal);

        if($sLength != $goalLength) return false;
        $rotation = 1;
        while($rotation <= $sLength){  
          $newStr = substr($s, $rotation, $sLength).substr($s, 0, $rotation);
          if($newStr == $goal) return true;
          $rotation++;
        }
        return false;
    }
}