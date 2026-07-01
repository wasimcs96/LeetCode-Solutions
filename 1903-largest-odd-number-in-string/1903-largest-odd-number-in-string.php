class Solution {

    /**
     * @param String $num
     * @return String
     */
    function largestOddNumber($num) {
        // Remove leading and trailing spaces
        $num = trim($num);

        // Find length of the string
        $stringLength = strlen($num);

        // If string is empty, nothing to process
        if ($stringLength == 0) return "";

        // Stores index of the last odd digit.
        // -1 means no odd digit found yet.
        $maxOddNumberLastDigit = -1;

        // Traverse from right to left because
        // we need the RIGHTMOST odd digit.
        for ($i = $stringLength - 1; $i >= 0; $i--) {
            // Convert character into number implicitly
            // and check if it is odd.
            if ($num[$i] % 2 != 0) {
                // Save index of odd digit
                $maxOddNumberLastDigit = $i;

                // No need to continue.
                // This is the largest possible odd substring.
                break;
            }
        }

        // Final answer
        $ans = "";

        // Copy characters from beginning
        // until the last odd digit.
        for ($i = 0; $i <= $maxOddNumberLastDigit; $i++) {
            // Skip leading zeros.
            // Example:
            // "000123" -> "123"
            if ($num[$i] == '0' && $ans == "")
                continue;

            // Append current digit
            $ans .= $num[$i];
        }

        return $ans;

        // Similer sort version
        // $low = 0; $high = strlen($num)-1;

        // while($high >= $low){
        // if($num[$high] % 2 != 0){
        //     return substr($num, 0, $high+1);
        // }
        // $high--;
        // }
        // return "";
    }
}