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
        $slowPtr = $head;
        $fastPtr = $head;

        if($fastPtr == null || $fastPtr->next == null) return null;

        while($fastPtr != null && $fastPtr->next != null){
            $slowPtr = $slowPtr->next;
            $fastPtr = $fastPtr->next->next;
            
            if($slowPtr === $fastPtr) {
                $slowPtr = $head;
                while($slowPtr !== $fastPtr){
                    $slowPtr = $slowPtr->next;
                    $fastPtr = $fastPtr->next;
                } 
                return $slowPtr;
            }
        }
        return null;
    }
}