<?php
/**
 * 分治
 * 求一个数组逆序度
 */

class DivideAndConquer extends BaseAbstractAdapter
{
    /**
     * @var int[]
     */
    private $_seq = [];

    private $_n = 0;

    private $num = 0;

    public function __construct(array $seq = [])
    {
        $this->_seq = $seq;
        $this->_n = count($seq);
    }

    public function process()
    {
        $this->_doDivideAndConquer(0, $this->_n - 1);
    }

    private function _doDivideAndConquer(int $start = 0, int $end = 0)
    {
        if ($start >= $end) {
            return;
        }

        $middle = intval(($start + $end) / 2);
        $this->_doDivideAndConquer($start, $middle);
        $this->_doDivideAndConquer($middle, $end);
        $this->_doMerge($start, $middle, $end);
    }

    private function _doMerge(int $start = 0, int $middle = 0, int $end = 0)
    {
        $i = $start;
        $j = $middle + 1;
        $index = 0;

        while ($i <= $middle && $j <= $end) {
            if ($this->_seq[$i] <= $this->_seq[$j]) {

            } else {
                $this->num++;
                
            }
        }
    }
}