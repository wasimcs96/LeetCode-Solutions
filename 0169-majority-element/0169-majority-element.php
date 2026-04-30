class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $counter = 0;
        $candidate = 0;

        foreach($nums as $num){
            if($counter == 0){
                $candidate = $num;
                $counter = 1;
            }elseif($candidate == $num){
                $counter++;
            }else{
                $counter--;
            }
        }
        $counter = 0;
        foreach($nums as $num){
            if($num == $candidate){
                $counter++;
            }
        }
        $majorityNumber = count($nums)/2;
        if($counter > $majorityNumber){
            return $candidate;
        }
    }
}