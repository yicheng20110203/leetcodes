<?php
/**
 * 连续子数据最大求和
 */

class FindMaxSubArraySum
{
    /**
     * @var array
     */
    private $_arrays = [];

    /**
     * FindMaxSubArraySum constructor.
     * @param array $arrays
     */
    public function __construct($arrays = [])
    {
        $this->_arrays = $arrays;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        $n = count($this->_arrays);
        $sum = 0;
        $max = $this->_arrays[0];

        for ($i = 0; $i < $n; $i++) {
            if ($sum > 0) {
                $sum += $this->_arrays[$i];
            } else {
                $sum = $this->_arrays[$i];
            }

            $max = max($max, $sum);
        }

        return $max;
    }
}

$maxVal = (new FindMaxSubArraySum([-2, 1, -3, 4, -1, 2, 1, -5]))->getMax();
echo $maxVal, PHP_EOL;