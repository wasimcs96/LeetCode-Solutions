class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        if(empty($s)) return true;
        $stack = array(); $top = -1;
        $length = strlen($s);
        for($i = 0; $i < $length; $i++) {
            $char = $s[$i];
            if($char == '(' || $char == '{' || $char == '['){
                $top++;
                array_push($stack, $char);
            }elseif(($char == ')' &&  $stack[$top] == '(')|| ($char == '}' &&  $stack[$top] == '{') || ($char == ']' && $stack[$top] == '[')){
                $top--;
                array_pop($stack);
            }
            else{   
                return false;
            }
        }  

        return empty($stack);

    }
}