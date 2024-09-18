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
include_once 'include/QueryGenerator/QueryGenerator.php';

class CTBrowserExt_WS_GetDateBaseEventList extends CTBrowserExt_WS_Controller {
	
	function getSearchFilterModel($module, $search) {
		return CTBrowserExt_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(CTBrowserExt_API_Request $request) {
		$page = $request->get('page', 0);
		return CTBrowserExt_WS_PagingModel::modelWithPageStart($page);
	}
	
	function process(CTBrowserExt_API_Request $request) {
		global $current_user,$adb, $site_URL;
		$current_user = $this->getActiveUser();
		$userid = trim($request->get('userid'));
		$default_charset = VTWS_PreserveGlobal::getGlobal('default_charset');
		$recentEvent_data = array();
		$generator = new QueryGenerator('Events', $current_user);
		$generator->setFields(array('subject','activitytype','location','date_start','time_start','location','createdtime','modifiedtime','id'));
		$eventQuery = $generator->getQuery();
		$startdate = $request->get('startdate');
		$response = new CTBrowserExt_API_Response();
		if (empty($startdate)) {
			$message = vtranslate('Start Date cannot be empty!','CTBrowserExt');
			$response->setError(1501, $message);
			return $response;
		}
		
		$enddate = $request->get('enddate');
		if (empty($enddate)) {
			$message = vtranslate('End Date cannot be empty!','CTBrowserExt');
			$response->setError(1501,$message);
			return $response;
		}
		 
		if (empty($userid)) {
			$message = vtranslate('Userid cannot be empty!','CTBrowserExt');
			$response->setError(1501, $message);
			return $response;
		}
		$startDateTime = new DateTimeField($startdate . ' ' . date('H:i:s'));
		$userStartDate = $startDateTime->getDisplayDate();
		$userStartDateTime = new DateTimeField($userStartDate . ' 00:00:00');
		$startDateTime = $userStartDateTime->getDBInsertDateTimeValue();
		
		$endDateTime = new DateTimeField($enddate . ' ' . date('H:i:s'));
		$userEndDate = $endDateTime->getDisplayDate();
		$userEndDateTime = new DateTimeField($userEndDate . ' 23:59:00');
		$endDateTime = $userEndDateTime->getDBInsertDateTimeValue();
		$eventQuery .= " AND vtiger_crmentity.setype = 'Calendar' AND CAST((CONCAT(vtiger_activity.date_start,' ',vtiger_activity.time_start)) AS DATETIME) BETWEEN '" . $startDateTime . "' and '" . $endDateTime . "'  AND vtiger_crmentity.deleted =0  ORDER BY vtiger_activity.date_start, time_start DESC";
		$query = $adb->pquery($eventQuery);
		
		for($i=0; $i<$adb->num_rows($query); $i++) {
			$activityid = $adb->query_result($query, $i, 'activityid');
			$eventSubject = $adb->query_result($query, $i, 'subject');
			$eventSubject = html_entity_decode($eventSubject, ENT_QUOTES, $default_charset);
			$eventtype = $adb->query_result($query, $i, 'activitytype');
			$eventtype = html_entity_decode($eventtype, ENT_QUOTES, $default_charset);
			$startDate = $adb->query_result($query, $i, 'date_start');
			$startTime = $adb->query_result($query, $i, 'time_start');
			$location = $adb->query_result($query, $i, 'location');
			$location = html_entity_decode($location, ENT_QUOTES, $default_charset);
			
			$moduleModel = Vtiger_Module_Model::getInstance('Calendar');
			$fieldModels = $moduleModel->getFields();
			$FIELD_MODEL = $fieldModels['date_start'];
			$startDate = $FIELD_MODEL->getDisplayValue($startDate);
			$FIELD_MODEL = $fieldModels['time_start'];
			$startTime = $FIELD_MODEL->getDisplayValue($startTime);
			$startDateTime = $startDate." ".$startTime;
			
			$createdTime = $adb->query_result($query, $i, 'createdtime');
			if($createdTime!=''){
				$dateTimeFieldInstance = new DateTimeField($createdTime);
				$createdTime = $dateTimeFieldInstance->getDisplayDateTimeValue($current_user);
			}
			
			$modifiedtime = $adb->query_result($query, $i, 'modifiedtime');
			if($modifiedtime!=''){
				$dateTimeFieldInstance = new DateTimeField($modifiedtime);
				$modifiedtime = $dateTimeFieldInstance->getDisplayDateTimeValue($current_user);
			}
			
			 $checkRecordExit = $adb->pquery("SELECT * from ct_address_lat_long where recordid = ?", array($activityid));
			 $countRecord = $adb->num_rows($checkRecordExit);
			 if($countRecord > 0) {
				$latitude = $adb->query_result($checkRecordExit, 0, 'latitude');
				$longitude = $adb->query_result($checkRecordExit, 0, 'longitude');
			 }
			 
			 if(empty($latitude)){
				 $latitude = 0; 
			 }
			 
			 if(empty($longitude)){
				 $longitude = 0; 
			 }
			$EventTaskQuery = $adb->pquery("SELECT * FROM  `vtiger_activity` WHERE activitytype = ? AND activityid = ?",array('Task',$activityid)); 
			if($adb->num_rows($EventTaskQuery) > 0){
				$wsid = CTBrowserExt_WS_Utils::getEntityModuleWSId('Calendar');
				$recordId = $wsid.'x'.$activityid;
				$recordModule = 'Calendar';
			}else{
				$wsid = CTBrowserExt_WS_Utils::getEntityModuleWSId('Events');
				$recordId = $wsid.'x'.$activityid;
				$recordModule = 'Events';
			}
			if(Users_Privileges_Model::isPermitted('Calendar', 'DetailView', $activityid)){
				$recentEvent_data[] = array('activityid'=> $recordId, 'module'=>$recordModule, 'eventSubject' => $eventSubject, 'activitytype' => $eventtype,'startDate' => $startDate,'startTime' => $startTime, 'startDateTime' => $startDateTime, 'location' => $location,
									'createdTime' => $createdTime, 'modifiedtime' => $modifiedtime, 'hour_format' => $current_user->hour_format, 'latitude' => $latitude, 'longitude' => $longitude);
			}
		}
	   $name = 'startDateTime';
	   usort($recentEvent_data, function ($a, $b) use(&$name){
		  return strtotime($a[$name]) - strtotime($b[$name]);
		});

		
		if($adb->num_rows($query) == 0){
			$response->setResult(array('GetEventList'=>[],'module'=>'Events','code'=>404,'message'=>vtranslate('LBL_NO_RECORDS_FOUND','Vtiger')));
		} else {
			$response->setResult(array('GetEventList'=>$recentEvent_data, 'module'=>'Events', 'message'=>''));
		}
		return $response;
	}
}
