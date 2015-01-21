<?php
require_once(dirname(__FILE__) . '/../classes/MyDisplay.php');
require_once(dirname(__FILE__) . '/../simpletest/autorun.php');
require_once(dirname(__FILE__) . '/../simpletest/web_tester.php');

/**
 * Created by IntelliJ IDEA.
 * User: d.mouton
 * Date: 23/12/2014
 * Time: 10:32
 */
SimpleTest::prefer(new MyDisplay());

class TestDef extends GroupTest {
    function __construct() {
        parent::__construct('All test');
    }

    public function autorun(){
        ob_start();
        simpletest_autorun();
        $sContent = ob_get_contents();
        ob_end_clean();
        return $sContent;
    }

    public function getTests(){
        $result = array();
        $id = 0;
        foreach( $this->test_cases as $test){
           $result[] = array(
                "id" => $id,
                "name" => $test->getLabel(),
                "result" => false,
           );
        }
        return $result;
    }
} 