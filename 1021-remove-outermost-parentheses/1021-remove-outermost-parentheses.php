class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeOuterParentheses($s) {
        // String to store the final result after removing outermost parentheses
        $ans = "";

        // Tracks the number of currently open '(' parentheses
        // It increases when we see '(' and decreases when we see ')'
        $openParenthesisCount = 0;

        // Traverse each character of the input string
        for ($i = 0; $i < strlen($s); $i++) {

            // Get the current character
            $str = $s[$i];

            // If the current character is an opening parenthesis
            if ($str == "(") {

                // Increase the count because a new '(' is encountered
                $openParenthesisCount++;

                // If count is NOT 1, it means this is NOT the outermost '('
                // So, keep it in the answer
                if ($openParenthesisCount != 1) {
                    $ans .= $str;
                }

            } else {

                // Current character is ')'
                // Decrease the count because one '(' is now closed
                $openParenthesisCount--;

                // If count is NOT 0, it means this is NOT the outermost ')'
                // So, keep it in the answer
                if ($openParenthesisCount != 0) {
                    $ans .= $str;
                }
            }
        }

        // Return the string after removing all outermost parentheses
        return $ans;
    }
}