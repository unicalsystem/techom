<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

include_once dirname(__FILE__) . '/CTBrowserExt.Config.php';

class CTBrowserExt {
	
	/**
	 * Detect if request is from IPhone
	 */
	static function isSafari() {
		if(isset($_SERVER['HTTP_USER_AGENT'])) {
			$ua = $_SERVER['HTTP_USER_AGENT'];
			if(preg_match("/safari/i", $ua)) return true;
		}
		return false;
	}
	
	static function templatePath($filename) {
		return vtlib_getModuleTemplate('CTBrowserExt',"generic/$filename");
	}
	
	static function config($key, $defvalue = false) {
		// Defined in the configuration file
		global $Module_Mobile_Configuration;
		if(isset($Module_Mobile_Configuration) && isset($Module_Mobile_Configuration[$key])) {
			return $Module_Mobile_Configuration[$key];
		}
		return $defvalue;
	}
	
	/**
	 * Alert management
	 */
	static function alert_lookup($handlerPath, $handlerClass) {
		global $adb;
		$check = $adb->pquery("SELECT id FROM vtiger_mobile_alerts WHERE handler_path=? and handler_class=?", array($handlerPath, $handlerClass));
		if ($adb->num_rows($check)) {
			return $adb->query_result($check, 0, 'id');
		}
		return false;
	}
	static function alert_register($handlerPath, $handlerClass) {
		global $adb;
		if (self::alert_lookup($handlerPath, $handlerClass) === false) {
			Vtiger_Utils::Log("Registered alert {$handlerClass} [$handlerPath]");
			$adb->pquery("INSERT INTO vtiger_mobile_alerts (handler_path, handler_class, deleted) VALUES(?,?,?)", array($handlerPath, $handlerClass, 0));
		}
	}
	static function alert_deregister($handlerPath, $handlerClass) {
		global $adb;
		Vtiger_Utils::Log("De-registered alert {$handlerClass} [$handlerPath]");
		$adb->pquery("DELETE FROM vtiger_mobile_alerts WHERE handler_path=? AND handler_class=?", array($handlerPath, $handlerClass));
	}
	static function alert_markdeleted($handlerPath, $handlerClass, $flag) {
		global $adb;
		$adb->pquery("UPDATE vtiger_mobile_alerts SET deleted=? WHERE handler_path=? AND handler_class=?", array($flag, $handlerPath, $handlerClass));
	}
	
