class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $arrLength = count($nums);
        $tempSum = 0; $maxSum = PHP_INT_MIN; $tempStr = -1; $maxSumArrStrIndex = $maxSumArrEndIndex = -1;
        for($i=0; $i < $arrLength; $i++){
            if($tempSum == 0){
                $tempStr = $i; // Starting index of the current subarray 
            }
            $tempSum += $nums[$i]; // Update tempSum by adding the current element to it 
            if($tempSum > $maxSum){ // Update maxSum and the corresponding indices if a new maximum is found 
                $maxSum = $tempSum; // Update maxSum with the new maximum sum found
                $maxSumArrStrIndex = $tempStr; // Update the starting index of the maximum sum subarray to the current tempStr index 
                $maxSumArrEndIndex = $i;// Update the ending index of the maximum sum subarray to the current index 
            }

            if($tempSum < 0) $tempSum = 0; // Reset tempSum to 0 if it becomes negative, as a negative sum would not contribute to a maximum sum in future iterations 
        }
        return $maxSum;
    }
}