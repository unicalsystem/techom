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

class CTBrowserExt_WS_GetMonthBaseEventCount extends CTBrowserExt_WS_Controller {
	
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
		$month = trim($request->get('month'));
		$year = trim($request->get('year'));
		
		$recentEvent_data = array();
		$generator = new QueryGenerator('Events', $current_user);
		$generator->setFields(array('subject','activitytype','location','date_start','time_start','location','createdtime','modifiedtime','id'));
		$eventQuery = $generator->getQuery();
		$month = $request->get('month');
		if (empty($month)) {
			$message = vtranslate('Month cannot be empty!','CTBrowserExt');
			$response->setError(1501, $message);
			return $response;
		}
		$year = $request->get('year');
		if (empty($year)) {
			$message = vtranslate('Year cannot be empty!','CTBrowserExt');
			$response->setError(1501, $message);
			return $response;
		}
		 
		if (empty($userid)) {
			$message = vtranslate('Userid cannot be empty!','CTBrowserExt');
			$response->setError(1501, $message);
			return $response;
		}
		$startdate = date($year.'-'.$month.'-01');
		$enddate = date($year.'-'.$month.'-t');
		
		$startDateTime = new DateTimeField($startdate . ' ' . date('H:i:s'));
		$userStartDate = $startDateTime->getDisplayDate();
		$userStartDateTime = new DateTimeField($userStartDate . ' 00:00:00');
		$startDateTime = $userStartDateTime->getDBInsertDateTimeValue();
		
		$endDateTime = new DateTimeField($enddate . ' ' . date('H:i:s'));
		$userEndDate = $endDateTime->getDisplayDate();
		$userEndDateTime = new DateTimeField($userEndDate . ' 23:59:00');
		$endDateTime = $userEndDateTime->getDBInsertDateTimeValue();
		
		$eventQuery .= " AND CAST((CONCAT(vtiger_activity.date_start,' ',vtiger_activity.time_start)) AS DATETIME) BETWEEN '" . $startDateTime . "' and '" . $endDateTime . "'  AND vtiger_crmentity.deleted =0  ORDER BY vtiger_activity.date_start, time_start DESC";
		$query = $adb->pquery($eventQuery);
		for($i=0; $i<$adb->num_rows($query); $i++) {
			$startDate = $adb->query_result($query, $i, 'date_start');
			$activityid = $adb->query_result($query, $i, 'activityid');
			if($startDate!=''){
				$startDate = DateTimeField::convertToUserFormat($startDate);
				if(Users_Privileges_Model::isPermitted('Calendar', 'DetailView', $activityid)){
					$recentEvent_data[] = $startDate;
				}
			}
		}
		
		$recentEvent_data = array_values(array_unique($recentEvent_data));
		$response = new CTBrowserExt_API_Response();
		if($adb->num_rows($query) == 0){
			$message = vtranslate('No event for this month','CTBrowserExt'); 
			$response->setResult(array('GetEventCount'=>[],'module'=>'Events','code'=>404,'message'=>$message));
		} else {
			$response->setResult(array('GetEventCount'=>$recentEvent_data, 'module'=>'Events', 'message'=>''));
		}
		
		return $response;
	}
}
