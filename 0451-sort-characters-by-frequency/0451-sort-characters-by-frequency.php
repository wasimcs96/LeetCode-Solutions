class Solution {

    /**
     * @param String $s
     * @return String
     */
    function frequencySort($s)
    {
        // Find length of the string
        $sLength = strlen($s);

        // If string contains 0 or 1 character,
        // it is already sorted.
        if ($sLength <= 1) {
            return $s;
        }

        // ---------------------------------------
        // Step 1:
        // Count frequency of every character.
        // ---------------------------------------
        //
        // Example:
        // "tree"
        //
        // Frequency Map
        // t => 1
        // r => 1
        // e => 2
        //
        $frequencyMap = [];

        foreach (str_split($s) as $char) {
            // If character appears first time
            if (!isset($frequencyMap[$char])) {
                $frequencyMap[$char] = 1;
            } else {
                // Increase frequency
                $frequencyMap[$char]++;
            }
        }

        // ---------------------------------------
        // Step 2:
        // Reverse the mapping.
        //
        // Character -> Count
        //
        // becomes
        //
        // Count -> List of Characters
        // ---------------------------------------

        $finalHashMap = [];
        foreach ($frequencyMap as $char => $count) {
            // Multiple characters may have
            // the same frequency.
            $finalHashMap[$count][] = $char;
        }
        /*
            Example
            Frequency Map
            t => 1
            r => 1
            e => 2

            Final Hash Map
            1 => [t,r]
            2 => [e]
        */

        // Sort frequencies in descending order.
        //
        // Example:
        //
        // Before
        // 1 => [t,r]
        // 2 => [e]
        //
        // After
        // 2 => [e]
        // 1 => [t,r]
        //
        krsort($finalHashMap);
        // Final answer
        $answer = "";
        // Traverse frequencies from highest to lowest.
        foreach ($finalHashMap as $count => $chars) {
            // If two characters have same frequency,
            // sort them alphabetically.
            sort($chars);
            foreach ($chars as $char) {
                // Repeat current character
                // exactly 'count' times.
                $j = $count;
                while ($j--) {
                    $answer .= $char;
                }
            }
        }
        return $answer;
    }
}