	/**
	 * Invoked when special actions are performed on the module.
	 * @param String Module name
	 * @param String Event Type (module.postinstall, module.disabled, module.enabled, module.preuninstall)
	 */
	function vtlib_handler($modulename, $event_type) {
		
		$registerWSAPI = false; 
		$registerAlerts = false;
		
		if($event_type == 'module.postinstall') {
			$registerWSAPI = true;
			$registerAlerts= true;
		} else if($event_type == 'module.disabled') {
			// TODO Handle actions when this module is disabled.
		} else if($event_type == 'module.enabled') {
			// TODO Handle actions when this module is enabled.
		} else if($event_type == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
		} else if($event_type == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($event_type == 'module.postupdate') {
			$registerWSAPI = true;
			$registerAlerts= true;
		}
		
		// Register alerts
		if ($registerAlerts) {
			self::alert_register('modules/CTBrowserExt/api/ws/models/alerts/IdleTicketsOfMine.php', 'CTBrowserExt_WS_AlertModel_IdleTicketsOfMine');
			self::alert_register('modules/CTBrowserExt/api/ws/models/alerts/NewTicketOfMine.php', 'CTBrowserExt_WS_AlertModel_NewTicketOfMine');
			self::alert_register('modules/CTBrowserExt/api/ws/models/alerts/PendingTicketsOfMine.php', 'CTBrowserExt_WS_AlertModel_PendingTicketsOfMine');
			self::alert_register('modules/CTBrowserExt/api/ws/models/alerts/PotentialsDueIn5Days.php', 'CTBrowserExt_WS_AlertModel_PotentialsDueIn5Days');
			self::alert_register('modules/CTBrowserExt/api/ws/models/alerts/EventsOfMineToday.php', 'CTBrowserExt_WS_AlertModel_EventsOfMineToday');
			self::alert_register('modules/CTBrowserExt/api/ws/models/alerts/ProjectTasksOfMine.php','CTBrowserExt_WS_AlertModel_ProjectTasksOfMine');
			self::alert_register('modules/CTBrowserExt/api/ws/models/alerts/Projects.php','CTBrowserExt_WS_AlertModel_Projects');
		}
		
		// Register webservice API
		if($registerWSAPI) {
			$operations = array();
			
			$operations[] = array (
				'name'       => 'ctbrowserext.fetchallalerts',
				'handler'    => 'ctbrowserext_ws_fetchAllAlerts',
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.alertdetailswithmessage',
				'handler'    => 'ctbrowserext_ws_alertDetailsWithMessage',
				'parameters' => array( array( 'name' => 'alertid', 'type' => 'string' ) )
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.fetchmodulefilters',
				'handler'    => 'ctbrowserext_ws_fetchModuleFilters',
				'parameters' => array( array( 'name' => 'module', 'type' => 'string' ) )
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.fetchrecord',
				'handler'    => 'ctbrowserext_ws_fetchRecord',
				'parameters' => array( array( 'name' => 'record', 'type' => 'string' ) )
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.fetchrecordwithgrouping',
				'handler'    => 'ctbrowserext_ws_fetchRecordWithGrouping',
				'parameters' => array( array( 'name' => 'record', 'type' => 'string' ) )
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.filterdetailswithcount',
				'handler'    => 'ctbrowserext_ws_filterDetailsWithCount',
				'parameters' => array( array( 'name' => 'filterid', 'type' => 'string' ) )
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.listmodulerecords',
				'handler'    => 'ctbrowserext_ws_listModuleRecords',
				'parameters' => array( array( 'name' => 'elements', 'type' => 'encoded' ) )
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.saverecord',
				'handler'    => 'ctbrowserext_ws_saveRecord',
				'parameters' => array( array( 'name' => 'module', 'type' => 'string' ),
					array( 'name' => 'record', 'type' => 'string' ),
					array( 'name' => 'values', 'type' => 'encoded' ),
				)
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.syncModuleRecords',
				'handler'    => 'ctbrowserext_ws_syncModuleRecords',
				'parameters' => array( array( 'name' => 'module', 'type' => 'string' ),
					array( 'name' => 'syncToken', 'type' => 'string' ),
					array( 'name' => 'page', 'type' => 'string' ),
				)
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.query',
				'handler'    => 'ctbrowserext_ws_query',
				'parameters' => array( array( 'name' => 'module', 'type' => 'string' ),
					array( 'name' => 'query', 'type' => 'string' ),
					array( 'name' => 'page', 'type' => 'string' ),
				)
			);
			
			$operations[] = array (
				'name'       => 'ctbrowserext.querywithgrouping',
				'handler'    => 'ctbrowserext_ws_queryWithGrouping',
				'parameters' => array( array( 'name' => 'module', 'type' => 'string' ),
					array( 'name' => 'query', 'type' => 'string' ),
					array( 'name' => 'page', 'type' => 'string' ),
				)
			);
			
			foreach($operations as $o) {
				$operation = new CTBrowserExt_WS_Operation($o['name'], $o['handler'], 'modules/CTBrowserExt/api/wsapi.php', 'POST');
				if(!empty($o['parameters'])) {
					foreach($o['parameters'] as $p) {
						$operation->addParameter($p['name'], $p['type']);
					}
				}
				$operation->register();
			}
		}
	}
}

/* Helper functions */
class CTBrowserExt_WS_Operation {
	var $opName, $opClass, $opFile, $opType;
	var $parameters = array();
	
	function __construct($apiName, $className, $handlerFile, $reqType) {
		$this->opName = $apiName;
		$this->opClass= $className;
		$this->opFile = $handlerFile;
		$this->opType = $reqType;
	}
	
	function addParameter($name, $type) {
		$this->parameters[] = array('name' => $name, 'type' => $type);
		return $this;
	}
	
	function register() {
		global $adb;
		$checkresult = $adb->pquery("SELECT 1 FROM vtiger_ws_operation WHERE name = ?", array($this->opName));
		if($adb->num_rows($checkresult)) {
			return;
		}
		
		Vtiger_Utils::Log("Enabling webservice operation {$this->opName}", true);
		
		$operationid = vtws_addWebserviceOperation($this->opName, $this->opFile, $this->opClass, $this->opType);
		for($index = 0; $index < count($this->parameters); ++$index) {
			vtws_addWebserviceOperationParam($operationid, $this->parameters[$index]['name'], $this->parameters[$index]['type'], ($index+1));
		}
	}
}
	
?>
