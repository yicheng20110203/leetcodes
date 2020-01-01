<?php
/**
 * 查询一个字符串的所有子字符串
 */

class AllSubString
{
    private $_str;

    public function __construct($str = "")
    {
        $this->_str = $str;
    }

    public function getAllSubStrings(): array
    {
        $n = strlen($this->_str);
        $maps = [];
        $kv = [];
        for ($k = 0; $k < $n; $k++) {
            $i = 0;
            $j = 0;
            $kv[$k] = $this->_str[$k];

            while ($i < $n) {
                if ($k <= $i && $i <= $j) {
                    if ($k == $i) {
                        $maps[] = $this->_str[$k];
                    } else {
                        $maps[] = $this->_str[$k] . substr($this->_str, $i, $j - $i + 1);
                    }
                }

                $j++;
                if ($j >= $n) {
                    $j = $i + 1;
                    $i++;
                }
            }
        }

        return array_values(array_unique($maps));
    }
}

$result = (new AllSubString("abc"))->getAllSubStrings();
print_r($result);

// output
//Array
//(
//    [0] => a
//    [1] => ab
//    [2] => abc
//    [3] => ac
//    [4] => b
//    [5] => bc
//    [6] => c
//)