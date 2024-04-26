/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function detectCycle($head) {
        //S(N) approch
        // $visited = [];
        // $current = $head;
        // $index = 0;
        // while ($current !== null) {
        //     $hash = spl_object_hash($current);
        //     if (isset($visited[$hash])) {
        //         return $current;
        //     }
        //     $visited[$hash] = $index; 
        //     $index++;
        //     $current = $current->next;
        // }
        // return null;

        $slowPtr = $fastPtr = $head;
        if($fastPtr == null && $fastPtr->next == null) return null;
        while ($fastPtr != null && $fastPtr->next != null){
            //head 1 to slowptr distance where slowptr 3 at circle start node distance = l = distance of (slowptr 3 - fast 5)
            //fast to slow other side disctance D 5-->3
            //total circle distance l+D
            //fast cover distance to reach slow is  2D then slow cover D distance 
            //then remaining distance to reach start Node circle is L bcz total circle distance l+D=L+2D so L=D
            //so fast will meet slow after  2*D times.
            //And we know that if start from head and cover L distance then reach start node of circle
            $slowPtr = $slowPtr->next;
            $fastPtr = $fastPtr->next->next;
            if($fastPtr != null && spl_object_hash($slowPtr) ==  spl_object_hash($fastPtr)) { 
                $slowPtr = $head;
                while(spl_object_hash($slowPtr) !=  spl_object_hash($fastPtr)) { 
                    $slowPtr = $slowPtr->next;
                    $fastPtr = $fastPtr->next;
                }
                return $slowPtr;
            }
        }
        return null;
    }
}