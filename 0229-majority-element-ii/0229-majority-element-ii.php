class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function majorityElement($nums) {
        // $candidate_1 = $candidate_2 = null;
        // $count_1 = $count_2 = 0;
        // $ans = [];

        // foreach($nums as $num){
        //     if($count_1 === 0 && $num !== $candidate_2){
        //         $candidate_1 = $num;
        //         $count_1++;
        //     }elseif($count_2 === 0 && $num !== $candidate_1){
        //         $candidate_2 = $num;
        //         $count_2++;
        //     }elseif($num === $candidate_1){
        //         $count_1++;
        //     }elseif($num === $candidate_2){
        //         $count_2++;
        //     }else{
        //         $count_1--;
        //         $count_2--;
        //     }
        // }

        // $firstCandidateCount = $secondCandidateCount = 0;
        // foreach($nums as $num){
        //     if($num == $candidate_1){
        //         $firstCandidateCount++;
        //     }
        //     elseif($num == $candidate_2){
        //         $secondCandidateCount++;
        //     }
        // }

        // $eligibleCandidateCounter = (int) (count($nums)/3);
        // if($firstCandidateCount != 0 && $firstCandidateCount > $eligibleCandidateCounter) $ans[] = $candidate_1;
        // if($secondCandidateCount != 0 && $secondCandidateCount > $eligibleCandidateCounter) $ans[] = $candidate_2;

        // return $ans;

        $n     = count($nums);
        $cand1 = null;  $votes1 = 0;
        $cand2 = null;  $votes2 = 0;

        // Phase 1: Find up to 2 candidates using extended Boyer-Moore Voting
        foreach ($nums as $num) {
            if ($num === $cand1) {
                $votes1++;
            } elseif ($num === $cand2) {
                $votes2++;
            } elseif ($votes1 === 0) {
                $cand1  = $num;
                $votes1 = 1;
            } elseif ($votes2 === 0) {
                $cand2  = $num;
                $votes2 = 1;
            } else {
                $votes1--;      // Current element cancels one vote from each candidate
                $votes2--;
            }
        }

        // Phase 2: Verify candidates actually appear > n/3 times
        $count1 = 0;
        $count2 = 0;

        foreach ($nums as $num) {
            if ($num === $cand1)      { $count1++; }
            elseif ($num === $cand2)  { $count2++; }
        }

        $result = [];
        if ($cand1 !== null && $count1 > intdiv($n, 3)) { $result[] = $cand1; }
        if ($cand2 !== null && $count2 > intdiv($n, 3)) { $result[] = $cand2; }

        return $result;

    }
}