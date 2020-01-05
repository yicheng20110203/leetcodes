<?php

/**
 * 给你一个数组 arr ，请你将每个元素用它右边最大的元素替换，如果是最后一个元素，用 -1 替换。
 * 完成所有替换操作后，请你返回这个数组。
 * 输入：arr = [17,18,5,4,6,1]
 * 输出：[18,6,6,6,1,-1]
 */
class SearchRighMaxNumAndReplace extends BaseAbstractAdapter
{
    private $_arr = [];

    private $_n = 0;

    public function __construct(array $arr = [])
    {
        $this->_arr = $arr;
        $this->_n = count($arr);
    }

    public function process(): array
    {
        $result = [];
        if ($this->_n == 0) {
            $this->setProcessData($result);
            return $result;
        }

        if ($this->_n == 1) {
            $result = [
                -1
            ];
            $this->setProcessData($result);
            return $result;
        }

        for ($i = 0; $i < $this->_n; $i++) {
            if ($i == $this->_n - 1) {
                $result[] = -1;
                break;
            }

            $tmpMax = $this->_arr[$i + 1];
            $j = $i + 1;
            while ($j <= $this->_n) {
                if ($tmpMax < $this->_arr[$j]) {
                    $tmpMax = $this->_arr[$j];
                }
                $j++;
            }

            $result[] = $tmpMax;
        }

        $this->setProcessData($result);
        return $result;
    }
}