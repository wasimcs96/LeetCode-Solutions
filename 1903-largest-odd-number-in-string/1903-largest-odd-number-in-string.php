class Solution {

    /**
     * @param String $num
     * @return String
     */
    function largestOddNumber($num) {
        //$num = trim($num);
        $stringLength = strlen($num);

        if($stringLength == 0) return "";

        $maxOddNumberLastDigit = -1;
        for($i=$stringLength - 1;$i>=0;$i--){
            if($num[$i] % 2 != 0){
                $maxOddNumberLastDigit = $i;
                break;
            }
        }
        $ans = "";
        for($i=0;$i<=$maxOddNumberLastDigit;$i++){
            if($num[$i] == '0' && $ans == "") continue;
            $ans .= $num[$i];
        }
        return $ans;


        // Similer sort version
        // $low = 0; $high = strlen($num)-1;

        // while($high >= $low){
        // if($num[$high] % 2 != 0){
        //     return substr($num, 0, $high+1);
        // }
        // $high--;
        // }
        // return "";
    }
}