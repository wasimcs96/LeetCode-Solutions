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
    
    public $head;

    /**
     * @param ListNode $head
     * @return ListNode
     */
    // function reverseList($head) {
    //     $this->head = $head;
    //     if($this->head == null || $this->head->next == null) return $this->head;
    //     $currentNode = $this->head; $prev = null;
    //     while($currentNode != null){
    //         $nextNode = $currentNode->next;
    //         $currentNode->next = $prev;
    //         $prev = $currentNode;
    //         $currentNode = $nextNode;
    //     }
    //     $this->head = $prev;
    //     return $this->head;
    // }
    
    function reverseList($head, $prev = null) {
        if($head == null) return $prev;
      
        $currentNode = $head;
        $nextNode = $currentNode->next;
        $currentNode->next = $prev;

        $prev = $currentNode;
    
        return $this->reverseList($nextNode, $prev);
    }
}