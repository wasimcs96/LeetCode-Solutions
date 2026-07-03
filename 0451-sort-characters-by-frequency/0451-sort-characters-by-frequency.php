class Solution {

    /**
     * @param String $s
     * @return String
     */
    function frequencySort($s) {
        $sLength = strlen($s);
        if($sLength <= 1) return $s;

        $frequancyMap = [];
        foreach(str_split($s) as $char){
            if(!isset($frequancyMap[$char])){
                $frequancyMap[$char] = 1;
            }else{
                $frequancyMap[$char]++;
            }
        }
        
        $finalHashMap = [];
        foreach($frequancyMap as $char => $count){
            $finalHashMap[$count][] = $char;
        }
        krsort($finalHashMap);
        
        $answer = "";
        foreach($finalHashMap as $count => $chars){
            sort($chars);
            foreach($chars as $char){
                $j = $count;
                while($j--){
                    $answer .= $char;
                }
                
            }
        }
        return $answer;
    }
}