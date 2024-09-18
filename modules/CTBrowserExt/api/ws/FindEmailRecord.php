<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once 'include/Webservices/Retrieve.php';
include_once dirname(__FILE__) . '/FetchRecord.php';
include_once 'include/Webservices/DescribeObject.php';
include_once dirname(__FILE__) . '/models/SearchFilter.php';

class CTBrowserExt_WS_FindEmailRecord extends CTBrowserExt_WS_FetchRecord {
	function process(CTBrowserExt_API_Request $request) {
		$email = $request->get('email');
		$response = new CTBrowserExt_API_Response();
		if ($email != '') {
			global $current_user,$adb, $site_URL;
			$current_user = $this->getActiveUser();
			$presence = array('0', '2');
			$refrenceUitypes = array(10,51,57,58,59,66,73,75,76,78,80,81,101);
			$default_charset = VTWS_PreserveGlobal::getGlobal('default_charset');
			$userPrivModel = Users_Privileges_Model::getInstanceById($current_user->id);
			$module = 'Leads';
			$cvResult = $adb->pquery("SELECT `cvid` FROM `vtiger_customview` WHERE `entitytype` = 'Leads' AND `viewname` = 'All'");
			$filterid = $adb->query_result($cvResult,0,'cvid');

			if(!empty($filterid)) {
				$filterOrAlertInstance = CTBrowserExt_WS_FilterModel::modelWithId($module, $filterid);
			}

			$moduleWSId = CTBrowserExt_WS_Utils::getEntityModuleWSId($module);
			$moduleModel = Vtiger_Module_Model::getInstance($module);
			if (($userPrivModel->isAdminUser() ||
							$userPrivModel->hasGlobalReadPermission() ||
							$userPrivModel->hasModulePermission($moduleModel->getId())) && in_array($moduleModel->get('presence'), $presence)) {
				$Fields = $moduleModel->getSummaryViewFieldsList();
				$summaryFields = array_keys($Fields);
				$var =array();
				for($i=0;$i<count($summaryFields);$i++){
					$var[]= $summaryFields[$i];
				}
				$var[]='id';
				$var[] = 'email';
				$var[] = 'secondaryemail';
				$generator = new QueryGenerator($module, $current_user);
				$generator->initForCustomViewById($filterOrAlertInstance->filterid);
			    
				$generator->setFields($var);
				$query1 = $generator->getQuery();
				//$query1 = preg_replace("/SELECT.*FROM(.*)/i", "SELECT $selectColumnClause FROM $1", $query);
				$query1.= " AND ( vtiger_leaddetails.email = '$email' OR  vtiger_leaddetails.secondaryemail = '$email' ) ";
				/*$query1 = "SELECT * FROM vtiger_leaddetails INNER JOIN vtiger_crmentity ON vtiger_leaddetails.leadid = vtiger_crmentity.crmid
							WHERE vtiger_crmentity.deleted = 0 AND ( email = ? OR secondaryemail = ?)";*/
				$result1 = $adb->pquery($query1,$filterOrAlertInstance->queryParameters());
				$data = array();
				if($adb->num_rows($result1) > 0){
					$leadid = $adb->query_result($result1,0,'leadid');
					$recordModel = Vtiger_Record_Model::getInstanceById($leadid,'Leads');
					$moduleModel = $recordModel->getModule();
					$fieldModels = $moduleModel->getFields();
					$Fields = $moduleModel->getSummaryViewFieldsList();
					$summaryFields = array_keys($Fields);
					$ws_id = CTBrowserExt_WS_Utils::getEntityModuleWSId('Leads');
					$data['Leads']['id'] = $ws_id.'x'.$leadid;
					$record = explode('x',$data['Leads']['id']);
					$ActionData = $this->getActionData('Leads',$record);
					foreach ($ActionData as $key => $value) {
						$data['Leads'][$key] = $value;
					}
					$data['Leads']['fields'] = array();
					foreach($summaryFields as $key => $field_name){
						$fieldModel = $fieldModels[$field_name];
						$fieldLabel = vtranslate($fieldModel->get('label'),'Leads');
						$uitype = $fieldModel->get('uitype');
						$value = $recordModel->get($field_name);
						if(in_array($uitype,$refrenceUitypes)){
							if($value == 0){
								$value = "";
							}else{
								$labelresult = $adb->pquery("SELECT label FROM vtiger_crmentity WHERE crmid = ?",array($value));
								$new = decode_html(decode_html($adb->query_result($labelresult,0,'label')));
								$value = $new;
							}
						}else if($uitype == 53){
							$userRecordModel = Vtiger_Record_Model::getInstanceById($value,'Users');
							if(!empty($userRecordModel->get('user_name'))){
								$value = html_entity_decode($userRecordModel->get('first_name').' '.$userRecordModel->get('last_name'),ENT_QUOTES,$default_charset);
							}else{
								$query = "SELECT groupname FROM vtiger_groups WHERE groupid = ?";
								$groupResults = $adb->pquery($query,array($value));
								$value = html_entity_decode($adb->query_result($groupResults,0,'groupname'),ENT_QUOTES,$default_charset);
							}
						}
						$data['Leads']['fields'][] =  array('name'=>$field_name,'label'=>$fieldLabel,'value'=>$value);
					}
					$data['Leads']['isUpdateSupport'] = $moduleModel->isTrackingEnabled();
				}
			}
			
			$module = 'Contacts';
			$cvResult = $adb->pquery("SELECT `cvid` FROM `vtiger_customview` WHERE `entitytype` = 'Contacts' AND `viewname` = 'All'");
			$filterid = $adb->query_result($cvResult,0,'cvid');

			if(!empty($filterid)) {
				$filterOrAlertInstance = CTBrowserExt_WS_FilterModel::modelWithId($module, $filterid);
			}

			$moduleWSId = CTBrowserExt_WS_Utils::getEntityModuleWSId($module);
			$moduleModel = Vtiger_Module_Model::getInstance($module);
			if (($userPrivModel->isAdminUser() ||
							$userPrivModel->hasGlobalReadPermission() ||
							$userPrivModel->hasModulePermission($moduleModel->getId())) && in_array($moduleModel->get('presence'), $presence)) {
				$Fields = $moduleModel->getSummaryViewFieldsList();
				$summaryFields = array_keys($Fields);
				$var =array();
				for($i=0;$i<count($summaryFields);$i++){
					$var[]= $summaryFields[$i];
				}
				$var[]='id';
				$var[] = 'email';
				$var[] = 'secondaryemail';
				$generator = new QueryGenerator($module, $current_user);
				$generator->initForCustomViewById($filterOrAlertInstance->filterid);
			    
				$generator->setFields($var);
				$query2 = $generator->getQuery();
				//$query1 = preg_replace("/SELECT.*FROM(.*)/i", "SELECT $selectColumnClause FROM $1", $query);
				$query2.= " AND ( vtiger_contactdetails.email = '$email' OR vtiger_contactdetails.secondaryemail = '$email' ) ";

				/*$query2 = "SELECT * FROM vtiger_contactdetails INNER JOIN vtiger_crmentity ON vtiger_contactdetails.contactid = vtiger_crmentity.crmid
							WHERE vtiger_crmentity.deleted = 0 AND ( email = ? OR secondaryemail = ?)";*/
				$result2 = $adb->pquery($query2,$filterOrAlertInstance->queryParameters());
				if($adb->num_rows($result2) > 0){
					$contactid = $adb->query_result($result2,0,'contactid');
					$recordModel = Vtiger_Record_Model::getInstanceById($contactid,'Contacts');
					$moduleModel = $recordModel->getModule();
					$fieldModels = $moduleModel->getFields();
					$Fields = $moduleModel->getSummaryViewFieldsList();
					$summaryFields = array_keys($Fields);
					$ws_id = CTBrowserExt_WS_Utils::getEntityModuleWSId('Contacts');
					$data['Contacts']['id'] = $ws_id.'x'.$contactid;
					$record = explode('x',$data['Contacts']['id']);
					$ActionData = $this->getActionData('Contacts',$record);
					foreach ($ActionData as $key => $value) {
						$data['Contacts'][$key] = $value;
					}
					$data['Contacts']['fields'] = array();
					foreach($summaryFields as $key => $field_name){
						$fieldModel = $fieldModels[$field_name];
						$fieldLabel = vtranslate($fieldModel->get('label'),'Contacts');
						$uitype = $fieldModel->get('uitype');
						$value = $recordModel->get($field_name);
						if(in_array($uitype,$refrenceUitypes)){
							if($value == 0){
								$value = "";
							}else{
								$labelresult = $adb->pquery("SELECT label FROM vtiger_crmentity WHERE crmid = ?",array($value));
								$new = decode_html(decode_html($adb->query_result($labelresult,0,'label')));
								$value = $new;
							}
						}else if($uitype == 53){
							$userRecordModel = Vtiger_Record_Model::getInstanceById($value,'Users');
							if(!empty($userRecordModel->get('user_name'))){
								$value = html_entity_decode($userRecordModel->get('first_name').' '.$userRecordModel->get('last_name'),ENT_QUOTES,$default_charset);
							}else{
								$query = "SELECT groupname FROM vtiger_groups WHERE groupid = ?";
								$groupResults = $adb->pquery($query,array($value));
								$value = html_entity_decode($adb->query_result($groupResults,0,'groupname'),ENT_QUOTES,$default_charset);
							}
						}
						$data['Contacts']['fields'][] =  array('name'=>$field_name,'label'=>$fieldLabel,'value'=>$value);
					}
					$data['Contacts']['isUpdateSupport'] = $moduleModel->isTrackingEnabled();
				}
			}
			
			$module = 'Accounts';
			$cvResult = $adb->pquery("SELECT `cvid` FROM `vtiger_customview` WHERE `entitytype` = 'Accounts' AND `viewname` = 'All'");
			$filterid = $adb->query_result($cvResult,0,'cvid');

			if(!empty($filterid)) {
				$filterOrAlertInstance = CTBrowserExt_WS_FilterModel::modelWithId($module, $filterid);
			}

			$moduleWSId = CTBrowserExt_WS_Utils::getEntityModuleWSId($module);
			$moduleModel = Vtiger_Module_Model::getInstance($module);
			if (($userPrivModel->isAdminUser() ||
							$userPrivModel->hasGlobalReadPermission() ||
							$userPrivModel->hasModulePermission($moduleModel->getId())) && in_array($moduleModel->get('presence'), $presence)) {
				$Fields = $moduleModel->getSummaryViewFieldsList();
				$summaryFields = array_keys($Fields);
				$var =array();
				for($i=0;$i<count($summaryFields);$i++){
					$var[]= $summaryFields[$i];
				}
				$var[]='id';
				$var[] = 'email1';
				$var[] = 'email2';
				$generator = new QueryGenerator($module, $current_user);
				$generator->initForCustomViewById($filterOrAlertInstance->filterid);
			    
				$generator->setFields($var);
				$query3 = $generator->getQuery();
				//$query1 = preg_replace("/SELECT.*FROM(.*)/i", "SELECT $selectColumnClause FROM $1", $query);
				$query3.= " AND ( vtiger_account.email1 = '$email' OR vtiger_account.email2 = '$email' ) ";

				/*$query3 = "SELECT * FROM vtiger_account INNER JOIN vtiger_crmentity ON vtiger_account.accountid = vtiger_crmentity.crmid
							WHERE vtiger_crmentity.deleted = 0 AND ( email1 = ? OR email2 = ?)";*/
				$result3 = $adb->pquery($query3,$filterOrAlertInstance->queryParameters());
				if($adb->num_rows($result3) > 0){
					$accountid = $adb->query_result($result3,0,'accountid');
					$recordModel = Vtiger_Record_Model::getInstanceById($accountid,'Accounts');
					$moduleModel = $recordModel->getModule();
					$fieldModels = $moduleModel->getFields();
					$Fields = $moduleModel->getSummaryViewFieldsList();
					$summaryFields = array_keys($Fields);
					$ws_id = CTBrowserExt_WS_Utils::getEntityModuleWSId('Accounts');
					$data['Accounts']['id'] = $ws_id.'x'.$accountid;
					$record = explode('x',$data['Accounts']['id']);
					$ActionData = $this->getActionData('Accounts',$record);
					foreach ($ActionData as $key => $value) {
						$data['Accounts'][$key] = $value;
					}
					$data['Accounts']['fields'] = array();
					foreach($summaryFields as $key => $field_name){
						$fieldModel = $fieldModels[$field_name];
						$fieldLabel = vtranslate($fieldModel->get('label'),'Accounts');
						$uitype = $fieldModel->get('uitype');
						$value = $recordModel->get($field_name);
						if(in_array($uitype,$refrenceUitypes)){
							if($value == 0){
								$value = "";
							}else{
								$labelresult = $adb->pquery("SELECT label FROM vtiger_crmentity WHERE crmid = ?",array($value));
								$new = decode_html(decode_html($adb->query_result($labelresult,0,'label')));
								$value = $new;
							}
						}else if($uitype == 53){
							$userRecordModel = Vtiger_Record_Model::getInstanceById($value,'Users');
							if(!empty($userRecordModel->get('user_name'))){
								$value = html_entity_decode($userRecordModel->get('first_name').' '.$userRecordModel->get('last_name'),ENT_QUOTES,$default_charset);
							}else{
								$query = "SELECT groupname FROM vtiger_groups WHERE groupid = ?";
								$groupResults = $adb->pquery($query,array($value));
								$value = html_entity_decode($adb->query_result($groupResults,0,'groupname'),ENT_QUOTES,$default_charset);
							}
						}
						$data['Accounts']['fields'][] =  array('name'=>$field_name,'label'=>$fieldLabel,'value'=>$value);
					}
					$data['Accounts']['isUpdateSupport'] = $moduleModel->isTrackingEnabled();
				}
			}
			
			$module = 'Vendors';
			$cvResult = $adb->pquery("SELECT `cvid` FROM `vtiger_customview` WHERE `entitytype` = 'Vendors' AND `viewname` = 'All'");
			$filterid = $adb->query_result($cvResult,0,'cvid');

			if(!empty($filterid)) {
				$filterOrAlertInstance = CTBrowserExt_WS_FilterModel::modelWithId($module, $filterid);
			}

			$moduleWSId = CTBrowserExt_WS_Utils::getEntityModuleWSId($module);
			$moduleModel = Vtiger_Module_Model::getInstance($module);
			if (($userPrivModel->isAdminUser() ||
							$userPrivModel->hasGlobalReadPermission() ||
							$userPrivModel->hasModulePermission($moduleModel->getId())) && in_array($moduleModel->get('presence'), $presence)) {
				$Fields = $moduleModel->getSummaryViewFieldsList();
				$summaryFields = array_keys($Fields);
				$var =array();
				for($i=0;$i<count($summaryFields);$i++){
					$var[]= $summaryFields[$i];
				}
				$var[]='id';
				$var[] = 'email';
				$generator = new QueryGenerator($module, $current_user);
				$generator->initForCustomViewById($filterOrAlertInstance->filterid);
			    
				$generator->setFields($var);
				$query4 = $generator->getQuery();
				//$query1 = preg_replace("/SELECT.*FROM(.*)/i", "SELECT $selectColumnClause FROM $1", $query);
				$query4.= " AND vtiger_vendor.email = '$email'  ";

				/*$query4 = "SELECT * FROM vtiger_vendor INNER JOIN vtiger_crmentity ON vtiger_vendor.vendorid = vtiger_crmentity.crmid
							WHERE vtiger_crmentity.deleted = 0 AND email = ?";*/
				$result4 = $adb->pquery($query4,$filterOrAlertInstance->queryParameters());
				if($adb->num_rows($result4) > 0){
					$vendorid = $adb->query_result($result4,0,'vendorid');
					$recordModel = Vtiger_Record_Model::getInstanceById($vendorid,'Vendors');
					$moduleModel = $recordModel->getModule();
					$fieldModels = $moduleModel->getFields();
					$Fields = $moduleModel->getSummaryViewFieldsList();
					$summaryFields = array_keys($Fields);
					$ws_id = CTBrowserExt_WS_Utils::getEntityModuleWSId('Vendors');
					$data['Vendors']['id'] = $ws_id.'x'.$vendorid;
					$record = explode('x',$data['Vendors']['id']);
					$ActionData = $this->getActionData('Vendors',$record);
					foreach ($ActionData as $key => $value) {
						$data['Vendors'][$key] = $value;
					}
					$data['Vendors']['fields'] = array();
					foreach($summaryFields as $key => $field_name){
						$fieldModel = $fieldModels[$field_name];
						$fieldLabel = vtranslate($fieldModel->get('label'),'Vendors');
						$uitype = $fieldModel->get('uitype');
						$value = $recordModel->get($field_name);
						if(in_array($uitype,$refrenceUitypes)){
							if($value == 0){
								$value = "";
							}else{
								$labelresult = $adb->pquery("SELECT label FROM vtiger_crmentity WHERE crmid = ?",array($value));
								$new = decode_html(decode_html($adb->query_result($labelresult,0,'label')));
								$value = $new;
							}
						}else if($uitype == 53){
							$userRecordModel = Vtiger_Record_Model::getInstanceById($value,'Users');
							if(!empty($userRecordModel->get('user_name'))){
								$value = html_entity_decode($userRecordModel->get('first_name').' '.$userRecordModel->get('last_name'),ENT_QUOTES,$default_charset);
							}else{
								$query = "SELECT groupname FROM vtiger_groups WHERE groupid = ?";
								$groupResults = $adb->pquery($query,array($value));
								$value = html_entity_decode($adb->query_result($groupResults,0,'groupname'),ENT_QUOTES,$default_charset);
							}
						}
						$data['Vendors']['fields'][] =  array('name'=>$field_name,'label'=>$fieldLabel,'value'=>$value);
					}
					$data['Vendors']['isUpdateSupport'] = $moduleModel->isTrackingEnabled();
				}
			}

			if(count($data) > 0){
				$response->setResult($data);
			}else{
				$response->setError('','No Records Found');
			}
			
		}else{
			throw new WebServiceException(404,"Required field is missing");	
		}
		return $response;
	}

