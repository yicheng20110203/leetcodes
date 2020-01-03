<?php
/**
 * 最长公共子串
 */

class MaxSameSubString
{
    private $_arr = [];
    private $_n = 0;

    public function __construct(array $arr = [])
    {
        $this->_arr = $arr;
        $this->_n = count($arr);
    }

    public function process(): string
    {
        if ($this->_n == 1) {
            return $this->_arr[0];
        }

        $str = '';
        for ($i = 0; $i < $this->_n - 1; $i++) {
            $j = $i + 1;
            $len = min(strlen($this->_arr[$i]), strlen($this->_arr[$j]));
            if (strlen($str) != 0) {
                $len = strlen($str);
            }

            for ($k = 0; $k < $len; $k++) {
                if ($this->_arr[$i][$k] != $this->_arr[$j][$k]) {
                    if ($k == 0) {
                        return $str;
                    }

                    $tmpStr = substr($this->_arr[$i], 0, $k);
                    if ($str == '') {
                        $str = $tmpStr;
                        break;
                    }

                    if (strlen($tmpStr) < strlen($str)) {
                        $str = $tmpStr;
                    }
                    break;
                }
            }
        }

        return $str;
    }
}

$obj = new MaxSameSubString(["flower","flow","flight"]);
$str = $obj->process();
echo $str, PHP_EOL;