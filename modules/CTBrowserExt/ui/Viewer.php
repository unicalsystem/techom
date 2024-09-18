<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

include_once 'includes/runtime/Viewer.php';

class CTBrowserExt_UI_Viewer extends Vtiger_Viewer{

	private $parameters = array();
	function assign($key, $value) {
		$this->parameters[$key] = $value;
	}

	function viewController() {
		$smarty = new Vtiger_Viewer();

		foreach($this->parameters as $k => $v) {
			$smarty->assign($k, $v);
		}

		$smarty->assign("IS_SAFARI", CTBrowserExt::isSafari());
		$smarty->assign("SKIN", CTBrowserExt::config('Default.Skin'));
		return $smarty;
	}

	function process($templateName) {
		$smarty = $this->viewController();
		$response = new CTBrowserExt_API_Response();
		$response->setResult($smarty->fetch(vtlib_getModuleTemplate('Mobile', $templateName)));
		return $response;
	}

}
