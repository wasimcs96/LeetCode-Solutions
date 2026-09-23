class Solution {

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s) {
        $gSize = count($g);
        $sSize = count($s);
        if($gSize == 0 || $sSize == 0) return 0;

        sort($g);
        sort($s);

        $i = $j = 0;
        while($i < $sSize && $j < $gSize){
            //echo  $s[$i] .">=". $g[$j]."\n";
            if($s[$i] >= $g[$j]){
                $j++;
            }
            $i++;
        }
        return $j;
    }
}