<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
class Settings_GPTIntegration_Index_View extends Settings_Vtiger_Index_View {

    function __construct() {
        $this->exposeMethod('gptintegrationconfig');
        $this->exposeMethod('gptintegrationlogs');
    }

    public function process(Vtiger_Request $request) {
        $mode = $request->get('mode');
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
        $qualifiedModule = $request->getModule(false);
        $recordModel = Settings_GPTIntegration_Record_Model::getInstance();
        $moduleModel = Settings_GPTIntegration_Module_Model::getCleanInstance();
        $configFields = $moduleModel->getSettingsParameters();
        
        $viewer = $this->getViewer($request);
        $viewer->assign('CONFIG_FIELDS', $configFields);
        $viewer->assign('RECORD_ID', $recordModel->get('id'));
        $viewer->assign('MODULE_MODEL', $moduleModel);
        $viewer->assign('MODULE', $qualifiedModule);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModule);
        $viewer->assign('RECORD_MODEL', $recordModel);
        $viewer->view('Index.tpl', $qualifiedModule);
    }

    public function gptintegrationconfig(Vtiger_Request $request) {
        $qualifiedModule = $request->getModule(false);
        $recordModel = Settings_GPTIntegration_Record_Model::getInstance();
        $moduleModel = Settings_GPTIntegration_Module_Model::getCleanInstance();
        $configFields = $moduleModel->getSettingsParameters();
        
        $viewer = $this->getViewer($request);
        $viewer->assign('CONFIG_FIELDS', $configFields);
        $viewer->assign('RECORD_ID', $recordModel->get('id'));
        $viewer->assign('MODULE_MODEL', $moduleModel);
        $viewer->assign('MODULE', $qualifiedModule);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModule);
        $viewer->assign('RECORD_MODEL', $recordModel);
        $viewer->view('OpenAIConfig.tpl', $qualifiedModule);
    }

    public function gptintegrationlogs(Vtiger_Request $request) {
        $qualifiedModule = $request->getModule(false);
        $moduleModel = Settings_GPTIntegration_Module_Model::getCleanInstance();
        $aiLogs = $moduleModel->getAILogs();
        $viewer = $this->getViewer($request);
        $viewer->assign('MODULE_MODEL', $moduleModel);
        $viewer->assign('MODULE', $qualifiedModule);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModule);
        $viewer->assign('AILOGS', $aiLogs['logs']);
        $viewer->assign('AILOGS_HEADERS', $aiLogs['headers']);
        
        $viewer->view('OpenAILogs.tpl', $qualifiedModule);
    }
}
