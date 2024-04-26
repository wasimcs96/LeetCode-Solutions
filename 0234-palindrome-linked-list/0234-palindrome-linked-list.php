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
        $str = "";
        if($head == null || $head->next == null) return true;
        $current  = $head;
        $prev = null;
        while($current != null) {
            $str .=	$current->val;
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        $str1 = "";
        $head = $prev;
        $current  = $head;
        while($current != null) {
            $str1 .=	$current->val;
            $current = $current->next;
        }

        if($str1 == $str){
            return true;
        }
        return false;
    }
}