<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

class CTBrowserExt_WS_GetEmailTrackingData extends CTBrowserExt_WS_Controller {
	
	function process(CTBrowserExt_API_Request $request) {
		global $adb, $current_user;
		$user_id = trim($request->get('user_id'));
		$email_id = trim($request->get('email_id'));

		$selectQuery = $adb->pquery("SELECT * FROM ctbrowser_email_tracking WHERE email_id =? AND user_id =?
                                         ORDER BY datetime DESC ", array($email_id,$user_id));								
		$selectQueryCount = $adb->num_rows($selectQuery);
		$userData = array();
		for($i=0;$i<$selectQueryCount;$i++) {
			$email_id = $adb->query_result($selectQuery, $i, 'email_id');
			$userid = $adb->query_result($selectQuery, $i, 'user_id');
			$userRecordModel = Vtiger_Record_Model::getInstanceById($userid, 'Users');
			$first_name = trim($userRecordModel->get('first_name'));
			$last_name = trim($userRecordModel->get('last_name'));
			$userName = $first_name.' '.$last_name;
			$mode = $adb->query_result($selectQuery, $i, 'mode');
			$datetime = $adb->query_result($selectQuery, $i, 'datetime');
			$userModel = Users_Privileges_Model::getCurrentUserModel();
			list($date,$time) = explode(' ', $datetime);
			$date = Vtiger_Date_UIType::getDisplayValue($date);
			if ($userModel->get('hour_format') == '12') {
				$time = Vtiger_Time_UIType::getTimeValueInAMorPM($time);
			}
			$userdatetime = $date.' ' .$time;
			$link = $adb->query_result($selectQuery, $i, 'link');
			if($link == null){
				$link = "";
			}else{
				$length = strlen($link);
				if($length > 50){
					$link = substr($link,0,50).'...';
				}
			}
			$userData[] =  array('email_id'=>$email_id,'user_id'=>$userid,'username'=>$first_name."".$last_name,'datetime'=>$userdatetime,'mode'=>$mode,'link'=>$link);
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
