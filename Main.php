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

    public function testJudgeListNodeIsBackWord()
    {
        $obj = new JudgeListNodeIsBackWord(
            (new ListNode())->setVal(1)->setNext((new ListNode())->setVal(2)->setNext((new ListNode())->setVal(3)->setNext(null)))
        );
        $obj->run();
        $obj->print();
    }

    public function testSearchNTreeNodeDepth()
    {
        $obj = new SearchNTreeNodeDepth(
            (new NTreeNode())->setVal(1)->setNode([
                (new NTreeNode())->setVal(3)->setNode([
                    (new NTreeNode())->setVal(5)->setNode([]),
                    (new NTreeNode())->setVal(6)->setNode([]),
                ]),
                (new NTreeNode())->setVal(2)->setNode([
                    (new NTreeNode())->setVal(6)->setNode([
                        (new NTreeNode())->setVal(5)->setNode([
                            (new NTreeNode())->setVal(5)->setNode([]),
                            (new NTreeNode())->setVal(6)->setNode([]),
                        ]),
                        (new NTreeNode())->setVal(6)->setNode([]),
                    ]),
                ]),
                (new NTreeNode())->setVal(4)->setNode([]),
            ])
        );
        $obj->run();
        $obj->print();
    }

    public function testMaxSwingSeq()
    {
        $obj = new MaxSwingSeq([1,17,5,10,13,15,10,5,16,8]);
        //$obj = new MaxSwingSeq([1,7,4,9,2,5]);
        $obj->run();
        $obj->print();
    }

    public function testTrie()
    {
        $obj = new Trie(['hello', 'world', 'java', 'how', 'old', 'are', 'you'], ['how', 'must', 'you']);
        $obj->run();
        $obj->print();
    }
}

//(new Main())->testMaxSameSubStringInAnyPlace();
//(new Main())->testSearchRighMaxNumAndReplace();
//(new Main())->testSearchMaxAscReq();
//(new Main())->testJudgeListNodeIsBackWord();
//(new Main())->testSearchNTreeNodeDepth();
//(new Main())->testMaxSwingSeq();
(new Main())->testTrie();