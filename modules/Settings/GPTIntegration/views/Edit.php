<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
require_once('modules/GPTIntegration/connectors/Connector.php');
Class Settings_GPTIntegration_Edit_View extends Vtiger_Edit_View {

    function __construct() {
        $this->exposeMethod('showPopup');
    }

    public function process(Vtiger_Request $request) {
            $this->showPopup($request);
    }
    
    public function showPopup(Vtiger_Request $request) {
        $id = $request->get('id');
        $qualifiedModuleName = $request->getModule(false);
        $viewer = $this->getViewer($request);
        if($id){
            $recordModel = Settings_GPTIntegration_Record_Model::getInstanceById($id, $qualifiedModuleName);
        }else{
            $recordModel = Settings_GPTIntegration_Record_Model::getCleanInstance();
        }
        $moduleModel = Settings_GPTIntegration_Module_Model::getCleanInstance();
        $configFields = $moduleModel->getSettingsParameters();
        $viewer->assign('CONFIG_FIELDS', $configFields);
        $viewer->assign('RECORD_ID', $id);
        $viewer->assign('RECORD_MODEL', $recordModel);
        $viewer->assign('QUALIFIED_MODULE', $qualifiedModuleName);
        $viewer->assign('MODULE_MODEL', $moduleModel);
        $viewer->assign('MODULE', $qualifiedModuleName);
        $viewer->view('Edit.tpl', $qualifiedModuleName);
    }
}
