class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
        //Approach 1: Sort linearly and count consecutive sequences 
        // Dry Run  ->  $nums = [100,4,200,1,3,2]
        // After sorting: [1,2,3,4,100,200]
        // Count consecutive sequences: 1,2,3,4 is length 4; 100 alone is length 1; 200 alone is length 1. Max length = 4. 
        // Output: 4  (sequence 1,2,3,4)
        // sort($nums); // O(n log n)
        // $maxCount = 0;
        // for($i = 0; $i < count($nums); $i++){
        //     $tempCount = 1;
        //     for($j = $i + 1; $j < count($nums); $j++){
        //         if($nums[$j] == $nums[$j - 1]) continue; // Skip duplicates
        //         else if($nums[$j] == $nums[$j - 1] + 1){
        //             $tempCount++;
        //         } else {
        //             break; // Break if the sequence is not consecutive
        //         }
        //     }
        //     $maxCount = max($maxCount, $tempCount);
        // }
        // echo "Longest Consecutive Sequence Length (Approach 1): " . $maxCount . "\n";

        //Approach 2: HashSet for O(n) time complexity
        // Dry Run  ->  $nums = [100,4,200,1,3,2]
        // Set: {100,4,200,1,3,2}
        // num=100: no 99 in set -> count 100 only -> len=1
        // num=4:   3 in set -> skip (not a start)
        // num=200: no 199 -> len=1
        // num=1:   no 0 -> count 1,2,3,4 -> len=4
        // Output: 4  (sequence 1,2,3,4)
        // $numsSet = array_flip($nums); // Convert to associative array for O(1) lookup
        // $maxCount = 0;
        // foreach($nums as $num){
        //     // Only start counting if this is the beginning of a sequence like 1, not 2 or 3 which would have been counted when we started at 1 
        //     if(!isset($numsSet[$num - 1])){ //0 for 1// Check if the previous number is not in the set, meaning this is the start of a sequence for example 1, not 2 or 3 which would have been counted when we started at 1 
        //         $tempCount = 1;
        //         //  Keep counting the next consecutive numbers like 2, 3, 4... until we find a gap 
        //         // 1+1=2, 1+2=3, 1+3=4...
        //         while(isset($numsSet[$num + $tempCount])){ // Check for the next consecutive number 
        //             $tempCount++;
        //         }
        //         $maxCount = max($maxCount, $tempCount);
        //     }
        // }
        // echo "Longest Consecutive Sequence Length (Approach 2): " . $maxCount . "\n";

        //Approach 3: HashMap with memoization to store sequence lengths
        // DRY AND RUN BASED ON. BELOW APPROACH 3 
        // Dry Run  ->  $nums = [100,4,200,1,3,2]
        // Set: {100,4,200,1,3,2}
        $maxCount = 0;
        $hash = [];
        $count = count($nums);

        // Initialize hash map with all numbers as keys and 0 as value (indicating unvisited) 
        for($i = 0; $i < $count; $i++){
            $hash[$nums[$i]] = 0;
        }
        // Iterate through each number in the hash map 
        foreach($hash as $key => $val){
            //if key = 5 then while will check 6,7,8
            $counter=0;
            $counterStart = $key; //5
            // Only start counting if this is the beginning of a sequence (i.e., key-1 is not in hash) 
            if(!isset($hash[$key - 1])){ // Check if the previous number is not in the hash map, meaning this is the start of a sequence for example 1, not 2 or 3 which would have been counted when we started at 1 
                while(isset($hash[$key])){ //check 5,6,7,8....  // Check if the current key exists in the hash map, meaning it's part of the current sequence   
                    if($hash[$key] != 0){ //if already calculated for 6 will be 3 =>6,7,8 
                        $counter += $hash[$key]; // Add the count of the sequence starting from this key 
                        unset($hash[$key]);
                    }
                    else{
                        unset($hash[$key]); // Mark as visited 
                        $counter++;
                        $key++;
                    }
                
                }
                $hash[$counterStart] = $counter; // Store the count of the sequence starting from the original key (e.g., 5 => 4 for 5,6,7,8) 
                $maxCount = max($maxCount, $counter);
                //print_r($hash); die;
            }
        }
        return $maxCount;

        //Sort Version
        // $max = 0; $tempSeqCount = 1; $hashMap = [];
        // $hashMap = array_flip($nums);
        // foreach ($hashMap as $key => $value) { 
        //     $hashMap[$key] = 0;
        // }
        // foreach ($hashMap as $key => $value) { 
        //     if(!isset($hashMap[$key-1])){
        //         $tempCount = 1;
        //         while(isset($hashMap[$key+$tempCount])){
        //             unset($hashMap[$key+$tempCount]);
        //             $tempCount++;
        //         }
        //         $hashMap[$key] = $tempCount;
        //         $max= max($max, $tempCount);
        //     }
            
        // }
        // echo $max;
    }

}