class Solution {

    /**
     * @param Integer[] $bills
     * @return Boolean
     */
    function lemonadeChange($bills) {
        $arrLength = count($bills);
        if($arrLength == 0) return false;

        $five = $ten = 0;
        for($i = 0; $i < $arrLength ; $i++){
            if($bills[$i] == 5) {
                $five++;
            }elseif($bills[$i] == 10){
                if($five > 0) {
                    $five--;
                    $ten++;
                }else{
                    return false;
                }
            }else{
                if($five > 0 && $ten > 0){
                    $five--;
                    $ten--;
                }elseif($five >= 3){
                    $five -= 3;
                }else{
                    return false;
                }
            }
        }

        return true;
    }
}