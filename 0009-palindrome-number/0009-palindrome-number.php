class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x < 0) return false;
        $n = $x; $reverseNumber = 0;
        while((int)$n > 0){
            $digit = $n % 10;
            $reverseNumber = $reverseNumber * 10 +  $digit;
            $n = $n / 10;
        }
        if($x == $reverseNumber) return true;
        return false;
    }
}