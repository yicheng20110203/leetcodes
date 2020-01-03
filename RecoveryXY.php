<?php

//我们有一些二维坐标，如 "(1, 3)" 或 "(2, 0.5)"，然后我们移除所有逗号，小数点和空格，得到一个字符串S。返回所有可能的原始字符串到一个列表中。
//原始的坐标表示法不会存在多余的零，所以不会出现类似于"00", "0.0", "0.00", "1.0", "001", "00.01"或一些其他更小的数来表示坐标。此外，一个小数点前至少存在一个数，所以也不会出现“.1”形式的数字。
//最后返回的列表可以是任意顺序的。而且注意返回的两个数字中间（逗号之后）都有一个空格。
//
// 
//
//示例 1:
//输入: "(123)"
//输出: ["(1, 23)", "(12, 3)", "(1.2, 3)", "(1, 2.3)"]
//示例 2:
//输入: "(00011)"
//输出:  ["(0.001, 1)", "(0, 0.011)"]
//解释:
//0.0, 00, 0001 或 00.01 是不被允许的。
//示例 3:
//输入: "(0123)"
//输出: ["(0, 123)", "(0, 12.3)", "(0, 1.23)", "(0.1, 23)", "(0.1, 2.3)", "(0.12, 3)"]
//示例 4:
//输入: "(100)"
//输出: [(10, 0)]
//解释:
//1.0 是不被允许的。
//
//来源：力扣（LeetCode）
//链接：https://leetcode-cn.com/problems/ambiguous-coordinates
//著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


/**
 * Class RecoveryXY
 */
class RecoveryXY
{
    public function process($str = ''): array
    {
        $results = [];
        $n = strlen($str);
        if ($n < 4 || $str[0] != "(" || $str[$n - 1] != ")") {
            return $results;
        }
        $str = substr($str, 1, $n - 2);
        $n -= 2;
        for ($i = 1; $i < $n; $i++) {
            $left = substr($str, 0, $i);
            $right = substr($str, $i, $n - $i);
            $activeLeft = $this->_activeArray($left);
            if (empty($activeLeft)) {
                continue;
            }

            $activeRight = $this->_activeArray($right);
            if (empty($activeRight)) {
                continue;
            }

            foreach ($activeLeft as $l) {
                foreach ($activeRight as $r) {
                    $results[] = sprintf("(%s, %s)", $l, $r);
                }
            }
        }

        return $results;
    }

    /**
     * 判断一个数及其
     * @param string $str
     * @return array
     */
    private function _activeArray($str = ''): array
    {
        $ret = [];
        if ($this->_filterRule($str)) {
            $ret[] = $str;
        }

        if (strlen($str) >= 2) {
            for ($i = 1; $i < strlen($str); $i++) {
                $subString = sprintf("%s.%s", substr($str, 0, $i), substr($str, $i, strlen($str) - $i));
                if ($this->_filterRule($subString)) {
                    $ret[] = $subString;
                }
            }
        }

        return $ret;
    }

    /**
     * @param string $str
     * @return bool
     */
    private function _filterRule($str = ''): bool
    {
        $n = strlen($str);
        if ($n == 1) {
            return true;
        }

        if (strpos($str, '.')) {
            if ($str[$n - 1] === "0") {
                return false;
            }

            $arr = explode('.', $str);
            if ($arr[0][0] === '0' && strlen($arr[0]) > 1) {
                return false;
            }

            return true;
        }

        if ($str[0] === "0") {
            return false;
        }

        return true;
    }
}

$obj = new RecoveryXY();
$results = $obj->process("(123)");
print_r($results);