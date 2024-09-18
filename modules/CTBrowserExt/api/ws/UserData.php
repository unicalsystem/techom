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

class CTBrowserExt_WS_UserData extends CTBrowserExt_WS_Controller {
	
	
	function getSearchFilterModel($module, $search) {
		return CTBrowserExt_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(CTBrowserExt_API_Request $request) {
		$page = $request->get('page', 0);
		return CTBrowserExt_WS_PagingModel::modelWithPageStart($page);
	}
	
	function process(CTBrowserExt_API_Request $request) {
		global $current_user,$adb, $site_URL;
		$default_charset = VTWS_PreserveGlobal::getGlobal('default_charset');
		$userId = trim($request->get('userid'));

		$AttachmentQuery = $adb->pquery("select vtiger_attachments.attachmentsid, vtiger_attachments.name, vtiger_attachments.storedname, vtiger_attachments.path FROM vtiger_salesmanattachmentsrel
											INNER JOIN vtiger_attachments ON vtiger_salesmanattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid
											LEFT JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_salesmanattachmentsrel.smid
											WHERE vtiger_salesmanattachmentsrel.smid = ?", array($userId));
											
		$AttachmentQueryCount = $adb->num_rows($AttachmentQuery);
		$response = new CTBrowserExt_API_Response();

		$userRecordModel = Vtiger_Record_Model::getInstanceById($userId, 'Users');
		$first_name = $userRecordModel->get('first_name');
		$first_name = html_entity_decode($first_name, ENT_QUOTES, $default_charset);
		$last_name = $userRecordModel->get('last_name');
		$last_name = html_entity_decode($last_name, ENT_QUOTES, $default_charset);
		$email = $userRecordModel->get('email1');
		$phoneWork = $userRecordModel->get('phone_work');
		$phoneNumber = $userRecordModel->get('phone_mobile');
		$phoneHome = $userRecordModel->get('phone_home');
		$myPreference =  $site_URL.'index.php?module=Users&view=PreferenceDetail&parent=Settings&record='.$userId;

		if($AttachmentQueryCount > 0) {
			$storedname = $adb->query_result($AttachmentQuery, 0, 'storedname');
			$name = $adb->query_result($AttachmentQuery, 0, 'name');
			$path = $adb->query_result($AttachmentQuery, 0, 'path');
			$attachmentsId = $adb->query_result($AttachmentQuery, 0, 'attachmentsid');
			$url = \Vtiger_Functions::getFilePublicURL($attachmentsId, $name);
			$userImage = $site_URL.$path.$attachmentsId."_".$storedname;

			//$userImage = $site_URL.$url;
			
			$userData = array('userImage'=>$userImage, 'email' => $email, 'userName' => $first_name." ".$last_name, 'firstName' => $first_name, 'lastName' => $last_name, 'phoneWork' => $phoneWork, 'phoneNumber' => $phoneNumber, 'phoneHome' => $phoneHome, 'myPreference' => $myPreference);
			$response->setResult($userData);
		}else{
			$userData = array('userImage'=>"", 'email' => $email, 'userName' => $first_name." ".$last_name, 'firstName' => $first_name, 'lastName' => $last_name, 'phoneWork' => $phoneWork, 'phoneNumber' => $phoneNumber, 'phoneHome' => $phoneHome, 'myPreference' => $myPreference);
			$response->setResult($userData);
		}
		return $response;
	}
}
