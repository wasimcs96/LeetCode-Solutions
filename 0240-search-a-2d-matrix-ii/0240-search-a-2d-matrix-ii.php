class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        return $this->getSearchValue($matrix, $target);
    }
    
    function getSearchValue($mat, $target){
        //you can any corner from matrix , according corner row and col value will be chnage.
        $ans = false; $n = count($mat)-1; $m = count($mat[0])-1;
        $row = $n;$col = 0; //start from 18 and flow if less target then cot++
        while ($row >= 0  && $col <= $m) {
            if($mat[$row][$col] == $target) {
              return true;
            }
            elseif($mat[$row][$col] < $target) {
              $col++;
            }
            else {
              $row--;
            }
          }
          return $ans;
        
    }
}