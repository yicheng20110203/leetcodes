<?php

/**
 * 链表节点
 */
class ListNode
{
    /**
     * @var int
     */
    public $val = 0;

    /**
     * @var ListNode|null
     */
    public $next = null;

    public function setVal($val = 0)
    {
        $this->val = $val;
        return $this;
    }

    public function setNext(ListNode $next = null)
    {
        $this->next = $next;
        return $this;
    }
}