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
     * @return ListNode
     */
    function detectCycle($head) {
        //hash map approch if repeat element  found then it is a loop 
        // Approch -1 HasMap   
        $visited = [];
        $current = $head;
        while ($current !== null) {
            $hash = spl_object_hash($current);
            if (isset($visited[$hash])) {
                return $current;
            }
            $visited[$hash] = true;
            $current = $current->next;
        }
        return null;


        //OR
        //Tortoise and Hare Algorithm approch
        $slowPtr = $head;
        $fastPtr = $head;
        if($fastPtr == null || $fastPtr->next == null) return null;

        while($fastPtr != null && $fastPtr->next != null){
            $slowPtr = $slowPtr->next;
            $fastPtr = $fastPtr->next->next;
            
            if($slowPtr === $fastPtr) {
                return $slowPtr;
            }
        }
        return null;
    }
}