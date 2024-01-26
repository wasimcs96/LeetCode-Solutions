class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) { 
        $max_profit = 0;
        $buy = PHP_INT_MAX;
        $n=count($prices);
        
        for($i=0;$i<$n;$i++){
            if($buy > $prices[$i]){
                $buy = $prices[$i];
            }elseif($prices[$i]-$buy > $max_profit){
                $max_profit = $prices[$i]-$buy;
            }
            // $buy = min($buy, $prices[$i]);
            // $max_profit = max($max_profit, $prices[$i]-$buy);
        }
        return $max_profit;
    }
}