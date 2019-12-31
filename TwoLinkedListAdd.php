<?php
/**
 * 两个链表倒叙相加
 * https://leetcode-cn.com/problems/add-two-numbers/
 */

class LinkedListItem
{
    const NULL_DATA = -1;

    /**
     * @var LinkedListItem
     */
    private $_next = null;

    /**
     * @var int
     */
    private $_data = self::NULL_DATA;

    /**
     * @var array
     */
    private $_dataLists = [];

    /**
     * @param $next LinkedListItem
     * @return LinkedListItem
     */
    public function setNext($next = null): LinkedListItem
    {
        $this->_next = $next;
        return $this;
    }

    /**
     * @return LinkedListItem | null
     */
    public function getNext()
    {
        return $this->_next;
    }

    /**
     * @return int
     */
    public function getData(): int
    {
        return $this->_data;
    }

    /**
     * @param int $data
     * @return LinkedListItem
     */
    public function setData($data = 0): LinkedListItem
    {
        $this->_data = $data;
        return $this;
    }

    /**
     * @param $instance LinkedListItem
     * @return array
     */
    public function doAction($instance): array
    {
        if ($instance != null && $instance->getData() != self::NULL_DATA) {
            $this->_dataLists[] = $instance->getData();
        }

        if ($instance->getNext() == null) {
            return $this->_dataLists;
        }

        return $this->doAction($instance->getNext());
    }
}

$one = (new LinkedListItem())->setData(2)->setNext((new LinkedListItem())->setData(4)->setNext((new LinkedListItem())->setData(3)->setNext(new LinkedListItem())));
$two = (new LinkedListItem())->setData(5)->setNext((new LinkedListItem())->setData(6)->setNext((new LinkedListItem())->setData(4)->setNext(new LinkedListItem())));

$oneData = $one->doAction($one);
$twoData = $two->doAction($two);


$sum1 = 0;
for ($i = 0; $i < count($oneData); $i++) {
    $sum1 += $oneData[$i] * pow(10, $i);
}

$sum2 = 0;
for ($i = 0; $i < count($twoData); $i++) {
    $sum2 += $twoData[$i] * pow(10, $i);
}

$total = $sum1 + $sum2;

$mapValue = [];
$exit = false;
while (!$exit) {
    $mapValue[] = $total % 10;
    $total = intval($total / 10);
    if ($total < 10) {
        $exit = true;
        $mapValue[] = $total;
        break;
    }
}

$ret = 0;
for ($i = 0; $i < count($mapValue); $i++) {
    $ret += $mapValue[$i] * pow(10, $i);
}

printf("result = %d\n", $ret);

// output:
// result = 807

