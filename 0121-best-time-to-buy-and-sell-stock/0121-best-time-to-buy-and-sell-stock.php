class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $maxProfit = 0; // Initialize maxProfit to 0, as the minimum profit we can have is 0 (if we do not make any transaction or if all transactions result in a loss). 
        $minPrice = PHP_INT_MAX; // Initialize minPrice to the maximum possible integer value to ensure that any price in the array will be less than this initial value.

        foreach ($prices as $price) {
            if($price < $minPrice){ // Check if the current price is less than the current minPrice. If it is, update minPrice to this new value, ensuring that we always have the lowest price encountered so far. 
                $minPrice = $price; // Update minPrice if the current price is less than the current minPrice, ensuring that we always have the lowest price encountered so far. 
            }else{
                $profit = $price - $minPrice; // Calculate the potential profit by subtracting the minimum price from the current price.
                if($profit > $maxProfit){ // Check if the calculated profit is greater than the current maxProfit. If it is, update maxProfit to this new value, ensuring that we always have the maximum profit encountered so far. 
                    $maxProfit = $profit; // Update maxProfit if the calculated profit is greater than the current maxProfit.
                }
            }
            //Sortest Version of above item
            //$minPrice    = min($minPrice, $price);              // Update minPrice if current price is lower than minPrice  
            //$maxProfit   = max($maxProfit, $price - $minPrice); // Update best profit if selling at current price yields better profit than maxProfit 
        }
        return $maxProfit;
    }
}