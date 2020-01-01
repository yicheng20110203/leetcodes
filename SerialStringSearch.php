<?php
/**
 * 串联所有单词子串
 * https://leetcode-cn.com/problems/substring-with-concatenation-of-all-words/
 */

class SerialStringSearch
{
    /**
     * @var string
     */
    private $_str = '';

    /**
     * @var array
     */
    private $_subList = [];

    /**
     * @var array
     */
    private $_container = [];

    /**
     * @var []
     */
    private $_strSubListMap = [];

    /**
     * SerialStringSearch constructor.
     * @param string $str
     * @param array $subList
     */
    public function __construct($str = '', $subList = [])
    {
        $this->_str = $str;
        $this->_subList = $subList;
    }

    /**
     * @return array
     */
    public function getContainer(): array
    {
        return $this->_container;
    }

    public function getSubList(): array
    {
        return $this->_subList;
    }

    public function serial($sub = [])
    {
        if (count($sub) == 1) {
            $prefix = join($this->_strSubListMap);
            $this->_container[] = $prefix . $sub[0];
            if ($sub[0] != $prefix) {
                $this->_container[] = $sub[0] . $prefix;
            }
            return;
        }

        for ($i = 0; $i < count($sub); $i++) {
            $this->_strSubListMap[count($this->_subList) - count($sub)] = $sub[$i];
            $this->serial($this->_filterElement($i, $sub));
        }
    }

    /**
     * @param int $index
     * @param $sub array
     * @return array
     */
    private function _filterElement($index = 0, $sub = []): array
    {
        $ret = [];
        for ($i = 0; $i < count($sub); $i++) {
            if ($index != $i) {
                $ret[] = $sub[$i];
            }
        }

        return $ret;
    }

    /**
     * @return array
     */
    public function searchResult(): array
    {
        $n = strlen($this->_container[0]);
        $maxLen = strlen($this->_str);
        if ($n > $maxLen) {
            return [];
        }

        $ret = [];
        $i = 0;
        while ($i <= $maxLen - $n) {
            if (in_array(substr($this->_str, $i, $n), $this->_container)) {
                $ret[] = $i;
            }
            $i++;
        }

        return $ret;
    }
}

$obj = (new SerialStringSearch("barfoothefoobarman", ["foo","bar"]));
$obj->serial($obj->getSubList());
$index = $obj->searchResult();
print_r($index);
// outputs
//Array
//(
//    [0] => 0
//    [1] => 9
//)
echo '------------------', PHP_EOL;
$obj = (new SerialStringSearch("wordgoodgoodgoodbestword", ["word","good","best","word"]));
$obj->serial($obj->getSubList());
$index = $obj->searchResult();
print_r($index);
// outputs:
//Array
//(
//)
