<?php
/**
 * TODO
 * 字符串Z变换
 */

class ZChange
{
    private $_str;

    private $_n;

    public function __construct($str = "", $n = 0)
    {
        $this->_str = $str;
        $this->_n = $n;
    }


    public function zChangeAction(): string
    {
        $n = strlen($this->_str);
        if ($n <= 2) {
            return $this->_str;
        }

        /*$rows = [];
        for ($j = 0; $j < $this->_n; $j++) {
            $rows[$j][] = function () {}
        }

        print_r($rows);*/

        return "";
    }
}

(new ZChange("LEETCODEISHIRING", 3))->zChangeAction();