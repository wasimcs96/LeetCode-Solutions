/** 
 * The API guess is defined in the parent class.
 * @param  num   your guess
 * @return 	     -1 if num is higher than the picked number
 *			      1 if num is lower than the picked number
 *               otherwise return 0
 * public function guess($num){}
 */

class Solution extends GuessGame {
    /**
     * @param  Integer  $n
     * @return Integer
     */
    function guessNumber($n) {
        $low = 1;
        $high = $n;

        while($low <= $high){
            $num = (int) (($low+$high)/2);
            $result = $this->guess($num);
            if($result == -1){
                $high = $num - 1;
            }elseif($result  == 1 ){
                $low = $num + 1;
            }else{
                return $num;
            }
        }
    }
}