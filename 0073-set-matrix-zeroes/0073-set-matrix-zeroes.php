class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        //Approach - 1: Brute-force with O(m*n) space
        // Intuition: First pass to find all zeroes and store their positions in a hash map. Second pass to set rows and columns to zero based on the stored positions. This approach uses O(m*n) space in the worst case (if all elements are zero).
        // TC: O(m*n)  |  SC: O(m*n) 

        // $n = count($matrix);
        // $m = count($matrix[0]);
        // $hahmap = [];

        // for($i=0; $i<$n; $i++) {
        //     for($j=0; $j<$m; $j++) {
        //         if($matrix[$i][$j] === 0) {
        //             $hahmap[$i."-".$j] = TRUE; // Second Approch you can mark -1 and next time you can check if -1 is there then mark 0 and at last you can change all -1 to 0.
        //             //Third Approch you can create two seprate array for row and column and mark them as 0 and at last you can mark all those row and column as 0.   
        //             //Space complexity will be O(m+n) in this case.
        //         }
        //     }
        // }

        // for($i=0; $i<$n; $i++) {
        //     for($j=0; $j<$m; $j++) {
        //         if($matrix[$i][$j] === 0 && isset($hahmap[$i."-".$j])){ 
        //             $x= $i; $y = $j;
        //             while($y >= 0){
        //             $matrix[$x][$y] = 0;
        //             $y--;
        //             }
        //             $y = $j;
        //             while($m > $y){
        //             $matrix[$x][$y] = 0;
        //             $y++;
        //             }
        //             $x= $i; $y = $j;
        //             while($x >= 0){
        //             $matrix[$x][$y] = 0;
        //             $x--;
        //             }
        //             $x= $i;
        //             while($n > $x){
        //             $matrix[$x][$y] = 0;
        //             $x++;
        //             }
        //         }
        //     }
        // }


        //Approch - 2
        // Intuition: Use first row and first column as marker arrays.
        //   - matrix[i][0]=0 marks row i should be zeroed.
        //   - matrix[0][j]=0 marks col j should be zeroed.
        //   - col0 variable tracks whether column 0 itself needs zeroing
        //     (to avoid overwriting the row-0 marker).
        // TC: O(m*n)  |  SC: O(1)

        $n = count($matrix);
        $m = count($matrix[0]);
        $firstRowZero = FALSE;
        $firstColZero = FALSE;

        for($i=0; $i<$n; $i++) {
            for($j=0; $j<$m; $j++) {
                if($matrix[$i][$j] === 0) {
                    if ($i === 0) $firstRowZero = TRUE;
                    if ($j === 0) $firstColZero = TRUE;
                }
            }
        }

        for($i=1; $i<$n; $i++) {
            for($j=1; $j<$m; $j++) {
                if($matrix[$i][$j] === 0){ 
                    $matrix[0][$j] = 0;
                    $matrix[$i][0] = 0;
                }
            }
        }
        //Output of above loop will be [[0,1,0,0],
        //                             [0,4,0,2],
        //                             [1,3,1,5]
        //                            ]

        for($i=1; $i<$n; $i++) {
            for($j=1; $j<$m; $j++) {
                if($matrix[0][$j] === 0 || $matrix[$i][0] === 0){  // If any of the row or column is marked as 0 then mark all those row and column as 0. 
                    $matrix[$i][$j] = 0;
                }
            }
        }
        //Output of above loop will be [[0,1,0,0],
        //                             [0,0,0,0],
        //                             [1,3,0,5]
        //                            ]
        if($firstRowZero) { 
            for($j=0; $j<$m; $j++) {
                $matrix[0][$j] = 0;
            }
        }
        //Output of above loop will be [[0,0,0,0],
        //                             [0,0,0,0],
        //                             [1,3,0,5]
        //                            ]
        if($firstColZero) {
            for($i=0; $i<$n; $i++) {
                $matrix[$i][0] = 0;
            }
        }
        //Output of above loop will be [[0,0,0,0],
        //                             [0,0,0,0],
        //                             [0,3,0,0]
        //                            ] 
        }

        
}