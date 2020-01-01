<?php

/**
 * Class SlideWindow
 * 滑动窗口算法
 * https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/
 */
class SlideWindow
{
    /**
     * @var SlideWindow
     */
    private static $_instance;

    /**
     * @var string
     */
    private $_str = "";

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return SlideWindow
     */
    public static function getInstance(): SlideWindow
    {
        if (self::$_instance == null) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    /**
     * @param string $str
     * @return SlideWindow
     */
    public function setStr($str = ""): SlideWindow
    {
        $this->_str = $str;
        return $this;
    }

    /**
     * @return string
     */
    public function getStr(): string
    {
        return $this->_str;
    }

    /**
     * @return int
     */
    public function doSlideWindow(): int
    {
        $totalLen = strlen($this->getStr());
        $maxLen = 0;
        $prefixIndex = 0;
        $suffixIndex = 0;

        if ($totalLen == 1) {
            $maxLen = $totalLen;
            return $maxLen;
        }

        $container = [];
        while ($prefixIndex < $totalLen && $suffixIndex < $totalLen) {
            if (!isset($container[$this->getStr()[$suffixIndex]])) {
                $container[$this->getStr()[$suffixIndex]] = true;
                $suffixIndex++;
                $maxLen = max($maxLen, $suffixIndex - $prefixIndex);
                continue;
            }

            if (isset($container[$this->getStr()[$prefixIndex]])) {
                unset($container[$this->getStr()[$prefixIndex]]);
                $prefixIndex++;
            }
        }

        return $maxLen;
    }

    /**
     * @return array
     */
    public function doProposeSlideWindow(): array
    {
        $n = strlen($this->getStr());
        $i = 0;
        $j = 0;
        $maxLen = 0;

        if ($n == 1) {
            return [$this->getStr()];
        }

        $c = [];
        $maxSubStringMap = [];
        while ($i < $n && $j < $n) {
            if (!isset($c[$this->getStr()[$j]])) {
                $c[$this->getStr()[$j]] = $j;

                // special process
                if ($j - $i + 1 >= $maxLen) {
                    $maxSubStringMap[$j - $i][] = [$i, $j];
                }

                // $j++ must be after process $maxSubStringMap
                $j++;
                $maxLen = max($maxLen, $j - $i);
                continue;
            }

            if (isset($c[$this->getStr()[$i]])) {
                unset($c[$this->getStr()[$i]]);
                $i++;
            }
        }

        $retList = [];
        ksort($maxSubStringMap);
        foreach (end($maxSubStringMap) as $len => $sub) {
            $retList[substr($this->_str, $sub[0], $sub[1] - $sub[0] + 1)] = 1;
        }

        return array_keys($retList);
    }
}

$instance = SlideWindow::getInstance();
$instance = $instance->setStr("abcabcbbabk");
printf("string = %s, maxLength = %d\n", $instance->getStr(), $instance->doSlideWindow());
printf("string = %s, max sub string lists = \n", $instance->getStr());
print_r($instance->doProposeSlideWindow());

//string = abcabcbbabk, maxLength = 3
//string = abcabcbbabk, max sub string lists =
//Array
//(
//    [0] => abc
//    [1] => bca
//    [2] => cab
//    [3] => abk
//)

