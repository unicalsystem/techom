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

class CTBrowserExt_WS_FetchAllAlerts extends CTBrowserExt_WS_Controller {
	
	function process(CTBrowserExt_API_Request $request) {
		$response = new CTBrowserExt_API_Response();
		$current_user = $this->getActiveUser();
		$result = array();
		$result['alerts'] = $this->getAlertDetails();
		$response->setResult($result);
		return $response;
	}
	function getAlertDetails() {
		$alertModels = CTBrowserExt_WS_AlertModel::models();
		$alerts = array();
		foreach($alertModels as $alertModel) {
			$alerts[] = $alertModel->serializeToSend();;
		}
		return $alerts;
	}
}
