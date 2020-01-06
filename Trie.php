<?php
/**
 * 基树Trie实现
 */

class Trie extends BaseAbstractAdapter
{
    /**
     * @var string[]
     */
    private $_inputs = [];

    /**
     * @var string[]
     */
    private $_patterns = [];

    /**
     * @var TrieNode | null
     */
    private $_root = null;

    /**
     * Trie constructor.
     * @param array $inputs
     * @param array $patterns
     */
    public function __construct(array $inputs = [], array $patterns = [])
    {
        $this->_inputs = $inputs;
        $this->_patterns = $patterns;
        $this->_root = new TrieNode();
    }

    public function insertTrie(string $data = '')
    {
        if (empty($data)) {
            return;
        }

        $p = $this->_root;
        $aOrd = ord('a');
        for ($i = 0; $i < strlen($data); $i++) {
            $index = ord($data[$i]) - $aOrd;
            if (!isset($p->children[$index])) {
                $p->children[$index] = new TrieNode($data[$i]);
            }
            $p = $p->children[$index];
        }

        $p->isEndingChar = true;
    }

    public function searchTrie(string $pattern = ''): bool
    {
        if (strlen($pattern) > TrieNode::MAX_SIZE) {
            return false;
        }

        $p = $this->_root;
        for ($i = 0; $i < strlen($pattern); $i++) {
            $index = ord($pattern[$i]) - ord('a');
            if (!isset($p->children[$index])) {
                return false;
            }

            $p = $p->children[$index];
        }

        if ($p->isEndingChar) {
            return true;
        }

        return false;
    }

    public function process()
    {
        for ($i = 0; $i < count($this->_inputs); $i++) {
            $this->insertTrie($this->_inputs[$i]);
        }

        print_r($this->_root);

        $outs = [];
        foreach ($this->_patterns as $p) {
            $r = $this->searchTrie($p) ? 'true' : 'false';
            $outs[] = sprintf("search %s is %s", $p, $r);
        }

        return $outs;
    }
}