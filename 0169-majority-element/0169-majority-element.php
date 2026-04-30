class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $counter = 0;
        $candidate = 0;

        foreach($nums as $num){
            if($counter == 0){ // If counter is 0, we need to choose a new candidate for majority element 
                $candidate = $num; 
                $counter = 1; // Reset counter to 1 for the new candidate 
            }elseif($candidate == $num){ // If the current number is the same as the candidate, we increment the counter as it supports the candidate being the majority element 
                $counter++;     
            }else{ // If the current number is different from the candidate, we decrement the counter as it cancels out one occurrence of the candidate 
                $counter--;
            }
        }
        $counter = 0; // Reset counter to verify if the candidate is actually the majority element 
        foreach($nums as $num){ 
            if($num == $candidate){ 
                $counter++; 
            }
        }
        $majorityNumber = count($nums)/2; // Calculate the threshold for majority element (more than n/2 occurrences) 
        if($counter > $majorityNumber){ 
            return $candidate;
        }
    }
}