<?php
/*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once 'include/Webservices/DescribeObject.php';

class CTBrowserExt_WS_Describe extends CTBrowserExt_WS_Controller {
	
	function process(CTBrowserExt_API_Request $request) {
		$default_charset = VTWS_PreserveGlobal::getGlobal('default_charset');
		global $adb;
		$current_user = $this->getActiveUser();
		$roleid = $current_user->roleid;
		$module = trim($request->get('module'));
		$isFilter = trim($request->get('isFilter'));
		if($module == 'Users'){
			$current_user = Users::getActiveAdminUser();
		}
		$describeInfo = vtws_describe($module, $current_user);
		$fields = $describeInfo['fields'];
		
		$moduleModel = Vtiger_Module_Model::getInstance($module);
		$QuickCreateAction = $moduleModel->isQuickCreateSupported();
		$describeInfo['QuickCreateAction'] = $QuickCreateAction;
		$fieldModels = $moduleModel->getFields();
		
		if($module == 'Events'){
			$modulename = 'Calendar';
		}else{
			$modulename = $module;
		}
		// code start for Entity Field By suresh /
		$entityQuery = $adb->pquery("SELECT * FROM vtiger_entityname WHERE modulename = ?",array($modulename));
		$entityField = $adb->query_result($entityQuery,0,'fieldname');
		$entityField_array = explode(',',$entityField);
		$entityField = $entityField_array[0];
		$tabid = getTabid($modulename);
		
		$entityQuery11 = $adb->pquery("SELECT * FROM vtiger_field WHERE columnname = ? and tabid= ?",array($entityField,$tabid));
		$fieldlabel = $adb->query_result($entityQuery11,0,'fieldlabel');
		$fieldlabel = vtranslate($fieldlabel,$modulename);
		
		$describeInfo['entityField'] = array('label'=>$fieldlabel,'value'=>$entityField);
		
		// code End for Entity Field By suresh /
		
		foreach($fields as $index=>$field) {
			
			if($field['name'] == 'currency_id' && $module == 'PriceBooks'){
				$field['type'] = array();
				$query = "SELECT id,currency_name FROM  `vtiger_currency_info` WHERE currency_status = 'Active' AND deleted = 0";
				$result = $adb->pquery($query,array());
				$numrows = $adb->num_rows($result);
				$query2 = "SELECT id FROM vtiger_ws_entity WHERE name = 'Currency'";
				$resullt2 = $adb->pquery($query2,array());
				$id = $adb->query_result($resullt2,0,'id');
				for($i=0;$i<$numrows;$i++){
					$currency_name = $adb->query_result($result,$i,'currency_name');
					$value = $adb->query_result($result,$i,'id');
					$picklistValues[] = array('label'=>$currency_name,'value'=>$id.'x'.$value);
				}
				$field['type']['picklistValues'] = $picklistValues;
				$field['type']['defaultValue'] = trim($picklistValues[0]['value']);
				$field['type']['name'] = 'picklist';
			}
			if($field['name'] == 'folderid' && $module == 'Documents'){
				$field['type'] = array();
				$query = "SELECT folderid,foldername FROM  `vtiger_attachmentsfolder` ORDER BY sequence ASC";
				$result = $adb->pquery($query,array());
				$numrows = $adb->num_rows($result);
				$query2 = "SELECT id FROM vtiger_ws_entity WHERE name = 'DocumentFolders'";
				$resullt2 = $adb->pquery($query2,array());
				$id = $adb->query_result($resullt2,0,'id');
				for($i=0;$i<$numrows;$i++){
					$foldername = $adb->query_result($result,$i,'foldername');
					$folderid = $adb->query_result($result,$i,'folderid');
					$picklistValues[] = array('label'=>$foldername,'value'=>$id.'x'.$folderid);
				}
				$field['type']['picklistValues'] = $picklistValues;
				$field['type']['defaultValue'] = trim($picklistValues[0]['value']);
				$field['type']['name'] = 'picklist';
			}
			$fieldModel = $fieldModels[$field['name']];
			$fieldBlock = $fieldModel->block;
			$fieldId = $fieldModel->id;
			
			$restrictedFields = array('sendnotification','duration_hours','tax1','tax2','tax3','isconvertedfromlead','filelocationtype','fileversion');
			if(in_array($field['name'],$restrictedFields)){
					unset($field);
					continue;
			}
			if(($field['name'] == 'modifiedby'  ) && ($module == 'Calendar' || $module == 'Events')){
				continue;
			}
			
			if(($module == 'Calendar' || $module == 'Events') && ($field['name'] == 'activitytype')){
				$defaultactivitytype = $current_user->defaultactivitytype;
				if($defaultactivitytype != ''){
					$field['default'] = trim($defaultactivitytype);
				}
			}
			if(($module == 'Calendar' || $module == 'Events') && ($field['name'] == 'eventstatus')){
				$defaulteventstatus = $current_user->defaulteventstatus;
				if($defaulteventstatus != ''){
					$field['default'] = trim($defaulteventstatus);
				}
			}
			if($field['default'] != '' && $field['type']['name'] == 'picklist'){
				$field['type']['defaultValue'] = trim($field['default']);
			}else{
				$field['type']['defaultValue'] = trim($field['default']);
			}
			
			if($field['type']['defaultValue'] == 'Select an Option'){
				 $field['type']['defaultValue'] = ""; 
			}
			
			if($fieldModel) {
				$displaytype = $fieldModel->get('displaytype');
				$uitype =  $fieldModel->get('uitype');
				if($uitype == 15 || $uitype == 33){
					$picklistValues1 = array();
					$picklistValues = Vtiger_Util_Helper::getRoleBasedPicklistValues($field['name'],$roleid);
					foreach($picklistValues as $pvalue){
						$picklistValues1[] = array('value'=>$pvalue, 'label'=>vtranslate($pvalue,$module));
						$field['type']['picklistValues'] = $picklistValues1;
					}
					
					
				}
				if($uitype == 33){
						$field['type']['defaultValue'] = "";
					}
				//remove Image Field 
				if($uitype == 69 && $field['name'] != 'imagename'){
					unset($field);
					continue;
				}
				$allowedFields = array('productid','time_start','time_end','duration_hours');
				if($isFilter === 'true'){
					$allowedFields[] = 'modifiedtime';
					$allowedFields[] = 'createdtime';
				}
				if($displaytype != 1 && !in_array($field['name'],$allowedFields)){
					unset($field);
					continue;
				}

				$field['headerfield'] = $fieldModel->get('headerfield');
				$field['summaryfield'] = $fieldModel->get('summaryfield');
				$field['uitype'] = $fieldModel->get('uitype');
				$field['typeofdata'] = $fieldModel->get('typeofdata');
				$field['displaytype'] = $fieldModel->get('displaytype');
				$field['quickcreate'] = $fieldModel->get('quickcreate');
				$field['blockId'] = $fieldBlock->id;
				$field['blockname'] = vtranslate($fieldBlock->label, $module);
				$getSequencefieldQuery = $adb->pquery("SELECT sequence from vtiger_field where fieldid = ?", array($fieldId));
				$sequence = $adb->query_result($getSequencefieldQuery, 0, 'sequence');
				$field['sequence'] = $sequence;
			}else{
				$field['mandatory'] = false;
				$field['isunique'] = false;
				$field['nullable'] = true;
				$field['editable'] = true;
				$field['default'] = "";
				$field['headerfield'] = null;
				$field['summaryfield'] = "0";
				$field['uitype'] = "";
				$field['typeofdata'] = "";
				$field['displaytype'] = "1";
				$field['quickcreate'] = "1";
			}
			
			if($fieldModel && $fieldModel->getFieldDataType() == 'owner') {
				$currentUser = Users_Record_Model::getCurrentUserModel();
                $users = $currentUser->getAccessibleUsers();
                $usersWSId = CTBrowserExt_WS_Utils::getEntityModuleWSId('Users');
                foreach ($users as $id => $name) {
                    unset($users[$id]);
                    $users[$usersWSId.'x'.$id] = $name; 
                }
                
                $groups = $currentUser->getAccessibleGroups();
                $groupsWSId = CTBrowserExt_WS_Utils::getEntityModuleWSId('Groups');
                foreach ($groups as $id => $name) {
                    unset($groups[$id]);
                    $groups[$groupsWSId.'x'.$id] = $name; 
                }

				//Special treatment to set default mandatory owner field
				if (!$field['default']) {
					$field['default'] = $usersWSId.'x'.$current_user->id;
				}
			}
			if($fieldModel && $fieldModel->get('name') == 'salutationtype') {
				$values = $fieldModel->getPicklistValues();
				$picklistValues = array();
				foreach($values as $value => $label) {
					$picklistValues[] = array('value'=>trim($value), 'label'=>trim($label));
				}
				$field['type']['picklistValues'] = $picklistValues;
			}
			//code start by suresh for isInContextmenu
			if($module == 'Leads'){
				$isInContextmenuFields = array('firstname','lastname','company','phone','email');
			}else if($module == 'Contacts'){
				$isInContextmenuFields = array('firstname','lastname','phone','email');
			}else if($module == 'Accounts'){
				$isInContextmenuFields = array('accountname','website','phone');
			}else if($module == 'Contacts'){
				$isInContextmenuFields = array('vendorname','website','phone','email');
			}else{
				$isInContextmenuFields =  array();
			}

			if(in_array($field['name'], $isInContextmenuFields)){
				$field['isInContextmenu'] = true;
			}else{
				$field['isInContextmenu'] = false;
			}//code end by suresh for isInContextmenu

			$newFields[] = $field;
		}

		if($module == 'Events'){
			$field = array();
			$query = "SELECT * FROM vtiger_users WHERE status='Active' AND is_owner!=1";
			$result = $adb->pquery($query, array());
			$picklistValues = Array();
			if($adb->num_rows($result) > 0) {
				while ($row = $adb->fetch_array($result)) {
					//Need to decode the picklist values twice which are saved from old ui
					$value = $row['first_name'].' '.$row['last_name'];
					$picklistValues[]= array('value'=>decode_html($row['id']), 'label'=>decode_html($value));
				}
			}
			$field['name'] = "invite_user";
			$field['label'] = "Invite People";
			$field['mandatory'] = false;
			$field['type']['picklistValues'] = $picklistValues;
            $field['type']['defaultValue'] = trim($picklistValues[0]['value']);
			
			if($field['type']['defaultValue'] == 'Select an Option'){
				 $field['type']['defaultValue'] = ""; 
			}
			
			$field['type']['name'] = "multipicklist";
			$field['nullable'] = "true";
			$field['editable'] = "true";
			$field['default'] = "";
			$field['headerfield'] = "null";
			$field['summaryfield'] = "0";
			$field['uitype'] = "33";
			$field['typeofdata'] = "V~O";
			$field['displaytype'] = "1";
			$field['quickcreate'] = "1";
			$field['blockId'] = "130";
			$field['blockname'] = "Invite";
			$field['sequence'] = "1";
			$field['isInContextmenu'] = false; //added by suresh
			$newFields[] = $field;
		}
		foreach($newFields as $key=> $fields){
			$newFields[$key]['label'] = html_entity_decode($fields['label'], ENT_QUOTES, $default_charset);
		}
		$fields=null;
		$describeInfo['fields'] = $newFields;
		
		$response = new CTBrowserExt_API_Response();
		$response->setResult(array('describe' => $describeInfo));
		
		return $response;
	}
}
 
