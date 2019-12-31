<?php
/**
 * 计算两个有序数据的中位数
 * https://leetcode-cn.com/problems/median-of-two-sorted-arrays/
 */

class CalSortedArrayAvgValue
{
    /**
     * @var array
     */
    private $_arrayM = [];

    /**
     * @var array
     */
    private $_arrayN = [];

    /**
     * CalSortedArrayAvgValue constructor.
     * @param array $arrayM
     * @param array $arrayN
     */
    public function __construct($arrayM = [], $arrayN = [])
    {
        $this->_arrayM = $arrayM;
        $this->_arrayN = $arrayN;
    }

    /**
     * O(m+n)
     * 两个有序数组的中位数一定在(m + n)/2 + 1之间
     * @return float
     */
    public function calMiddleValue(): float
    {
        $m = count($this->_arrayM);
        $n = count($this->_arrayN);

        $result = [];
        $maxLen = intval(($m + $n) / 2 + 1);
        $i = $j = 0;
        while (count($result) < $maxLen) {
            if (!isset($this->_arrayM[$i])) {
                array_push($result, $this->_arrayN[$j++]);
                continue;
            }

            if (!isset($this->_arrayN[$j])) {
                array_push($result, $this->_arrayM[$i++]);
                continue;
            }

            if ($this->_arrayM[$i] <= $this->_arrayN[$j]) {
                array_push($result, $this->_arrayM[$i++]);
                continue;
            }

            array_push($result, $this->_arrayN[$j++]);
        }

        if (($m + $n) % 2 == 0) {
            return floatval(($result[count($result) - 2] + $result[count($result) - 1]) / 2.0);
        }

        return floatval($result[count($result) - 1] / 1.0);
    }
}

$obj = new CalSortedArrayAvgValue([1, 2], [3, 4]);
$middle = $obj->calMiddleValue();
echo "middle value = ", $middle, PHP_EOL;