<?php
/**
 * 查询N叉树最大的深度
 */

class SearchNTreeNodeDepth extends BaseAbstractAdapter
{
    /**
     * @var NTreeNode
     */
    private $_node = null;

    private $_maxDepth = 0;

    private $_eachMaxDepth = 0;

    /**
     * SearchNTreeNodeDepth constructor.
     * @param NTreeNode $node
     */
    public function __construct(NTreeNode $node = null)
    {
        $this->_node = $node;
    }

    public function process()
    {
        if (empty($this->_node)) {
            return 0;
        }

        if (count($this->_node->subNodes) == 0) {
            return 1;
        }

        $this->getMaxDepth($this->_node);

        return $this->_maxDepth + 1;
    }

    public function getMaxDepth(NTreeNode $node = null)
    {
        if (empty($node->subNodes)) {
            $this->_maxDepth = max($this->_maxDepth, $this->_eachMaxDepth);
            $this->_eachMaxDepth = 0;
            return;
        }

        foreach ($node->subNodes as $subNode) {
            $this->_eachMaxDepth++;
            $this->getMaxDepth($subNode);
        }
    }
}