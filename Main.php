<?php
/**
 * Created by PhpStorm.
 * User: zicheng
 * Date: 2020/1/4
 * Time: 3:47 AM
 */

$GLOBAL_SPL_QUEUES = [];

function splAutoLoadFunc($className = '') {
    $workDir = __DIR__ . DIRECTORY_SEPARATOR;
    $filename = $workDir . $className . '.php';
    $md5Filename = md5($filename);

    if (file_exists($filename)) {
        global $GLOBAL_SPL_QUEUES;
        if (!isset($GLOBAL_SPL_QUEUES[$md5Filename])) {
            require_once $filename;
            $GLOBAL_SPL_QUEUES[$md5Filename] = $filename;
        }
    }
}

spl_autoload_register('splAutoLoadFunc');

class Main {
    function testMaxSameSubStringInAnyPlace() {
        $obj = new MaxSameSubStringInAnyPlace(["abcdefgabf", "abfadabcd", "abfsxabcdm"]);
        $data = $obj->run();
        $obj->print($data);
    }

    public function testSearchRighMaxNumAndReplace()
    {
        $obj = new SearchRighMaxNumAndReplace([17,18,5,4,6,1]);
        $data = $obj->run();
        $obj->print($data);
    }

    public function testSearchMaxAscReq()
    {
        //$obj = new SearchMaxAscSeq([1,3,5,4,7]);
        $obj = new SearchMaxAscSeq([2,2,2,2,2]);
        $obj->run();
        $obj->print();
    }
}

//(new Main())->testMaxSameSubStringInAnyPlace();
//(new Main())->testSearchRighMaxNumAndReplace();
(new Main())->testSearchMaxAscReq();