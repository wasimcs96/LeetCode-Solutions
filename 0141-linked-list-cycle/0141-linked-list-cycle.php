/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        //hash map approch if repeat element  found then it is a loop 
        //OR
        //Tortoise and Hare Algorithm approch
        // $slowPtr = $head;
        // $fastPtr = $head;
        // if($fastPtr == null || $fastPtr->next == null) return false;

        // while($fastPtr != null && $fastPtr->next != null){
        //     $slowPtr = $slowPtr->next;
        //     $fastPtr = $fastPtr->next->next;
        //     if($slowPtr ==  $fastPtr) { 
        //         return true;
        //     }
        // }
        // return false;

        //Getting some issue above solution like Line 26: PHP Fatal error:  Nesting level too deep - recursive dependency? in solution.php
        //So using hasp map approch   
        $visited = [];
        $current = $head;
        while ($current !== null) {
            $hash = spl_object_hash($current);
            if (isset($visited[$hash])) {
                return true;
            }
            $visited[$hash] = true;
            $current = $current->next;
        }
        return false;
    }
}