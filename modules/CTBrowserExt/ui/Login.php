<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

include_once dirname(__FILE__) . '/../api/ws/Login.php';

class CTBrowserExt_UI_Login  extends CTBrowserExt_WS_Login {
	
	function process(CTBrowserExt_API_Request $request) {
		$viewer = new CTBrowserExt_UI_Viewer();
		return $viewer->process('generic/Login.tpl');
	}

}
