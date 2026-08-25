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
     * @return Boolean
     */
    function isPalindrome($head) {
        $this->head = $head;
        // $length = $this->getLength($this->head);
        // $current = $this->head; $stackArr = [];
        // while($current){
        //     $stackArr[] = $current->val;
        //     $current = $current->next;
        // }
        // $current = $this->head;
        // while($length >= 1){
        //     if($current->val !=  $stackArr[$length-1]) return false;
        //     $current = $current->next;
        //     $length--;
        // }
        // return true;


        $slow = $this->head;
        $fast = $this->head;

        while($fast != null && $fast->next != null){
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        $rightNewNode = $this->reversList($slow);

        $leftNode = $this->head;
        $rightNode = $rightNewNode;

        while($rightNode != null){
            if($leftNode->val != $rightNode->val) {
                $this->reversList($rightNewNode);
                return false;
            }
            $leftNode = $leftNode->next;
            $rightNode = $rightNode->next;
        }
        $this->reversList($rightNewNode);
        return true;
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

    function reversList($head = null) {
        $current = $head;
        $prev = null;
        while($current != null){
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }  
        return $prev;     
    }
}