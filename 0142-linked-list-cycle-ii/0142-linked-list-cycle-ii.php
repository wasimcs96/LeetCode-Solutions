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
     //   HEAD
//   ↓
//   1 → 2 → 3 → 5 → 4 ─→ 6
//                  ↑         ↓
//                  │         7
//                  │         ↓
//                  └── 9 ← 8

    //Slow reach to 4 then fast reach to 9 bcz fast is moving 2steps
    //lets assume Head to slow length is L1 (head to 4 is 4)
    //then slow to fast length is also L1 (4 to 9 is 4) as (head to fast is 2L1)
    //cicle length would be L1 + D where d is distance from fast to slow  
    // slow will move by 1 and fast will move by 2 so D will reduce by only 1 so it will take D steps to meet each other so slow will move D steps and fast will move 2D.
    //if in cicle after D steps we will get collide node means distanse between collide node to circle start node is L1 + D - D = L1. 
    //And We know L1 is distance from head to circle start node so if we move slow from head and fast from collide node and move both by 1 step then they will meet at circle start node.
    //Floyd's Cycle Detection
    function detectCycle($head) {
        $slowPtr = $head;
        $fastPtr = $head;

        if($fastPtr == null || $fastPtr->next == null) return null;

        while($fastPtr != null && $fastPtr->next != null){
            $slowPtr = $slowPtr->next;
            $fastPtr = $fastPtr->next->next;
            
            if($slowPtr === $fastPtr) {
                $slowPtr = $head;
                while($slowPtr !== $fastPtr){
                    $slowPtr = $slowPtr->next;
                    $fastPtr = $fastPtr->next;
                    //To get Length of circle run a loop with slow to slow or fast to fast with using a counter
                } 
                return $slowPtr;
            }
        }
        return null;
    }
}