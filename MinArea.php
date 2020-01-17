<?php

// 给定在 xy 平面上的一组点，确定由这些点组成的矩形的最小面积，其中矩形的边平行于 x 轴和 y 轴。
// 如果没有任何矩形，就返回 0。
// 输入：[[1,1],[1,3],[3,1],[3,3],[2,2]]
// 输出：4
class MinArea extends BaseAbstractAdapter
{
    private $_points = [];

    public function __construct(array $points)
    {
        $this->_points = $points;
    }

    public function process()
    {
        $ps = $this->_points;
        $mapX = [];
        $mapY = [];
        $min = -1;
        foreach ($ps as $p) {
            $mapX[$p[0]][$p[1]] = true;
            $mapY[$p[1]][$p[0]] = true;
        }

        foreach ($mapX as $x1 => $ys) {
            if (count($ys) <= 1) {
                continue;
            }

            $yys = array_keys($ys);
            for ($i = 0; $i < count($yys) - 1; $i++) {
                for ($j = $i + 1; $j < count($yys); $j++) {
                    if (count($mapY[$yys[$j]]) <= 1 || $yys[$i] == $yys[$j]) {
                        continue;
                    }
                    $y1 = $yys[$i];
                    $y2 = $yys[$j];
                    $tmp = $y1;
                    if ($y2 < $y1) {
                        $y1 = $y2;
                        $y2 = $tmp;
                    }

                    foreach (array_keys($mapY[$y2]) as $x2) {
                        if (count($mapX[$x2]) >= 2 && $x2 != $x1) {
                            if (isset($mapX[$x2][$y1])) {
                                if ($min == -1) {
                                    $min = abs(($x2 - $x1) * ($y2 - $y1));
                                } else {
                                    $min = min($min, abs(($x2 - $x1) * ($y2 - $y1)));
                                }
                            }
                        }
                    }
                }
            }
        }

        return $min;
    }

}