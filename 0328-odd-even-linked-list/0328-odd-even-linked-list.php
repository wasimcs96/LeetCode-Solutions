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
    function oddEvenList($head) {
        // if($head == null || $head->next == null) return $head;

        // $currentNode = $head;

        // $oddHead  = new ListNode(-1);
        // $evenHead = new ListNode(-1);
       
        // $odd = $oddHead; 
        // $even = $evenHead; 
        // $countIndex = 1;
        // while($currentNode != null){
        //     $numberIsEven =  (($countIndex % 2) == 0) ? true  : false ; 
        //     if($numberIsEven){
        //         $even->next = $currentNode;
        //         $even = $even->next;
        //     }
        //     else{ 
        //         $odd->next = $currentNode;
        //         $odd = $odd->next;
        //     }
        //     $currentNode = $currentNode->next;
        //     $countIndex++;
        // }
       
        // $odd->next = ($evenHead->next) ? $evenHead->next : null;  
        // $even->next =  null;  
        // return $oddHead->next; 
         
        ////Second Approch
        if($head == null || $head->next == null) return $head;
        $odd = $head;
        $even = $head->next;
        $evenHead = $head->next;
        while($odd->next != null && $even->next != null){
            $odd->next = $even->next;
            $even->next = $odd->next->next;
            $odd = $odd->next;
            $even = $even->next;
        }
        $odd->next = $evenHead;
        return $head;
    }
}