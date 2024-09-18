<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once 'include/Webservices/Retrieve.php';
include_once dirname(__FILE__) . '/FetchRecord.php';
include_once 'include/Webservices/DescribeObject.php';

class CTBrowserExt_WS_EmailAction extends CTBrowserExt_WS_FetchRecord {
	function process(CTBrowserExt_API_Request $request) {
		$mailaction = trim($request->get('mailaction'));
		global $current_user,$adb, $site_URL;
		$current_user = $this->getActiveUser();
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$response = new CTBrowserExt_API_Response();
		$actionlist = array();
		
		if ($mailaction == 1) {
			$linkToAvailableActions = MailManager_Relation_View::linkToAvailableActions();
		}else{
			$linkToAvailableActions = MailManager_Relation_View::getCurrentUserMailManagerAllowedModules();
			
		}
		foreach($linkToAvailableActions as $moduleName) {
			 if ($moduleName == 'Calendar'){
				 $label = vtranslate("LBL_ADD_CALENDAR", 'MailManager',$current_user->language);
				 $actionlist[] = array('moduleName' => $moduleName, 'label'=>$label); 
				 
				 $label1 = vtranslate("LBL_ADD_EVENTS", 'MailManager',$current_user->language);
				 $actionlist[] = array('moduleName' => 'Events', 'label'=>$label1); 
			 }else{
				  $label = vtranslate("LBL_MAILMANAGER_ADD_$moduleName", 'MailManager',$current_user->language);
				  $actionlist[] = array('moduleName' => $moduleName, 'label'=>$label); 
			 }
		}		
		$response->setResult(array('actionlist'=>$actionlist, 'module'=>'MailManager', 'message'=>''));	
		return $response;
	}
}
