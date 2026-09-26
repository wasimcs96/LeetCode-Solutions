class Solution {

    /**
     * @param Integer[][] $boxTypes
     * @param Integer $truckSize
     * @return Integer
     */
    function maximumUnits($boxTypes, $truckSize) {
        if($truckSize <= 0) return 0;

        usort($boxTypes, function($a, $b) {
            return $b[1] <=> $a[1];
        });

        $finalUnits = 0;

        foreach($boxTypes as $set){
            $numberOfBox= $set[0];
            $numberOfUnits= $set[1];
            if($truckSize <= 0) {
                break;
            }
            elseif($truckSize >= $numberOfBox){
                $finalUnits += $numberOfUnits*$numberOfBox;
                $truckSize   -= $numberOfBox;
            }else{
                $finalUnits += $numberOfUnits * $truckSize;
                $truckSize = 0;
            }
        }
        return $finalUnits;
    }
}