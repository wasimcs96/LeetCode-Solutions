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
    function middleNode($head) {
        if($head == null || $head->next == null) return $head;
        $currentNode = $head;
        $length = $this->getlengthLL($head);
        $midLength = floor ($length / 2);
        $counter = 1;
        while($counter <= $midLength){
            $counter++;
            $currentNode = $currentNode->next;
        }
        return $currentNode;
    }

    function getlengthLL($head){
        $count = 0;
        if($head !== null){
            $count = 1;
            $currentNode = $head->next;
            while($currentNode != null){
                $count++;
                $currentNode = $currentNode->next;
            }
            //echo "count => $count "."\n";
        }
        return $count;
    }
}