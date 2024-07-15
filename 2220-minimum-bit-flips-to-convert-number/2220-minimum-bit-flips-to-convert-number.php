class Solution {

    /**
     * @param Integer $start
     * @param Integer $goal
     * @return Integer
     */
    function minBitFlips($start, $goal) {
        $sbin = $this->decToBin($start);
        $gbin = $this->decToBin($goal);
        $i=0; $count=0;
        
        //second approch
        //1010 ^ 0111 = 1101
        $ans = $start ^ $goal; //XOR tells us result bits have unmatched bit 1 => 1 ($start's bit), 0 ( $goal's bit)
        
        while($i < 32){
            //if(($start & (1 << $i)) != ($goal & (1 << $i))) $count++;
            
            //second approch
            if(($ans & (1 << $i))) $count++;
            $i++;
        }
        return $count;
    }
    
    
    function decToBin($dec){
        $bin = '';
        while($dec){
            $bin = ($dec % 2) . $bin;
            $dec = floor($dec / 2);
        }
        return $bin;
    }
}