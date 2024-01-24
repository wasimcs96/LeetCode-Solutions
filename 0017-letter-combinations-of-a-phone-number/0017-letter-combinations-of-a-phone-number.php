class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        $ans = [];
        $output = "";
        $index = 0;
        $mapping = ["", "", "abc", "def", "ghi", "jkl", "mno", "pqrs", "tuv", "wxyz"];
        if(strlen($digits) == 0){
            return $ans;
        }
        $this->getletterCombination($digits, $index, $output, $ans, $mapping);
        return $ans;
    }

    function getletterCombination($digits, $index, $output, &$ans, $mapping){
        if($index == strlen($digits)){
            array_push($ans, $output); 
            return;
        }
        $number = $digits[$index];
        $string = $mapping[$number];
        
        for($i=0;$i<strlen($string);$i++){
            $output .= $string[$i];
            $this->getletterCombination($digits, $index+1, $output, $ans, $mapping);
            $output = substr($output, 0, -1);
        }
    }
}