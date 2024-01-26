class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        //2,1,5,4,3,0,0
        //2,3,0,0,1,4,5
        $swapfirstIndex = "";
        $swapSecondIndex = "";
        
        for($i=count($nums)-2;$i>=0;$i--){
            if($nums[$i]<$nums[$i+1]){
                $swapfirstIndex = $i; //1
                break;
            }
        }

        if($i==-1) return sort($nums); //all in descending order so next permutation will be original array get after sort given array

        if($swapfirstIndex != ""){
            for($i=count($nums)-1;$i>$swapfirstIndex;$i--){
              if($nums[$i]>$nums[$swapfirstIndex]){ //give greate then 1 is 3 => 2,"1",5,4,"3"
                  $swapSecondIndex = $i;
                  list($nums[$swapSecondIndex], $nums[$swapfirstIndex]) = array($nums[$swapfirstIndex], $nums[$swapSecondIndex]); //after swap 2,3,5,4,1
                  break;
              }
            }
        }
        $arr1 = [];
        $arr1 = array_slice($nums, 0, $swapfirstIndex+1);
        $nums = array_slice($nums, $swapfirstIndex+1); //make min number after 3 sort this array
        sort($nums);
        $nums = array_merge($arr1, $nums);
        return;
    }
}