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

    public $head = null;

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteMiddle($head) {
        // $this->head = $head;
        // if($this->head == null || $this->head->next == null) {
        //     $this->head = null;
        //     return $this->head;
        // }

        // if($this->head->next->next == null){
        //     $this->head->next = null;
        //     return $this->head;
        // }
        // $length = $this->getLength();
        // $midNode = intval($length / 2);

        // $current = $this->head; $counter = 1;

        // while($counter < $midNode){
        //     $current = $current->next;
        //     $counter++;
        // }
        // $current->next = $current->next->next;
        // return $this->head;


        //Fast and Slow Pointer Approch
        if($head == null || $head->next == null) {
            return null;
        }
        if($head->next->next == null) {
            $head->next = null; 
            return $head;
        }

        $slowPtr = $head;
        $fastPtr = $head->next->next;

        while($fastPtr != null && $fastPtr->next != null) {
            $fastPtr = $fastPtr->next->next;
            $slowPtr = $slowPtr->next ;
        }
        $slowPtr->next = $slowPtr->next->next;
        return $head;
    }

    public function getLength(){
        $length = 0;
        $current = $this->head;

        while($current != null){
            $length++;
            $current = $current->next;
        }
        return $length;
    }
}