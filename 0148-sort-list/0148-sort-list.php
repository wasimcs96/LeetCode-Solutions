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
    function sortList($head) {
        if($head == null  || $head->next == null) return $head;
        //find middle
        $middleNode = $this->getMiddleOfLL($head);
        $headOfMiddle = $middleNode->next;
        $middleNode->next = null;
        //recursively sort two halves
        $head1 = self::sortList($head);
        $head12 = self::sortList($headOfMiddle);
        //merge sorted lists
        $sortedList = $this->mergeSortedLists($head1, $head12);
        return $sortedList;
    }
    //Sort a Linked list
    function mergeSortedLists($l1,  $l2) {
        $head1 = $l1;
        $head2 =  $l2;
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
    
        //echo $dummy->next->data. "\n";
        return $dummy->next;
    }
    //get Middle of LL
    function getMiddleOfLL($head){
        if($head == null) return null;
        $slowPtr = $head;
        $fastPtr = $head;
        while($fastPtr->next != null && $fastPtr->next->next != null) {
            $slowPtr = $slowPtr->next;
            $fastPtr = $fastPtr->next->next;
        }
        return $slowPtr;
    }
}