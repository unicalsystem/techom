/*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ******************************************************************************/
  
Vtiger_List_Js("CTGoogleOffice365SuiteLog_List_Js", {
	triggerMassEdit: function(massEditUrl) {
		Vtiger_List_Js.triggerMassAction(massEditUrl);
	}
}, {

	registerRowDoubleClickEvent: function () {
		return true;
	},
	registerEvents: function() {
		this._super();
	}
});