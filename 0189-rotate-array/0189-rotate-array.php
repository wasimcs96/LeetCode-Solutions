class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $arrLength = count($nums);
        if($k == 0 ||  $arrLength == 1) return;

        $k = (int) $k % $arrLength;

        //Example: For Right Rotate Just a simple logic. [-> 1, 2, 3, 4, | 5, 6, 7 ->]
        //Let's say we have an array [1, 2, 3, 4, 5, 6, 7] and we want to rotate it to the right by 3 positions. The steps would be as follows:
        //1. Reverse the last k elements: Reverse the last 3 elements [5, 6, 7] to get [7, 6, 5]. The array now
        //   looks like this: [1, 2, 3, 4, 7, 6, 5].
        //2. Reverse the first n-k elements: Reverse the first 4 elements [1, 2, 3, 4] to get [4, 3, 2
        //   , 1]. The array now looks like this: [4, 3, 2, 1, 7, 6, 5].
        //3. Reverse the entire array: Reverse the entire array [4, 3, 2, 1, 7, 6, 5] to get [5, 6, 7, 1, 2, 3, 4]. The final array is the rotated version of the original array.
        $this->reverse($nums, 0, $arrLength-$k-1);
        $this->reverse($nums, $arrLength-$k, $arrLength-1);
        $this->reverse($nums, 0, $arrLength-1);

        //for Left Roate Just a simple logic [<- 1, 2, 3,| 4, 5, 6, 7 <-]
        //Example: For Right Rotate Just a simple logic Let's say we have an array [1, 2, 3, 4, 5, 6, 7] and we want to rotate it to the left by 3 positions. The steps would be as follows:
        //1. Reverse the first k elements: Reverse the first 3 elements [1, 2, 3] to get [3, 2, 1]. The array now looks like this: [3, 2, 1, 4, 5, 6, 7].
        //2. Reverse the remaining n-k elements: Reverse the remaining 4 elements [4, 5, 6, 7] to get [7, 6, 5, 4]. The array now looks like this: [3, 2, 1, 7, 6, 5, 4].
        //3. Reverse the entire array: Reverse the entire array [3, 2, 1, 7, 6, 5, 4] to get [4, 5, 6, 7, 1, 2, 3]. The final array is the rotated version of the original array.   
        // $this->reverse($nums, 0, $k-1); 
        // $this->reverse($nums, $k, $arrLength-1);
        // $this->reverse($nums, 0, $arrLength-1);
    }

    function reverse(&$arr, $st, $ed){
        while($st < $ed){
            list($arr[$st], $arr[$ed]) = [$arr[$ed], $arr[$st]];
            $st++; $ed--;
        }
    }
}