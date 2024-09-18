<?php

/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ********************************************************************************** */
require_once('modules/GPTIntegration/connectors/Connector.php');

class GPTIntegration_AskOpenAI_View extends Vtiger_Index_View {

    function __construct() {
        $this->exposeMethod('AskOpenAIView');
        $this->exposeMethod('requestOpenAI');
        $this->exposeMethod('checkUserAIPromptPermission');
    }

    public function process(Vtiger_Request $request) {
        $mode = $request->getMode();
        if (!empty($mode) && $this->isMethodExposed($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
    }

    public function checkUserAIPromptPermission(Vtiger_Request $request){
        $viewer = $this->getViewer($request);
        $response = new Vtiger_Response();
        $moduleModel = Vtiger_Module_Model::getInstance('GPTIntegration');
        $userPrevilegesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
        $AIPromptPermission = false;
        if($userPrevilegesModel->hasModulePermission($moduleModel->getId())){
            $isConfigured = GPTIntegration_Module_Model::isOpenAIConfigured();
            if($isConfigured) {
                $AIPromptPermission = Users_Privileges_Model::isPermitted('GPTIntegration','AIPrompt');
            }
        }
        $response->setResult(array('openAIPromptEnabled' => $AIPromptPermission));
        $response->emit();
    }

    public function AskOpenAIView(Vtiger_Request $request) {
        $module = $request->get('module');
        $type = $request->get('type');
        $viewer = $this->getViewer($request);
        $viewer->assign('MODULE', $module);
        $viewer->assign('TYPE', $type);
        $viewer->view('AskOpenAI.tpl', $module);
    }

    public function requestOpenAI(Vtiger_Request $request) {
        $module = $request->get('module');
        $query = $request->get('query');
        $type = $request->get('type');
        $viewer = $this->getViewer($request);
        $response = new Vtiger_Response();

        try {
            $OpenAIResponse = GPTIntegration_AskOpenAI_Action::requestOpenAI($request);
            if ($OpenAIResponse['error']) {
                $message = $OpenAIResponse['error'];
                $response->setError($message);
                $response->emit();
            } else {
                $viewer->assign('MODULE', $module);
                $viewer->assign('QUERY', $query);
                $viewer->assign('RESPONSE', $OpenAIResponse['data']);
                $viewer->assign('CREATEDON',  Vtiger_Datetime_UIType::getDateTimeValue($OpenAIResponse['createdon']));
                $viewer->assign('TYPE', $type);
                $viewer->view('OpenAIResponse.tpl', $module);
            }
        } catch (Exception $e) {
            $response->setError($e->getMessage());
            $response->emit();
        }
    }
}
