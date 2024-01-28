class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function majorityElement($nums) {
      $ans = [];
      $el_1="";  $el_2="";
      $c1=0; $c2=0;
      
      for($i=0;$i<count($nums);$i++){
        if($c1==0 && $el_2 != $nums[$i]){
          $el_1=$nums[$i];
          $c1=1;
        }elseif($c2==0 && $el_1 != $nums[$i]){
          $el_2=$nums[$i];
          $c2=1;
        }
        elseif($nums[$i] == $el_1){
          $c1++;
        }elseif($nums[$i] == $el_2){
          $c2++;
        }else{
          $c1--; $c2--;
        }
      }

      $c1=0;  $c2=0;
      for($i=0;$i<count($nums);$i++){
        if($el_1 == $nums[$i]) $c1++;
        if($el_2 == $nums[$i]) $c2++;
      }

      if($c1 > (int) (count($nums) / 3)){
        $ans[] = $el_1;
      }

      if($c2 > (int) (count($nums) / 3)){
        $ans[] = $el_2;
      }
      return $ans; 
    }
}