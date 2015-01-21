<?php

require_once(dirname(__FILE__) . '/../../tests/TestDef.php');

/**
 * Created by IntelliJ IDEA.
 * User: d.mouton
 * Date: 22/12/2014
 * Time: 16:52
 */
class TestSuiteAdminController extends ModuleAdminController {

    private $tests;

    public function __construct() {
        $this->module = 'testsuite';
        $this->context = Context::getContext();
        parent::__construct();
    }

    public function renderList() {
        $sContent = null;
        $sRender = Tools::getValue('render');
        $this->tests = new TestDef();
        switch ($sRender) {
            case 'runTest':
                $sContent = $this->runTest();
                break;

            default :
                break;
        }

        $this->context->smarty->assign(
                array(
                    'sContent' => $sContent,
                    'aListFormat' => $this->tests->getTests(),
                    'runTestUrl' => __PS_BASE_URI__ . substr($_SERVER['PHP_SELF'], strlen(__PS_BASE_URI__)) . '?tab=TestSuiteAdmin&render=runTest&token=' . (isset($token) ? $token : $this->token),
                )
        );

        return $this->module->display(_MODULE_DIR_ . "testsuite", '/views/templates/admin/TestSuiteAdminView.tpl');
    }

    private function runTest() {
        return $this->tests->autorun();
    }

}
