<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once 'include/Webservices/Query.php';

include_once dirname(__FILE__) . '/FetchRecordWithGrouping.php';
include_once dirname(__FILE__) . '/models/Alert.php';

class CTBrowserExt_WS_FetchRecordsWithGrouping extends CTBrowserExt_WS_FetchRecordWithGrouping {
	
	function process(CTBrowserExt_API_Request $request) {
		$response = new CTBrowserExt_API_Response();
		$current_user = $this->getActiveUser();
		
		$module = trim($request->get('module'));
		$moduleWSID = CTBrowserExt_WS_Utils::getEntityModuleWSId($module);

		if (empty($module)) {
			$message = vtranslate('Module not specified.','CTBrowserExt');
			$response->setError(1501, "Module not specified.");
			return $response;
		}
		
		$records = array();
		
		// Fetch the request parameters
		$idlist = $request->get('ids');
		$alertid = $request->get('alertid');

		// List of ids specified?
		if (!empty($idlist)) {
			$idlist = Zend_Json::decode($idlist);
			$records = $this->fetchRecordsWithId($module, $idlist, $current_user);	
		} 
		// Alert id specified?
		else if (!empty($alertid)) {
			$alert = CTBrowserExt_WS_AlertModel::modelWithId($alertid);
			if ($alert === false) {
				$message = vtranslate('Alert not found','CTBrowserExt');
				$response->setError(1404, $message);
				$records = false;
			}
			
			$alert->setUser($current_user);
			$records = $this->fetchAlertRecords($module, $alert);
		}
		
		if ($records !== false) {
			$response->setResult(array('records' => $records));
		}
		
		return $response;
	}
	
	function fetchRecordsWithId($module, $idlist, $user) {
		if (empty($idlist)) return array();
		
		$wsresult = vtws_query(sprintf("SELECT * FROM {$module} WHERE id IN ('%s');", implode("','", $idlist)), $user);
		if (!empty($wsresult)) {
			$resolvedRecords = array();
			foreach($wsresult as $record) {
				$this->resolveRecordValues($record, $user);
				$resolvedRecords[] = $this->transformRecordWithGrouping($record, $module, false);
			}
		}
		return $resolvedRecords;
	}
	
	function fetchAlertRecords($module, $alert) {		
		global $adb;
		
		// Initialize global variable: ($alert->query() could indirectly depend if its using Module API as its base)
		global $current_user;
		if (!isset($current_user)) $current_user = $alert->getUser();
		
		$moduleWSID = CTBrowserExt_WS_Utils::getEntityModuleWSId($module);

		$alertResult = $adb->pquery($alert->query(), $alert->queryParameters());
		$alertRecords = array();
		
		// For Calendar module there is a need for merging Todo's
		if ($module == 'Calendar') {
			$eventsWSID = CTBrowserExt_WS_Utils::getEntityModuleWSId('Events');
			$eventIds = array(); $taskIds = array();			
			while($resultrow = $adb->fetch_array($alertResult)) {
				if (isset($resultrow['activitytype']) && $resultrow['activitytype'] == 'Task') {
					$taskIds[] = "{$moduleWSID}x". $resultrow['crmid'];
				} else {
					$eventIds[] = "{$eventsWSID}x". $resultrow['crmid'];
				}
			}
			$alertRecords = $this->fetchRecordsWithId($module, $taskIds, $alert->getUser());
			if (!empty($eventIds)) {
				$alertRecords = array_merge($alertRecords, $this->fetchRecordsWithId('Events', $eventIds, $alert->getUser()));
			}
		} else {
			$fetchIds = array();			
			while($resultrow = $adb->fetch_array($alertResult)) {
				$fetchIds[] = "{$moduleWSID}x" . $resultrow['crmid'];
			}
			$alertRecords = $this->fetchRecordsWithId($module, $fetchIds, $alert->getUser());
		}
		return $alertRecords;
	}
	
}
