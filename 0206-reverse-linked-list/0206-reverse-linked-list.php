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
    // function reverseList($head) {
    //     if($head == null || $head->next == null) return $head;
    //     $current = $head;
    //     $prev = null;
    //     while($current != null){
    //         $next = $current->next;
    //         $current->next = $prev;
    //         $prev = $current;
    //         $current = $next;
    //     }
    //     $head = $prev;
    //     return $head;
    // }

    //Recursive Approch
    function reverseList($head, $prev = null) {
        if($head == null) return $prev;
      
        $currentNode = $head;
        $nextNode = $currentNode->next;
        $currentNode->next = $prev;

        $prev = $currentNode;
    
        return $this->reverseList($nextNode, $prev);
    }
}