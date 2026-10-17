class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $arrLength = count($numbers);

        $right = $arrLength-1;
        $left = 0;

        while($left < $right){
            $sum = $numbers[$left] + $numbers[$right];
            
            if($sum > $target){
                $right--;
            }elseif($sum < $target){
                $left++;
            }else{
                return [$left+1 , $right+1];
            }
        }

        return [-1,-1];
    }
}