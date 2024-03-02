class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $n = count($matrix); $m = count($matrix[0]); 
        return $this->getSearchValue($matrix, $n, $m, $target);
    }
    
    function getSearchValue($mat, $n, $m, $target){
      // $ans = false;
      // $getRowValue = $this->getRowValue($mat, $n, $m, $k);
      // if($getRowValue == -1) return false;
      // return $this->binerySearch($mat, $n, $m, $k, $getRowValue);
        
          $ans = false;
          $low = 0; $high = $n*$m - 1;
          while ($low <= $high) {
            $mid = (int)(($low+$high) / 2);
            $row = (int) ($mid / $m);
            $col = (int) ($mid % $m);
            if($mat[$row][$col] == $target) return true;
            elseif($mat[$row][$col] < $target) $low = $mid+1;
            else $high = $mid-1;
          }
          return $ans;
    }
    
    function getRowValue($mat, $n, $m, $k){
      $low = 0; $high = $n; $rowIndex = -1;
      while ($low <= $high) {
        $mid = (int)(($low+$high)/2);
        echo $mid;
        if($mat[$mid][$m] == $k) {
          return $mid;
          break;
        }
        if($mat[$mid][$m] > $k){
          $rowIndex = $mid;
          $high = $mid-1;
        }else{
          $low = $mid+1;
        }

      }
      return $rowIndex;
    }
    
    function binerySearch($mat, $n, $m, $k, $row){
      $low = 0; $high = $m;
      while ($low <= $high) {
        $mid = (int)(($low+$high)/2);
        echo $mid;
        if($mat[$row][$mid] == $k) {
          return true;
          break;
        }
        if($mat[$row][$mid] > $k){
          $high = $mid-1;
        }else{
          $low = $mid+1;
        }
      }
      return false;;
    }
}