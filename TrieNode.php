<?php
/**
 * 基树trie数据结构
 */

class TrieNode
{
    const MAX_SIZE = 26;

    /**
     * @var string
     */
    public $data = '';

    /**
     * @var TrieNode[]
     */
    public $children = [];

    public $isEndingChar = false;

    public function __construct(string $data = '')
    {
        $this->data = $data;
    }
}