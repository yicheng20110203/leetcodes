<?php
/**
 * Created by PhpStorm.
 * User: zicheng
 * Date: 2020/1/4
 * Time: 3:03 AM
 */

class TimeUtil
{
    /**
     * 获取微秒
     * @return float
     */
    public static function getMicroTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    /**
     * 获取毫秒
     * @return float|int
     */
    public static function getMsTime()
    {
        return self::getMicroTime() * 1000;
    }
}