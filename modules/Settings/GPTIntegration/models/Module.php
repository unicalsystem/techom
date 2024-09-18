<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Settings_GPTIntegration_Module_Model extends Settings_Vtiger_Module_Model{
    
    /**
	 * Function to get the module model
	 * @return string
	 */
    public static function getCleanInstance(){
        return new self;
    }
    
    /**
	 * Function to get the ListView Component Name
	 * @return string
	 */
    public function getDefaultViewName() {
		return 'Index';
	}
    
	/**
	 * Function to get the EditView Component Name
	 * @return string
	 */
	public function getEditViewName(){
		return 'Edit';
	}
    
    /**
	 * Function to get the Module Name
	 * @return string
	 */
    public static function getModuleName(){
        return "GPTIntegration";
    }
    
    public function getParentName() {
        return parent::getParentName();
    }
    
    public function getModule($raw=true) {
		$moduleName = $this->getModuleName();
		if(!$raw) {
			$parentModule = $this->getParentName();
			if(!empty($parentModule)) {
				$moduleName = $parentModule.':'.$moduleName;
			}
		}
		return $moduleName;
	}
    
    public function getMenuItem() {
        $menuItem = Settings_Vtiger_MenuItem_Model::getInstance($this->getModuleName());
        return $menuItem;
    }
    
    /**
    * Function to get the url for default view of the module
    * @return <string> - url
    */
    public function getDefaultUrl() {
            return 'index.php?module='.$this->getModuleName().'&parent=Settings&view='.$this->getDefaultViewName();
    }

    /**
    * Function to get the url for Index settings view of the module
    * @return <string> - url
    */
    public function getDetailViewUrl() {
        $menuItem = $this->getMenuItem();
        return 'index.php?module='.$this->getModuleName().'&parent=Settings&view='.$this->getDefaultViewName().'&block='.$menuItem->get('blockid').'&fieldid='.$menuItem->get('fieldid');
    }


    /**
    * Function to get the url for Edit view of the module
    * @return <string> - url
    */
    public function getEditViewUrl() {
            $menuItem = $this->getMenuItem();
            return 'index.php?module='.$this->getModuleName().'&parent=Settings&view='.$this->getEditViewName().'&block='.$menuItem->get('blockid').'&fieldid='.$menuItem->get('fieldid');
    }
    
    /**
     * Function to get settings parameters
     * @return <array>
     */
    public function getSettingsParameters() {
        return array('api_key' => 'text', 'org_id' => 'text');
    }
    
    public function getAILogs() {
        $db = PearDatabase::getInstance();
        $query = 'SELECT id, requested_user, requested_on, gptintegration_prompt, gptintegration_response, tokens_consumed FROM vtiger_gptintegration_logs ORDER BY requested_on DESC LIMIT 100';
        $gptintegrationLogsResult = $db->pquery($query, array());
        $gptintegrationResultCount = $db->num_rows($gptintegrationLogsResult);
        $logs = $logsHeaders = array();
        if ($gptintegrationResultCount > 0) {
            for ($i = 0; $i < $gptintegrationResultCount; $i++) {
                $rowData = $db->fetchByAssoc($gptintegrationLogsResult);
                $userid = $rowData['requested_user'];
                $logid = $rowData['id'];
                $rowData['requested_user'] = Vtiger_Functions::getUserRecordLabel($userid);
                $rowData['requested_on'] = $rowData['requested_on'] ? Vtiger_Datetime_UIType::getDateTimeValue($rowData['requested_on']) : '';
                unset($rowData['id']);
                if(empty($logsHeaders)) $logsHeaders = array_keys($rowData);
                $logs[$logid] = $rowData;
            }
        }
        return array('logs'=>$logs, 'headers'=>$logsHeaders);
    }
}
