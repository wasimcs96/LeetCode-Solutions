class Solution {

    /**
     * @param Integer[] $weights
     * @param Integer $days
     * @return Integer
     */
    function shipWithinDays(array $weights, int $days): int
    {
        $low  = max($weights);       // Minimum: must carry the heaviest package
        $high = array_sum($weights); // Maximum: carry everything in one day

        while ($low <= $high) {
            $mid = $low + intdiv($high - $low, 2);

            if ($this->canShip($weights, $mid, $days)) {
                $high = $mid - 1; // Feasible → try smaller capacity
            } else {
                $low = $mid + 1;  // Not feasible → need more capacity
            }
        }

        return $low; // Smallest capacity that works
    }
    function canShip(array $weights, int $capacity, int $days): bool
    {
        $daysNeeded  = 1; // We always need at least 1 day
        $currentLoad = 0; // Weight loaded on the current day

        foreach ($weights as $w) {
            if ($currentLoad + $w > $capacity) {
                // This package overflows today's limit → start a new day
                $daysNeeded++;
                $currentLoad = $w; // New day starts with this package
            } else {
                $currentLoad += $w; // Load this package on the current day
            }
        }

        return $daysNeeded <= $days; // Feasible if finished within $days
    }

    
}