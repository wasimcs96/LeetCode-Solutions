/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
        function deleteMiddle($head) {
            if($head == null || $head->next == null) {
                return null;
            }
            if($head->next->next == null) {
                $head->next = null; 
                return $head;
            }

            $slowPtr = $fastPtr = $head;
            $fastPtr = $fastPtr->next->next; //->second approch skip 1 step approch

            while($fastPtr != null && $fastPtr->next != null) {
                $fastPtr = $fastPtr->next->next;
                $slowPtr = $slowPtr->next ;
            }
            //$slowPtr->val = $slowPtr->next->val; //delete in second approch skip 1 step approch
            $slowPtr->next = $slowPtr->next->next;
            return $head;
        }
}