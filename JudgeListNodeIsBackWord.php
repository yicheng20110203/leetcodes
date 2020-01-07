<?php
/**
 * 判断一个链表是否是回文
 */

class JudgeListNodeIsBackWord extends BaseAbstractAdapter
{
    /**
     * @var null|ListNode
     */
    private $_listNode = null;

    public function __construct(ListNode $listNode = null)
    {
        $this->_listNode = $listNode;
    }

    public function process()
    {
        if ($this->_listNode == null) {
            return false;
        }

        $strOrigin = "";
        $strRevert = "";
        while ($this->_listNode != null) {
            $strOrigin .= sprintf("%d", $this->_listNode->val);
            $strRevert = sprintf("%d%s", $this->_listNode->val, $strRevert);
            $this->_listNode = $this->_listNode->next;
        }

        return $strRevert == $strOrigin;
    }
}