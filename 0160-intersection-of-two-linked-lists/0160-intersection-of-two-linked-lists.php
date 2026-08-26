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
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB) {
        // $a == $b    // true  → same values/properties
        // $a === $b   // false → different Node objects
        // $a === $c   // true  → same Node object


        if($headA == null || $headB == null) return null;
        // Brute force aproch
        // $l1 = $headA;
        // $l2 = $headB;
        // while($l1 != null){
        //     $l2 = $headB;
        //     while($l2 != null){
        //         if($l1 === $l2){
        //             return $l1;
        //         }
        //         $l2 = $l2->next;
        //     }
        //     $l1 = $l1->next;
        // }
        // return null;

        //Next Approch : Shortest List 
        // $l1 = $headA;
        // $l2 = $headB;
        
        // $shorterList = $this->getLength($l1) < $this->getLength($l2) ? $l1 : $l2;
        // $longerList = $shorterList === $l1 ? $l2 : $l1;
        // $diff = abs($this->getLength($l1) - $this->getLength($l2));
        // while($diff > 0){
        //     $longerList = $longerList->next;
        //     $diff--;
        // }
        
        // while($longerList != null && $shorterList != null){
            
        //     if($shorterList === $longerList)
        //         return $shorterList;
            
        //     $longerList = $longerList->next;
        //     $shorterList = $shorterList->next;
        // }
        // return null;

        //Approach 3: Using HashSet
        // $list1 = $headA;
        // $list2 = $headB;
        // $set = [];
        // $current1 = $list1;
        // while($current1 != null){
        //     $set[spl_object_hash($current1)] = true;
        //     $current1 = $current1->next;
        // }

        // $current2 = $list2;
        // while($current2 != null){
        //     if(isset($set[spl_object_hash($current2)])){
        //         return $current2;
        //     }
        //     $set[spl_object_hash($current2)] = true;
        //     $current2 = $current2->next;
        // }
        // return null;


        //Approach 3: Using two pointers
        $p1 = $headA;
        $p2 = $headB;

        while ($p1 !== $p2) {

            $p1 = ($p1 === null) ? $headB : $p1->next;
            $p2 = ($p2 === null) ? $headA : $p2->next;
        }

        return $p1;
    }

    public function getLength($head){
        $length = 0;
        $current = $head;

        while($current != null){
            $length++;
            $current = $current->next;
        }
        return $length;
    }
}