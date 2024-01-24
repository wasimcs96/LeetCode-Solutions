class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $ans = [];
        $count = count($nums);
        if($count ==  0){
          return $ans;
        }else{
          $this->permutation($nums, $count, 0, $ans);
          return $ans;
        }
    }

    function permutation($input, $count, $pos, &$ans){

        if($pos >= $count){
            $ans[] = $input;
            return;
        }

        for($i=$pos; $i<$count;$i++){
            //swap
            $temp = $input[$i];
            $input[$i] = $input[$pos];
            $input[$pos] = $temp;

            //recursion
            $this->permutation($input, $count, $pos+1, $ans);

            //swap //backtracking
            $temp = $input[$i];
            $input[$i] = $input[$pos];
            $input[$pos] = $temp;
        }
    }
}