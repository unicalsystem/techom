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

class Settings_GPTIntegration_SaveAjax_Action extends Vtiger_SaveAjax_Action {

    public function process(Vtiger_Request $request) {
        $id = $request->get('id');
        $provider = 'OpenAI';
        $recordModel = Settings_GPTIntegration_Record_Model::getCleanInstance();
        $recordModel->set('provider', $provider);
        if ($id) {
            $recordModel->set('id', $id);
        }
        $recordModel->set('api_key', $request->get('api_key'));
        $recordModel->set('org_id', $request->get('org_id'));
        $response = new Vtiger_Response();
        try {
            $OpenAI_Connector = GPTIntegration_Connector::getInstance();
            $authorize = $OpenAI_Connector->checkCredentials($request->get('api_key'), $request->get('org_id'));
            if ($authorize['data']) {
                $recordModel->save();
                $response->setResult(true);
            } else {
                $response->setError($authorize['error']['message']);
            }
        } catch (Exception $e) {
            $response->setError($e->getMessage());
        }
        $response->emit();
    }
}
