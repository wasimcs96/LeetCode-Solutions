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
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k){
        
        $dummy = new ListNode(-1);
        $previousGroupTail = $dummy;
        $currentNode = $head;

        while ($currentNode != null) {
            $groupStart = $currentNode;
            $groupEnd = $currentNode;

            for ($i = 1; $i < $k; $i++) {
                if ($groupEnd == null) {
                    return $dummy->next;
                }

                $groupEnd = $groupEnd->next;
            }

            if ($groupEnd == null) {
                break;
            }

            $nextGroupStart = $groupEnd->next;

            $previousNode = $nextGroupStart;
            $currentNode = $groupStart;

            while ($currentNode != $nextGroupStart) {
                $nextNode = $currentNode->next;
                $currentNode->next = $previousNode;
                $previousNode = $currentNode;
                $currentNode = $nextNode;
            }

            $previousGroupTail->next = $groupEnd;
            $previousGroupTail = $groupStart;
            $currentNode = $nextGroupStart;
        }
        return $dummy->next;
    }

    function reverseKGroupWithProperComments($head, $k)
    {
        // Dummy node helps us easily connect the reversed groups.
        $dummy = new ListNode(-1);

        // Tail of the already processed/reversed part.
        $previousGroupTail = $dummy;

        // Start processing from the first node.
        $currentNode = $head;

        while ($currentNode != null) {

            /*
            * ---------------------------------------------------------
            * STEP 1: Find the end of the current group
            * ---------------------------------------------------------
            *
            * Example: k = 2
            *
            * 1 → 2 → 3 → 4 → 5
            * ↑   ↑
            * start end
            */

            $groupStart = $currentNode;

            $groupEnd = $currentNode;

            // Move k-1 times to find the kth node.
            for ($i = 1; $i < $k; $i++) {

                // Not enough nodes remaining.
                if ($groupEnd == null) {
                    return $dummy->next;
                }

                $groupEnd = $groupEnd->next;
            }

            // If fewer than k nodes remain, don't reverse them.
            if ($groupEnd == null) {
                break;
            }

            /*
            * ---------------------------------------------------------
            * STEP 2: Save the next group
            * ---------------------------------------------------------
            *
            * Example:
            *
            * 1 → 2 → 3 → 4 → 5
            *     ↑
            *  groupEnd
            *
            * nextGroupStart = 3
            */

            $nextGroupStart = $groupEnd->next;

            /*
            * ---------------------------------------------------------
            * STEP 3: Reverse current group
            * ---------------------------------------------------------
            *
            * Before:
            *
            * 1 → 2 → 3
            *
            * Current group:
            *
            * 1 → 2
            *
            * After:
            *
            * 2 → 1 → 3
            */

            $previousNode = $nextGroupStart;
            $currentNode = $groupStart;

            while ($currentNode != $nextGroupStart) {

                $nextNode = $currentNode->next;

                $currentNode->next = $previousNode;

                $previousNode = $currentNode;
                $currentNode = $nextNode;
            }

            /*
            * ---------------------------------------------------------
            * STEP 4: Connect previous group to reversed group
            * ---------------------------------------------------------
            *
            * previousGroupTail
            *       ↓
            * dummy → 2 → 1 → 3
            *
            * groupStart (1) is now the TAIL of reversed group.
            */

            $previousGroupTail->next = $groupEnd;

            /*
            * ---------------------------------------------------------
            * STEP 5: Update previousGroupTail
            * ---------------------------------------------------------
            *
            * groupStart is now the tail.
            *
            * dummy → 2 → 1 → 3
            *              ↑
            *      previousGroupTail
            */

            $previousGroupTail = $groupStart;

            /*
            * ---------------------------------------------------------
            * STEP 6: Move to next group
            * ---------------------------------------------------------
            */

            $currentNode = $nextGroupStart;
        }

        return $dummy->next;
    }
}