	public function getActionData($module,$record){
		global $site_URL;
		$moduleModel = Vtiger_Module_Model::getInstance($module); 
		$recordModel = Vtiger_Record_Model::getInstanceById($record[1],$module);
		$editAction = Users_Privileges_Model::isPermitted($module, 'EditView', $record[1]);
		if($moduleModel->isSummaryViewSupported()) {
			$isSummarySupported = true;
			$summaryLinkurl = $site_URL.$recordModel->getDetailViewUrl().'&mode=showDetailViewByMode&requestMode=summary';
		}else{
			$isSummarySupported = false;
			$summaryLinkurl = $site_URL.$recordModel->getDetailViewUrl();
		}
		$modCommentsModel = Vtiger_Module_Model::getInstance('ModComments');
		if($moduleModel->isCommentEnabled() && $modCommentsModel->isPermitted('DetailView')){
			$CommentDetailPermission = true;
		}else{
			$CommentDetailPermission = false;
		}
		if($moduleModel->isCommentEnabled() && $modCommentsModel->isPermitted('CreateView')){
			$CommentCreatePermission = true;
		}else{
			$CommentCreatePermission = false;
		}
	   	$recordlist = array('module'=>$module,'id'=>$record[0].'x'.$record[1],'isSummarySupported'=>$isSummarySupported,'summaryLinkurl'=>$summaryLinkurl,'isEditSupported'=>$editAction,'CommentCreatePermission'=>$CommentCreatePermission,'CommentDetailPermission'=>$CommentDetailPermission);
	   	return $recordlist;
	}
}
