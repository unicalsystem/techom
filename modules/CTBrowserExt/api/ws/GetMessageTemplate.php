<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once dirname(__FILE__) . '/models/Alert.php';
include_once dirname(__FILE__) . '/models/SearchFilter.php';
include_once dirname(__FILE__) . '/models/Paging.php';

class CTBrowserExt_WS_GetMessageTemplate extends CTBrowserExt_WS_Controller {
	
	function getSearchFilterModel($module, $search) {
		return CTBrowserExt_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(CTBrowserExt_API_Request $request) {
		$page = $request->get('page', 0);
		return CTBrowserExt_WS_PagingModel::modelWithPageStart($page);
	}
	
	function process(CTBrowserExt_API_Request $request) {
		global $adb, $current_user;
		
		$message_type = trim($request->get('message_type'));
		$getTemplateQuery = $adb->pquery("SELECT * FROM vtiger_ctmessagetemplate INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_ctmessagetemplate.ctmessagetemplateid where vtiger_ctmessagetemplate.message_status = ? AND vtiger_ctmessagetemplate.message_type = ? AND vtiger_crmentity.deleted = 0", array('Active', $message_type));
		$countTemplate = $adb->num_rows($getTemplateQuery);
		
		for($i=0;$i<$countTemplate;$i++){
			$msgTemplateId = trim($adb->query_result($getTemplateQuery, $i, 'ctmessagetemplateid'));
			$templates_name = trim($adb->query_result($getTemplateQuery, $i, 'templates_name'));
			$description = trim($adb->query_result($getTemplateQuery, $i, 'description'));
			$message_status = trim($adb->query_result($getTemplateQuery, $i, 'message_status'));
			$message_type = trim($adb->query_result($getTemplateQuery, $i, 'message_type'));
			
			$messageTemplateData[] = array('msgTemplateId' => $msgTemplateId, 'templates_name' => $templates_name, 'description' => $description, 'message_status' => $message_status, 'message_type' => $message_type); 
		}
		
		$response = new CTBrowserExt_API_Response();
		$response->setResult($messageTemplateData);
		
		if ($countTemplate == 0) {
			$response->setResult(array('code'=>404,'message'=>vtranslate('LBL_NO_RECORDS_FOUND','Vtiger')));
		}
		
		return $response;
	}
}

?>
