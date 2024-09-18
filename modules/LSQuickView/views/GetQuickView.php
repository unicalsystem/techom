<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * Portions created by Libertus Solutions are Copyright (C) Libertus Solutions.
 * All Rights Reserved.
 *************************************************************************************/

class LSQuickView_GetQuickView_View extends Vtiger_PopupAjax_View {

	function process (Vtiger_Request $request) {
	    global $log;
		$viewer = $this->getViewer($request);
		$moduleName = $request->get('src_module');

		$this->initializeListViewContents($request, $viewer);

		echo $viewer->view('QuickViewContents.tpl', 'LSQuickView', true);
	}
	
	public function initializeListViewContents(Vtiger_Request $request, Vtiger_Viewer $viewer) {
	    global $log;
		$moduleName = $request->get('src_module');
		
		$recordId = $request->get('recordid');
		$tooltipViewModel = Vtiger_TooltipView_Model::getInstance($moduleName, $recordId);

		$viewer->assign('MODULE', $moduleName);

		$viewer->assign('MODULE_MODEL', $tooltipViewModel->getRecord()->getModule());
		
		$viewer->assign('TOOLTIP_FIELDS', $tooltipViewModel->getFields());
		
		$viewer->assign('RECORD', $tooltipViewModel->getRecord());
		$viewer->assign('RECORD_STRUCTURE', $tooltipViewModel->getStructure());

		$viewer->assign('USER_MODEL', Users_Record_Model::getCurrentUserModel());
	}
	
}

