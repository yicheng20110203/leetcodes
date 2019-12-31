<?php
/**
 * Created by PhpStorm.
 * User: zicheng
 * Date: 2019/8/24
 * Time: 5:30 PM
 */

interface Runner
{
    function run();

    function set(int $code): Runner;

    function get(): int;
}

class MainRunner implements Runner
{
    private $_code = 0;

    function run()
    {
        // TODO: Implement run() method.
        echo sprintf("exit code = %d\n", $this->get());
    }

    function set(int $code): Runner
    {
        // TODO: Implement set() method.
        $this->_code = $code;
        return $this;
    }

    function get(): int
    {
        // TODO: Implement get() method.
        return $this->_code;
    }
}

$app = new MainRunner();
$app->set(10)->run();


$func = function (string $s): string {
    return $s;
};