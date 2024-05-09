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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $dummy = new ListNode(-1);
        $curr = $dummy;
        $carry = 0;
        while($l1||$l2){
            $sum = ($l1?$l1->val:0) + ($l2?$l2->val:0) + $carry;
            if($sum < 10){
                $carry = 0;
            }else{
                $carry = 1;
                $sum = $sum%10;
            }
            $newNode = new ListNode($sum);
            $curr->next = $newNode;
            $curr = $newNode;

            $l1 = $l1 ? $l1->next : $l1;
            $l2 = $l2 ? $l2->next : $l2;
        }

        if($carry == 1){
            $newNode = new ListNode($carry);
            $curr->next = $newNode;
        }
        return $dummy->next;
    }
}