<?php
/**
 * Created by IntelliJ IDEA.
 * User: d.mouton
 * Date: 22/12/2014
 * Time: 16:35
 */


if (!defined('_PS_VERSION_'))
    exit;

class TestSuite extends Module
{

    public function __construct()
    {
        $this->name = 'testsuite';
        $this->tab = 'front_office_features';
        $this->version = '#rev#';
        $this->author = 'Happy Technologies';

        parent::__construct();

        $this->displayName = $this->l('Test Suite');
        $this->description = $this->l('Module pour executer et afficher le resultat de tests unitaires');

    }

    public function install()
    {
        $translations = array();
        $languages = Language::getLanguages();
        foreach ($languages as $language) $translations[$language['id_lang']] = "TestSuite";

        $menu =  Tab::getIdFromClassName('AdminTools');

        if (!parent::install()
            OR !$this->installModuleTab('TestSuiteAdmin', $translations, $menu)
        ) {
            return false;
        }
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    private function installModuleTab($tabClass, $tabName, $idTabParent) {
        try {
            copy(_PS_MODULE_DIR_ . $this->name . '/logo.gif', _PS_IMG_DIR_ . 't/' . $tabClass . '.gif');
        } catch (Exception $e) {
            $this->addLog(4, 'Erreur dans la copie du logo pour le module tab admin - ' . $e->getMessage());
        }
        $tab = new Tab();
        $tab->name = $tabName;
        $tab->class_name = $tabClass;
        $tab->module = $this->name;
        $tab->id_parent = $idTabParent;
        if (!$tab->save()) {
            return false;
        }

        return true;
    }



}