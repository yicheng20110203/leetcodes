<?php

/**
 * N叉树节点
 */
class NTreeNode
{
    /**
     * @var NTreeNode[]
     */
    public $subNodes = [];

    public $val = 0;

    /**
     * @param NTreeNode[] $node
     * @return $this
     */
    public function setNode(array $node = null)
    {
        $this->subNodes = $node;
        return $this;
    }

    public function setVal($val)
    {
        $this->val = $val;
        return $this;
    }
}