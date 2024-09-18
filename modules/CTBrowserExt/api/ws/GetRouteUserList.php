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

class CTBrowserExt_WS_GetRouteUserList extends CTBrowserExt_WS_Controller {
	
	function getSearchFilterModel($module, $search) {
		return CTBrowserExt_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(CTBrowserExt_API_Request $request) {
		$page = $request->get('page', 0);
		return CTBrowserExt_WS_PagingModel::modelWithPageStart($page);
	}
	
	function process(CTBrowserExt_API_Request $request) {
		global $adb, $current_user;
		$current_user = $this->getActiveUser();
		$userid = $current_user->id;
		$roleid = $current_user->roleid;
		
		require_once('include/utils/UserInfoUtil.php');
		$now_rs_users = getRoleAndSubordinateUsers($roleid);
		foreach ($now_rs_users as $now_rs_userid => $now_rs_username) {
			
			$userRecordModel = Vtiger_Record_Model::getInstanceById($now_rs_userid, 'Users');
			$first_name = trim($userRecordModel->get('first_name'));
			$last_name = trim($userRecordModel->get('last_name'));
			$userName = $first_name.' '.$last_name;
			$userData[] =  array('userid'=>$now_rs_userid, 'username'=>$first_name."".$last_name);		
		}
		
		if(count($userData) == 0) {
			$response->setResult(array('code'=>404,'message'=>vtranslate('LBL_NO_RECORDS_FOUND','Vtiger')));
		}
		$response = new CTBrowserExt_API_Response();
		$response->setResult($userData);
		return $response;				
	}
}

?>
