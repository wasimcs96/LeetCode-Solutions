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
        //Approch -1  O(N), S(N)
        $length = $this->getLength($this->head);
        $current = $this->head; $stackArr = [];
        while($current){
            $stackArr[] = $current->val;
            $current = $current->next;
        }
        $current = $this->head;
        while($length >= 1){
            if($current->val !=  $stackArr[$length-1]) return false;
            $current = $current->next;
            $length--;
        }
        return true;

        //Another Approch Using make a string
        //         $str = "";
        //         if($head == null || $head->next == null) return true;
        //         $current  = $head;
        //         $prev = null;
        //         while($current != null) {
        //             $str .=	$current->val;
        //             $next = $current->next;
        //             $current->next = $prev;
        //             $prev = $current;
        //             $current = $next;
        //         }

        //         $str1 = "";
        //         $head = $prev;
        //         $current  = $head;
        //         while($current != null) {
        //             $str1 .=	$current->val;
        //             $current = $current->next;
        //         }

        //         if($str1 == $str){
        //             return true;
        //         }
        //         return false;
        
        // Amother Approch usng make a stack and perform push and pop opration at last if stack is empay then retur true

        //Second Approch O(N), S(1)
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