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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        $head1 = $list1;
        $head2 = $list2;
        $dummy = new ListNode('-1');
        $curr = $dummy;
        while($head1 != null && $head2 != null) {
            if($head1->val <=  $head2->val) {
                $curr->next = $head1;
                $head1 = $head1->next;
            } else {
                $curr->next = $head2;
                $head2 = $head2->next;
            }
            $curr = $curr->next;
        }
        /* If any node is remaining then add it to the end */
        if ($head1 != null) $curr->next = $head1;
        else $curr->next = $head2;
        $list1 = $dummy->next;
        return $list1;
    }
}