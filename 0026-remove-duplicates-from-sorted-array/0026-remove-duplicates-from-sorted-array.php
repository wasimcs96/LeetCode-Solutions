class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        // $result = [];
        // foreach ($nums as $num) {
        //     if (!in_array($num, $result)) {
        //         $result[] = $num;
        //     }
        // }
        // $nums = $result;
        // return count($result);

        //striver approch
        $i = 0;
        for ($j = 1; $j < count($nums); $j++) {
          if ($nums[$i] !== $nums[$j]) {
            $i++;
            $nums[$i] = $nums[$j];
          }
        }
        return $i + 1;
      }
}