<?php
/**
 * 两数相加
 * https://leetcode-cn.com/problems/two-sum/
 */

class TwoNumSum
{
    /**
     * @var TwoNumSum
     */
    private static $_instance;

    /**
     * @var array
     */
    private $_targets = [];

    /**
     * TwoNumSum constructor.
     */
    private function __construct()
    {
    }

    /**
     * forbidden clone the object
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return TwoNumSum
     */
    public static function getInstance(): TwoNumSum
    {
        if (!self::$_instance) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    /**
     * @param array $targets
     * @return TwoNumSum
     */
    public function setTargets($targets = []): TwoNumSum
    {
        $this->_targets = $targets;
        return $this;
    }

    /**
     * @return array
     */
    public function getTargets(): array
    {
        return $this->_targets;
    }

    /**
     * @param int $target
     * @return array
     */
    public function doAction($target = 0): array
    {
        $c = [];
        for ($i = 0; $i < count($this->getTargets()); $i++) {
            if (!isset($c[$this->_targets[$i]])) {
                $c[$this->_targets[$i]] = $i;
                $left = $target - $this->_targets[$i];
                if (isset($c[$left])) {
                    return [
                        $i,
                        $c[$left],
                    ];
                }
            }
        }

        return [];
    }
}

$obj = TwoNumSum::getInstance();
$ret = $obj->setTargets([2, 7, 11, 15])
    ->doAction(9);
print_r($ret);
// outputs:
//Array
//(
//    [0] => 1
//    [1] => 0
//)
