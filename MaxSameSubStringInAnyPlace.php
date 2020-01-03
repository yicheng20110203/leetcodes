<?php
/**
 * 求字符串最长公共部分
 */

class MaxSameSubStringInAnyPlace extends BaseAbstractAdapter
{
    private $_arr = [];
    private $_n = 0;
    private $_sameStrList = [];

    public function __construct(array $arr = [])
    {
        $this->_arr = $arr;
        $this->_n = count($arr);
    }

    public function process(): array
    {
        if ($this->_arr == 1) {
            return $this->_arr;
        }

        for ($i = 0; $i < $this->_n - 1; $i++) {
            $j = $i + 1;
            $searchRes = $this->_searchMaxSubStringInTwoString($this->_arr[$i], $this->_arr[$j]);
            if (empty($searchRes)) {
                return [];
            }

            if (empty($this->_sameStrList) && $i == 0) {
                $this->_sameStrList = $searchRes;
                continue;
            }

            foreach ($searchRes as $sameStr => $sameLen) {
                if (!isset($this->_sameStrList[$sameStr])) {
                    unset($this->_sameStrList[$sameStr]);
                }
            }
        }

        if (empty($this->_sameStrList)) {
            return [];
        }

        $maxLen = 0;
        $result = [];
        foreach ($this->_sameStrList as $sameStr => $sameLen) {
            if ($maxLen <= $sameLen) {
                $maxLen = $sameLen;
                $result[$sameLen][] = $sameStr;
                continue;
            }
        }

        $this->setProcessData($result[$maxLen]);
        return $result[$maxLen];
    }

    private function _searchMaxSubStringInTwoString($strMin = "", $strMax = ""): array
    {
        if (strlen($strMax) < strlen($strMin)) {
            $tmp = $strMax;
            $strMax = $strMin;
            $strMin = $tmp;
        }

        $ret = [];
        $minLen = strlen($strMin);
        for ($i = 0; $i < $minLen; $i++) {
            for ($j = $i; $j < $minLen; $j++) {
                $subStr = substr($strMin, $i, $j - $i + 1);
                if (strpos($strMax, $subStr) !== false) {
                    $tmpLen = strlen($subStr);
                    $ret[$subStr] = $tmpLen;
                    continue;
                }
            }
        }

        return $ret;
    }
}