<?php
/**
 * 四数之和
 */

class FourNumSum
{
    const CST_NUM = 4;

    /**
     * @var array
     */
    private $_arr = [];

    private $_n = 0;

    private $_target = 0;

    /**
     * FourNumSum constructor.
     * @param array $arr
     * @param int $target
     */
    public function __construct($arr = [], $target = 0)
    {
        $this->_arr = $arr;
        $this->_target = $target;
        $this->_n = count($this->_arr);
    }

    public function process(): array
    {
        $result = [];
        if ($this->_n < self::CST_NUM) {
            return $result;
        }

        for ($i = 0; $i < $this->_n - 3; $i++) {
            for ($j = $i + 1; $j < $this->_n - 2; $j++) {
                for ($h = $j + 1; $h < $this->_n - 1; $h++) {
                    for ($k = $h + 1; $k < $this->_n; $k++) {
                        if ($this->_arr[$i] + $this->_arr[$j] + $this->_arr[$h] + $this->_arr[$k] == $this->_target) {
                            $tmp = [
                                $this->_arr[$i],
                                $this->_arr[$j],
                                $this->_arr[$h],
                                $this->_arr[$k]
                            ];
                            asort($tmp);
                            $result[] = join($tmp, '_');
                        }
                    }
                }
            }
        }

        $result = array_unique($result);
        foreach ($result as $k => $v) {
            $result[$k] = explode('_', $v);
        }

        return $result;
    }

    public function optProcess(): array
    {
        if ($this->_n < 4) {
            return [];
        }

        $result = [];
        asort($this->_arr);
        $this->_arr = array_values($this->_arr);
        for ($i = 0; $i < $this->_n - 3; $i++) {
            if ($this->_arr[$i] + $this->_arr[$i + 1] + $this->_arr[$i + 2] + $this->_arr[$i + 3] > $this->_target) {
                return $result;
            }

            if ($this->_arr[$i] + $this->_arr[$this->_n - 1] + $this->_arr[$this->_n - 2] + $this->_arr[$this->_n - 3] < $this->_target) {
                return $result;
            }

            for ($j = $i + 1; $j < $this->_n - 2; $j++) {
                if (($j + 3 < $this->_n - 1) && ($this->_arr[$j] + $this->_arr[$j + 1] + $this->_arr[$j + 2] + $this->_arr[$j + 3] > $this->_target)) {
                    return $result;
                }

                if (($j < $this->_n - 3) && ($this->_arr[$j] + $this->_arr[$this->_n - 1] + $this->_arr[$this->_n - 2] + $this->_arr[$this->_n - 3] < $this->_target)) {
                    return $result;
                }

                $m = $j + 1;
                $n = $m + 1;
                while (($m < $this->_n - 1)) {
                    if ($this->_arr[$i] + $this->_arr[$j] + $this->_arr[$m] + $this->_arr[$n] == $this->_target) {
                        $result[] = [
                            $this->_arr[$i],
                            $this->_arr[$j],
                            $this->_arr[$m],
                            $this->_arr[$n]
                        ];
                    }
                    $n++;
                    if ($n >= $this->_n) {
                        $m++;
                        $n = $m + 1;
                    }
                }
            }
        }

        return $result;
    }
}

$obj = new FourNumSum([1, 0, -1, 0, -2, 2], 0);
$result = $obj->process();

print_r($result);
