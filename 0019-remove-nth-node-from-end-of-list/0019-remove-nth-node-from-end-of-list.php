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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
       //find length and get nth node from Head and deleete it
        $getlength = $this->getlengthLL($head);
        if ($getlength < $n) return $head;
        if(($head == null || $head->next == null) && $n == 1) return null;
        
        $deleteAfterNthNode =  $getlength - $n;
        if($deleteAfterNthNode == 0) {
            $head = $head->next; 
            return $head;
        }
        $counter = 1;
        $currentNode = $head;
        while($counter < $deleteAfterNthNode){
            $counter++;
            $currentNode = $currentNode->next;
        }
        $deletedNode = $currentNode->next;
        $currentNode->next = $currentNode->next->next;
        unset($deletedNode); 
        return $head;
    }
    
    public function getlengthLL($head){
        $count = 0;
        if($head !== null){
            $count = 1;
            $currentNode = $head->next;
            while($currentNode != null){
                $count++;
                $currentNode = $currentNode->next;
            }
        }
        return $count;
    }
}