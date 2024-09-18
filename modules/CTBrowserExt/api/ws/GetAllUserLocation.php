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

class CTBrowserExt_WS_GetAllUserLocation extends CTBrowserExt_WS_Controller {
	
	function getSearchFilterModel($module, $search) {
		return CTBrowserExt_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(CTBrowserExt_API_Request $request) {
		$page = $request->get('page', 0);
		return CTBrowserExt_WS_PagingModel::modelWithPageStart($page);
	}
	
	function process(CTBrowserExt_API_Request $request) {
		global $adb, $current_user;
		$userId = trim($request->get('userid'));
		$userId = substr($userId, stripos($userId, 'x')+1);
		$usersRecordModel = Users_Record_Model::getInstanceById($userId,'Users');
		$users = $usersRecordModel->getRoleBasedSubordinateUsers();
		$AccesibleUsers = array_keys($users);
		$userQuery = $adb->pquery("SELECT DISTINCT(userid) FROM ctbrowserext_userderoute WHERE userid != '".$userId."'");
		$userNumRows = $adb->num_rows($userQuery);
		for($k=0;$k<$userNumRows;$k++){
			$user_id = $adb->query_result($userQuery,$k,'userid');
			if(!in_array($user_id,$AccesibleUsers)){
				continue;
			}
		$selectUserQuery = $adb->pquery("SELECT * FROM ctbrowserext_userderoute INNER JOIN vtiger_users ON vtiger_users.id = ctbrowserext_userderoute.userid WHERE vtiger_users.deleted =0
                                        AND ctbrowserext_userderoute.userid =? AND ctbrowserext_userderoute.createdtime > ( NOW( ) - INTERVAL 1 HOUR ) ORDER BY ctbrowserext_userderoute.id DESC LIMIT 1", array($user_id));								
		$selectUserQueryCount = $adb->num_rows($selectUserQuery);
		
			for($i=0;$i<$selectUserQueryCount;$i++) {
				$userid = $adb->query_result($selectUserQuery, $i, 'id');
				$userRecordModel = Vtiger_Record_Model::getInstanceById($userid, 'Users');
				$first_name = trim($userRecordModel->get('first_name'));
				$last_name = trim($userRecordModel->get('last_name'));
				$userName = $first_name.' '.$last_name;
				$latitude = trim($adb->query_result($selectUserQuery, $i, 'latitude'));
				$longitude = trim($adb->query_result($selectUserQuery, $i, 'longitude'));
				$userData[] =  array('userid'=>$userid, 'latitude'=>$latitude, 'longitude'=>$longitude, 'username'=>$first_name."".$last_name);
			} 
		}
		if(count($userData) == 0) {
			throw new WebServiceException(404,vtranslate('LBL_NO_RECORDS_FOUND','Vtiger'));
		}
		$response = new CTBrowserExt_API_Response();
		$response->setResult($userData);
		return $response;				
	}
}

?>
