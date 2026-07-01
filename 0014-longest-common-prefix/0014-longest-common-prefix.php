class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        // If array is empty, there is no common prefix.
        if (empty($strs)) return "";

        // If only one string exists,
        // that string itself is the answer.
        if (count($strs) == 1) return $strs[0];

        // Sort strings in lexicographical (dictionary) order.
        sort($strs);
        // Smallest string after sorting.
        $first = $strs[0];
        // Largest string after sorting.
        $last = $strs[count($strs) - 1];

        // Stores the final common prefix.
        $commonPrefix = "";
        // We only compare up to the length of the smaller string.
        $minLength = min(strlen($first), strlen($last));

        // Compare characters one by one.
        for ($i = 0; $i < $minLength; $i++) {

            // If characters match,
            // add them into answer.
            if ($first[$i] === $last[$i]) {
                $commonPrefix .= $first[$i];
            } else {
                // First mismatch found.
                // No more common prefix exists.
                break;
            }
        }

        return $commonPrefix;
    }
}