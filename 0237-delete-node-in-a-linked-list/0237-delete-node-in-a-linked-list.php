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
     * @param ListNode $node
     * @return 
     */
    function deleteNode($node) {
        if($node != ''){
            // Copy the value from the next node
            $node->val = $node->next->val;
            // Skip over the next node
            $node->next = $node->next->next;
        }
    }
}