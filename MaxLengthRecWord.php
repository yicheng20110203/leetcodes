<?php
/**
 * 查询一个字符串最长回文
 */

class MaxLengthRecWord
{
    /**
     * @var string
     */
    private $_str = "";

    /**
     * @var array
     */
    private $_wordList = [];

    public function __construct($str = "")
    {
        $this->_str = $str;
    }

    /**
     * 暴力破解法
     * O(n*n*n)
     * @return array
     */
    public function searchMaxRecWordList(): array
    {
        for ($i = 0; $i < strlen($this->_str) - 1; $i++) {
            for ($j = $i + 1; $j < strlen($this->_str); $j++) {
                $subStr = substr($this->_str, $i, $j - $i + 1);
                if ($this->_isRecWord($subStr)) {
                    $this->_wordList[] = $subStr;
                }
            }
        }

        return $this->_wordList;
    }

    /**
     * @param string $str
     * @return bool
     */
    private function _isRecWord($str = ""): bool
    {
        $n = strlen($str);
        for ($i = 0; $i < intval($n / 2); $i++) {
            if ($str[$i] != $str[$n - 1 - $i]) {
                return false;
            }
        }

        return true;
    }

    /**
     *
     *
     * @return array
     */
    public function expandFromCenter(): array
    {
        $s = $this->_str;
        if ($s == "" || strlen($s) < 1) {
            return [
                ""
            ];
        }

        $start = 0;
        $end = 0;

        for ($i = 0; $i < strlen($s); $i++) {
            $len1 = $this->_actionExpandFromCenter($s, $i, $i);
            $len2 = $this->_actionExpandFromCenter($s, $i, $i + 1);
            $len = max($len1, $len2);
            if ($len > $end - $start) {
                $start = $i - intval(($len - 1) / 2);
                $end = $i + intval($len / 2);
            }
        }
        return [
            substr($s, $start, $end + 1),
        ];
    }

    /**
     * @param string $str
     * @param int $left
     * @param int $right
     * @return int
     */
    private function _actionExpandFromCenter($str = "", $left = 0, $right = 0): int
    {
        $l = $left;
        $r = $right;

        while ($l >= 0 && $r < strlen($str) && ($str[$l] == $str[$r])) {
            $l--;
            $r++;
        }

        return $r - $l + 1;
    }
}

$result = (new MaxLengthRecWord("babad"))->searchMaxRecWordList();
print_r($result);