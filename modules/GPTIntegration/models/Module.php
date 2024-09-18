<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

class GPTIntegration_Module_Model extends Vtiger_Module_Model {
    
        var  $openAILogTable = 'vtiger_gptintegration_logs';

	/**
	 * Funxtion to identify if the module supports quick search or not
	 */
	public function isQuickSearchEnabled() {
		return false;
	}

	/*
	 * Function to get supported utility actions for a module
	 */
	function getUtilityActionsNames() {
		return array('AIPrompt');
	}

	/**
	 * Function to get Module Header Links (for Vtiger7)
	 * @return array
	 */
	public function getModuleBasicLinks(){

		return array();
	}

	function isFilterColumnEnabled() {
		return false;
	}
        
        public function isUtilityActionEnabled() {
            return true;
        }
        
        public function saveAIRequest($aiPrompt, $type, $response) {
            $db = PearDatabase::getInstance();
            $currentUserModel = Users_Privileges_Model::getCurrentUserModel();
            $query = "INSERT INTO ".$this->openAILogTable." (requested_user,requested_on,provider,gptintegration_prompt,gptintegration_response,tokens_consumed) VALUES(?,?,?,?,?,?)";
            if($response) {
                $response = json_decode($response, true);
                $totalTokens = $response['usage']['total_tokens'];
                $response = $response['choices'][0]['message']['content'];
            }
            $params = array($currentUserModel->getId(), date('Y-m-d H:i:s'), 'OpenAI', $aiPrompt, $response, $totalTokens);
            $db->pquery($query, $params);
        }
        
        public static function isOpenAIConfigured() {
            $db = PearDatabase::getInstance();
            $gptintegrationConfigResult = $db->pquery('SELECT 1 FROM vtiger_gptintegration_config', array());
            $isConfigured = false;
            if ($db->num_rows($gptintegrationConfigResult) > 0) {
                $isConfigured = true;
            }
            return $isConfigured;
        }
}
