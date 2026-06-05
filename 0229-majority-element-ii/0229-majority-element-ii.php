class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function majorityElement($nums) {
        $candidate_1 = $candidate_2 = null;
        $count_1 = $count_2 = 0;
        $ans = [];

        foreach($nums as $num){
            if($count_1 === 0 && $num !== $candidate_2){
                $candidate_1 = $num;
                $count_1++;
            }elseif($count_2 === 0 && $num !== $candidate_1){
                $candidate_2 = $num;
                $count_2++;
            }elseif($num === $candidate_1){
                $count_1++;
            }elseif($num === $candidate_2){
                $count_2++;
            }else{
                $count_1--;
                $count_2--;
            }
        }

        $firstCandidateCount = $secondCandidateCount = 0;
        foreach($nums as $num){
            if($num == $candidate_1){
                $firstCandidateCount++;
            }
            elseif($num == $candidate_2){
                $secondCandidateCount++;
            }
        }

        $eligibleCandidateCounter = (int) (count($nums)/3);
        if($firstCandidateCount != 0 && $firstCandidateCount > $eligibleCandidateCounter) $ans[] = $candidate_1;
        if($secondCandidateCount != 0 && $secondCandidateCount > $eligibleCandidateCounter) $ans[] = $candidate_2;

        return $ans;

    }
}