<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

class CTBrowserExt_WS_ChromeModulesPermission extends CTBrowserExt_WS_Controller {

	function process(CTBrowserExt_API_Request $request) {
		global $current_user,$adb, $site_URL;
		$current_user = $this->getActiveUser();
		$menuModelsList = Vtiger_Menu_Model::getAll(true);
		$presence = array('0', '2');
		$userPrivModel = Users_Privileges_Model::getInstanceById($current_user->id);
		$allowedModules = array('Contacts','Leads','Accounts','Vendors');
		$Modules = array();
		foreach($menuModelsList as $moduleName => $moduleModel){
			if(in_array($moduleName,$allowedModules)){
				if (($userPrivModel->isAdminUser() ||
							$userPrivModel->hasGlobalReadPermission() ||
							$userPrivModel->hasModulePermission($moduleModel->getId())) && in_array($moduleModel->get('presence'), $presence)) {
					$editAction = $userPrivModel->hasModuleActionPermission($moduleModel->getId(), 'EditView');
					$createAction = $userPrivModel->hasModuleActionPermission($moduleModel->getId(), 'CreateView');
					$Modules[] = array(
						'id'=> $moduleModel->get('id'),
						'name' => trim($moduleModel->get('name')),
						'isEntity' => $moduleModel->get('isentitytype'),
						'label' => vtranslate($moduleModel->get('label'),$module),
						'singular' => vtranslate($moduleModel->get('name'),$module),
						'img_url' => $this->getImageURL($moduleModel->get('name')),
						'createAction' => $createAction,
						'editAction' => $editAction,
						);
				}
			}
		}
		$response = new CTBrowserExt_API_Response();
		$response->setResult($Modules);
		return $response;
	}

	function getImageURL($modulename) {
		global $adb,$site_URL;
		$img_url = '';	
		$filename = 'modules/CTBrowserExt/MobileIcon/'.$modulename.'.png';
		
		if (file_exists($filename)) {
			$img_url = $site_URL.'modules/CTBrowserExt/MobileIcon/'.$modulename.'.png';
		}	
		return $img_url;	
	}
}