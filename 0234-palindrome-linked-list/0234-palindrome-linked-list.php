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
     * @return Boolean
     */
    function isPalindrome($head) {
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
        
        //make a stack and perform push and pop opration at last if stack is empay then retur true
        //compare half - half LL
        //get mid point and make second half reverse and compare with first half
        if($head == null || $head->next == null) return true;
        $slowPtr = $fastPtr = $head;

        while($fastPtr != null || $fastPtr->next != null){ //at this condition slowPtr will be lie at midpoint of LL
            $slowPtr = $slowPtr->next;
            $fastPtr = $fastPtr->next->next;
        }
        //reverse second half LL
        $pre = null;
        $current = $slowPtr;
        while($current != null) {
            $next = $current->next;
            $current->next = $pre;
            $pre = $current;
            $current = $next;
        }

        $preHead = $pre;
        while($preHead != null && $head != null ){
            if($preHead->val != $head->val) return false;
            $preHead = $preHead->next;
            $head = $head->next;
        }
        return true;
    }
}