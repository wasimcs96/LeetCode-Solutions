class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function beautySum($s) {
        $length = strlen($s);
        if($length == 0 || $length == 1) return 0;

        $freqMap = [];
        $result = 0;
        
        for($i=0;$i<$length;$i++){
            $freqMap = [];
            for($j=$i;$j<$length;$j++){
                $chr = $s[$j];

                if(isset($freqMap[$chr])) $freqMap[$chr]++;
                else $freqMap[$chr] = 1;

                $result += max($freqMap) - min($freqMap);
            }
        }

        return $result;
        
    }
}