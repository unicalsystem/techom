<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once 'include/QueryGenerator/QueryGenerator.php';

class CTBrowserExt_WS_RecentEvent extends CTBrowserExt_WS_Controller {
	public $totalQuery = "";
	public $totalParams = array();
	
	function process(CTBrowserExt_API_Request $request) {
		$default_charset = VTWS_PreserveGlobal::getGlobal('default_charset');
		global $current_user,$adb, $site_URL;
		$current_user = $this->getActiveUser();
		$currentUser = Users_Record_Model::getCurrentUserModel();
		$groupsIds = Vtiger_Util_Helper::getGroupsIdsForUsers($currentUser->getId());
		$roleid = $current_user->roleid;
		$userid = $current_user->id;
		$index = trim($request->get('index'));
		$size = trim($request->get('size'));
		$user = $request->get('user');
		if($user == ''){
			$user = CTBrowserExt_WS_Utils::getEntityModuleWSId('Users').'x'.$current_user->id;
		}
		$limit = ($index*$size) - $size;
		$recentEvent_data = array();
		$generator = new QueryGenerator('Calendar', $current_user);
		$generator->setFields(array('subject', 'eventstatus','taskstatus', 'visibility','date_start','time_start','due_date','time_end','assigned_user_id','id','activitytype','recurringtype'));
		$eventQuery = $generator->getQuery();

		$currentDateTime = date("Y-m-d H:i:s");

		$nowInUserFormat = Vtiger_Datetime_UIType::getDisplayDateTimeValue(date('Y-m-d H:i:s'));
		$nowInDBFormat = Vtiger_Datetime_UIType::getDBDateTimeValue($nowInUserFormat);
		list($currentDate, $currentTime) = explode(' ', $nowInDBFormat);
		
		$eventQuery .= "
					AND (vtiger_activity.activitytype NOT IN ('Emails'))
					AND (vtiger_activity.status is NULL OR vtiger_activity.status NOT IN ('Completed', 'Deferred', 'Cancelled'))
					AND (vtiger_activity.eventstatus is NULL OR vtiger_activity.eventstatus NOT IN ('Held','Cancelled'))";

		$eventQuery.=" AND CASE WHEN vtiger_activity.activitytype='Task' THEN due_date >= '$currentDate' ELSE CONCAT(due_date,' ',time_end) >= '$nowInDBFormat' END";
		if($user != 'all' && $user != '') {
			$currentuser = explode('x',$user);
			$smownerid = $currentuser[1];
			$eventQuery .= " AND vtiger_crmentity.smownerid = $smownerid";
		}
		if($index == '' || $size == '') {
			$eventQuery .= " ORDER BY vtiger_activity.date_start, time_start DESC ";
		} else {
			$eventQuery .= " ORDER BY vtiger_activity.date_start, time_start DESC limit ".$limit.",".$size;
		}
		
		if($record == '') {
			$query = $adb->pquery($eventQuery);
		} else {
			$query = $adb->pquery($recordEventQuery);
		}
		
		for($i=0; $i<$adb->num_rows($query); $i++) {
			$activityid = $adb->query_result($query, $i, 'activityid');
			$subject = $adb->query_result($query, $i, 'subject');
			$subject = html_entity_decode($subject, ENT_QUOTES, $default_charset);
			$eventtype = $adb->query_result($query, $i, 'activitytype');
			$visibility = $adb->query_result($query, $i, 'visibility');
			$ownerId = $adb->query_result($query, $i, 'smownerid');
			$recordModel = Vtiger_Record_Model::getInstanceById($activityid);
			$linkurl = $site_URL.$recordModel->getDetailViewUrl();
			if($eventtype == 'Task'){
				$status = vtranslate($recordModel->get('taskstatus'),'Calendar');
			}else{
				$status = vtranslate($adb->query_result($query, $i, 'eventstatus'),'Events');
			}

			$eventtype = html_entity_decode($eventtype, ENT_QUOTES, $default_charset);
			$startDate = $adb->query_result($query, $i, 'date_start');
			$startTime = $adb->query_result($query, $i, 'time_start');

			$endDate = $adb->query_result($query, $i, 'due_date');
			$endTime = $adb->query_result($query, $i, 'time_end');
			
			$recordBusy = true;
			if(in_array($ownerId, $groupsIds)) {
				$recordBusy = false;
			} else if($ownerId == $currentUser->getId()){
				$recordBusy = false;
			}
			if($eventtype == 'Task'){
				$title = decode_html($subject);
			}else{
				if(!$currentUser->isAdminUser() && $visibility == 'Private' && $userid && $userid != $currentUser->getId() && $recordBusy) {
					$title = decode_html($userName).' - '.decode_html(vtranslate('Busy','Events')).'*';
					//$item['url']   = '';
				} else {
					$title = decode_html($subject);
					//$item['url']   = sprintf('index.php?module=Calendar&view=Detail&record=%s', $crmid);
				}
			}

			$start = Vtiger_Util_Helper::convertDateTimeIntoUsersDisplayFormat($startDate.' '.$startTime);
			if($eventtype == 'Task' ){
				$end =  Vtiger_Date_UIType::getDisplayDateValue($endDate);
			}else{
				$end = Vtiger_Util_Helper::convertDateTimeIntoUsersDisplayFormat($endDate.' '.$endTime);
			}
			$isFutureEvents = false;
			if($eventtype == 'Task'){
				$wsid = CTBrowserExt_WS_Utils::getEntityModuleWSId('Calendar');
				$recordId = $wsid.'x'.$activityid;
				$recordModule = 'Calendar';
				$recordModuleLabel = vtranslate('Calendar','Calendar');
				$prevModule = 'Calendar';
			}else{
				$wsid = CTBrowserExt_WS_Utils::getEntityModuleWSId('Events');
				$recordId = $wsid.'x'.$activityid;
				$recordModule = 'Events';
				$recordModuleLabel = vtranslate('Events','Events');
				$prevModule = 'Events';

				$startDateTimes = $startDate.' '.$startTime;
	            if(strtotime($startDateTimes) > strtotime($currentDateTime)){
	            	$isFutureEvents = true;
	            }
			}
			
			$formatDateDiffInStrings = Vtiger_Util_Helper::formatDateDiffInStrings("$startDate $startTime");
			if(Users_Privileges_Model::isPermitted($prevModule, 'DetailView', $activityid)){
				if($eventtype == 'Task'){
					$recentEvent_data[] = array('id'=> $recordId,'title'=>$title,'status'=>$status,'activitytype'=>$eventtype,'visibility'=>$visibility,'start'=>$start,'end'=>$end,'module'=>$recordModule,'modulelabel'=>$recordModuleLabel,'moduleicon' => CTBrowserExt_WS_Utils::getModuleURL($recordModule),'linkurl'=>$linkurl,'formatDateDiffInStrings'=>$formatDateDiffInStrings);
				}else{
					$recentEvent_data[] = array('id'=> $recordId,'title'=>$title,'status'=>$status,'activitytype'=>$eventtype,'visibility'=>$visibility,'start'=>$start,'end'=>$end,'module'=>$recordModule,'modulelabel'=>$recordModuleLabel,'moduleicon' => CTBrowserExt_WS_Utils::getModuleURL($recordModule),'isFutureEvents'=>$isFutureEvents,'linkurl'=>$linkurl,'formatDateDiffInStrings'=>$formatDateDiffInStrings);
				}
			}
		}
		
	   	$name = 'start';
	   	usort($recentEvent_data, function ($a, $b) use(&$name){
		  return strtotime($a[$name]) - strtotime($b[$name]);
		});

	   	$isLast = true;
		if($this->totalQuery != ""){
			$totalResults = $adb->pquery($this->totalQuery,$this->totalParams);
			$totalRecords = $adb->num_rows($totalResults);
			if($totalRecords > $index*$size){
				$isLast = false;	
			}else{
				$isLast = true;
			}
		}

		$sharedUsers = Calendar_Module_Model::getSharedUsersOfCurrentUser($current_user->id);
		$sharedGroups = Calendar_Module_Model::getSharedCalendarGroupsList($current_user->id);
		$picklistValues = array();

		$picklistValues[] = array('value'=>'all','label'=>vtranslate('LBL_ALL'));
		$picklistValues[] = array('value'=>CTBrowserExt_WS_Utils::getEntityModuleWSId('Users').'x'.$current_user->id,'label'=>vtranslate('LBL_MINE'));
		foreach ($sharedUsers as $key => $value) {
			$picklistValues[] = array('value'=>CTBrowserExt_WS_Utils::getEntityModuleWSId('Users').'x'.$key,'label'=>decode_html(decode_html($value)));
		}
		foreach ($sharedGroups as $key => $value) {
			$picklistValues[] = array('value'=>CTBrowserExt_WS_Utils::getEntityModuleWSId('Groups').'x'.$key,'label'=>decode_html(decode_html($value)));
		}
		foreach ($picklistValues as $key => $value) {
			if($value['value'] == $user){
				$uservalues = $value;
			}
		}
		$statuspicklistValues = Vtiger_Util_Helper::getRoleBasedPicklistValues('eventstatus',$roleid);
		$picklistValues1 = array();
		foreach($statuspicklistValues as $pvalue){
			$picklistValues1[] = array('value'=>$pvalue, 'label'=>vtranslate($pvalue,'Events'));
		}

		$picklistValues2 = array();
		$taskPicklistValues = Vtiger_Util_Helper::getRoleBasedPicklistValues('taskstatus',$roleid);
		foreach($taskPicklistValues as $tpvalue){
			$picklistValues2[] = array('value'=>$tpvalue, 'label'=>vtranslate($tpvalue,'Calendar'));
		}
		$response = new CTBrowserExt_API_Response();
		if($adb->num_rows($query) == 0){
			$response->setResult(array('recentEvents'=>[], 'module'=>'Events', 'code'=>404,'message'=>vtranslate('LBL_NO_RECORDS_FOUND','Vtiger'),'isLast'=>$isLast,'picklistValues'=>$picklistValues,'user'=>$uservalues,'eventstatus'=>$picklistValues1,'taskstatus'=>$picklistValues2));
		} else {
			$response->setResult(array('recentEvents'=>$recentEvent_data, 'module'=>'Events', 'message'=>'','isLast'=>$isLast,'picklistValues'=>$picklistValues,'user'=>$uservalues,'eventstatus'=>$picklistValues1,'taskstatus'=>$picklistValues2));
		}
		return $response;
	}

}
