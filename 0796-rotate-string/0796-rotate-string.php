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

        $concatenatedString = $s . $s;
        //abc
        //bca
        //strpos(abcabc, bca); return true
        return strpos($concatenatedString,$goal) !== false;
        //OR
        // for($i=0;$i<2*$sLength;$i++){
        //     $tempString = "";
        //     for($j=$i;$j<$sLength+$i;$j++){
        //         $tempString .= $concatenatedString[$j];
        //     }
        //     if($tempString == $goal){
        //         return true;
        //     }
        // }
        // return false;

        //Another Approch
        // $rotation = 1;
        //     while($rotation <= $sLength){  
        //       $newStr = substr($s, $rotation, $sLength).substr($s, 0, $rotation);
        //       if($newStr == $goal) return true;
        //       $rotation++;
        //     }

        //Another Approch
        //$s .= $s; //abc => abcabc and gaol=cba , bca exits in abcabc
        //return strpos($s,$goal) !== false; //u can use for loop to get bca in string

        //Another Approch
        // $array = str_split($s);

        // for ($i = 0; $i < count($array); $i++) {
        //         $first_letter = array_shift($array);

        //         $array[] = $first_letter;

        //         if (implode($array) === $goal) {
        //             return true;
        //         }
        //     }
    }
}