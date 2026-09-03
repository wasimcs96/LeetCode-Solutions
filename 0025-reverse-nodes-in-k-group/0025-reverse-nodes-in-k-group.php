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
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k){
        $current = $head; 
        $c = $k;
        $head = $tempHead = new ListNode(-1);

        while($current != null){
            $GSN = $current; $c = $k-1;
            while($c > 0 && $current != null){
                $c--;
                $current = $current->next;
            }

            if($c <= 0 && $current != null){ 
                $GEN = $current;
                $GNN = $GEN->next;
                $current = $GNN;
                $GEN->next = null;

                //reverse the group
                $HeadOfReversedGroup = $this->reversListModify($GSN, $GNN);
                $tempHead->next = $HeadOfReversedGroup;
                $tempHead = $GSN;

            }else{
                if($current != null) $current = $current->next;
            }
        }
        return $head->next;
    }

    function reversListModify($head = null, $tail = null) {
        $current = $head ?? $this->head;
        $prev = $tail;
        while($current != null){
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
            
        }
        return $prev;     
    }
}