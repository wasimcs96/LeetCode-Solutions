/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $answer = [];
        $this->postOrderTraversalRecursive($root, $answer);
        return $answer;

        return $this->postOrderTraversalIterative($root);
    }
    //DFS - PostOrder Traversal. - //  Left -  Right - Root
    function postOrderTraversalRecursive(?TreeNode $root, array &$answer){
        if($root == null) return;
        $this->postOrderTraversalRecursive($root->left, $answer);
        $this->postOrderTraversalRecursive($root->right, $answer);
        $answer[] = $root->val;
    }

    function postOrderTraversalIterative(?TreeNode $root){
        $stack = []; $result = [];

        if ($root === null) {
            return [];
        }

        array_push($stack, $root);

        while(count($stack) > 0){
            
            $stackTopNode = array_pop($stack);
            array_push($result,  $stackTopNode->val);

            if($stackTopNode->left !== null){
                array_push($stack, $stackTopNode->left);
            }
            
            if($stackTopNode->right !== null) {
                array_push($stack, $stackTopNode->right);
            }
        }
        
        return array_reverse($result);
        
    }
}