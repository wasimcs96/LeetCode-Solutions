class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if(empty($strs)) return "";
    
        if(count($strs) == 1) return $strs[0];

        sort($strs);
        $first = $strs[0];
        $last = $strs[count($strs) - 1];

        $commonPrefix = "";
        $minLength = min(strlen($first), strlen($last));

        for ($i = 0; $i < $minLength; $i++) {
            if ($first[$i] === $last[$i]) {
                $commonPrefix .= $first[$i];
            } else {
                break;
            }
        }

        return $commonPrefix;
        }
}