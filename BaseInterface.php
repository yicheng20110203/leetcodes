<?php

/**
 * Created by PhpStorm.
 * User: zicheng
 * Date: 2020/1/4
 * Time: 2:51 AM
 */
interface BaseInterface
{
    /**
     * @return mixed
     */
    public function process();

    /**
     * @param null $data
     * @return mixed
     */
    public function print($data = null);
}