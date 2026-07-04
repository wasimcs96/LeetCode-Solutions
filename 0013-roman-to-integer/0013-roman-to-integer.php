class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $romanMap = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
        'IV' => 4,
        'IX' => 9,
        'XL' => 40,
        'XC' => 90,
        'CD' => 400,
        'CM' => 900
        ];

        $total = 0;
        $i = 0;
        while ($i < strlen($s)) {
            if($i+1 < strlen($s) && isset($romanMap[$s[$i].$s[$i+1]])){
                $total += $romanMap[$s[$i].$s[$i+1]];
                $i += 2;
            }
            else {
                $total += $romanMap[$s[$i]];
                $i++;
            }
        }

        return $total;
    }
}