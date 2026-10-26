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
    function preorderTraversal($root) {
        $answer = [];
        $this->preOrderTraversalRecursive($root, $answer);
        return $answer;

        //return $this->preOrderTraversalIterative($root);
    }
    //DFS - PreOrder Traversal. - // Root - Left -  Right
   function preOrderTraversalRecursive(?TreeNode $root, array &$answer){
        if($root == null) return;
        $answer[] = $root->val;
        $this->preOrderTraversalRecursive($root->left, $answer);
        $this->preOrderTraversalRecursive($root->right, $answer);
    }

    function preOrderTraversalIterative(?TreeNode $root){
        if($root == null) return [];
        $stack = $result = []; 
        array_push($stack, $root);

        while(count($stack) > 0){
            $root = array_pop($stack);
            array_push($result, $root->val);

            if($root->right != null){
                array_push($stack, $root->right);
            }

            if($root->left != null){
                array_push($stack, $root->left);
            }
        }
        return $result;
    }
    }