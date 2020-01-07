<?php

/**
 * Created by PhpStorm.
 * User: zicheng
 * Date: 2020/1/4
 * Time: 2:54 AM
 */
abstract class BaseAbstractAdapter implements BaseInterface
{
    private $_beginExecuteTime = 0;
    private $_afterExecuteTime = 0;
    private $_processData = null;
    private $_processReturnData = null;

    public function run()
    {
        $this->beforeProcess();
        $this->_processReturnData = $this->process();
        $this->afterProcess();
    }

    public function beforeProcess()
    {
        $this->_beginExecuteTime = TimeUtil::getMsTime();
    }

    public function afterProcess()
    {
        $this->_afterExecuteTime = TimeUtil::getMsTime();
    }

    public function setProcessData($data)
    {
        $this->_processData = $data;
    }

    public function getProcessData()
    {
        return $this->_processData;
    }

    public function print($data = null)
    {
        if ($data == null) {
            $data = $this->getProcessData();
            if ($data == null) {
                $data = $this->_processReturnData;
            }
        }

        echo 'Execute time ', sprintf("%.4f ms", $this->_afterExecuteTime - $this->_beginExecuteTime), PHP_EOL;
        echo '------------------------------------------', PHP_EOL;
        if (is_array($data)) {
            print_r($data);
            echo '------------------------------------------', PHP_EOL;
            return;
        }

        if (is_string($data) || is_numeric($data)) {
            echo $data, PHP_EOL;
            echo '------------------------------------------', PHP_EOL;
            return;
        }

        var_dump($data);
        echo '------------------------------------------', PHP_EOL;
    }
}