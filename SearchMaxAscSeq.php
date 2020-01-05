<?php

/**
 * 给定一个未经排序的整数数组，找到最长且连续的的递增序列
 *
 * 输入: [1,3,5,4,7]
 * 输出: 3
 * 解释: 最长连续递增序列是 [1,3,5], 长度为3。
 * 尽管 [1,3,5,7] 也是升序的子序列, 但它不是连续的，因为5和7在原数组里被4隔开。
 * 示例 2:
 * 输入: [2,2,2,2,2]
 * 输出: 1
 * 解释: 最长连续递增序列是 [2], 长度为1。
 */
class SearchMaxAscSeq extends BaseAbstractAdapter
{
    private $_arr = [];
    private $_n = 0;
    public function __construct(array $arr = [])
    {
        $this->_arr = $arr;
        $this->_n = count($arr);
    }

    public function process(): int
    {
        if ($this->_n == 1) {
            return 1;
        }

        $max = 1;
        $num = 1;
        for ($i = 1; $i < $this->_n; $i++) {
            if ($this->_arr[$i - 1] == $this->_arr[$i]) {
                $max = max($max, $num);
                continue;
            }

            if ($this->_arr[$i - 1] < $this->_arr[$i]) {
                $num++;
                $max = max($max, $num);
                continue;
            }

            $num = 1;
        }

        $this->setProcessData($max);
        return $max;
    }
}