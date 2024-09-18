<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once dirname(__FILE__) . '/../../api/ws/models/SearchFilter.php';

class CTBrowserExt_UI_SearchFilterModel extends CTBrowserExt_WS_SearchFilterModel {
	
	function prepareWhereClause($fieldnames = false) {
		$whereClause = '';
		
		$searchString = $this->criterias['search'];
		$fieldnames = (isset($this->criterias['fieldnames']))? $this->criterias['fieldnames'] : false;
		
		include_once 'include/Webservices/DescribeObject.php';
		$describeInfo = vtws_describe($this->moduleName, $this->getUser());
		
		$fieldinfos = array();
		if ($fieldnames === false) {
			foreach($describeInfo['fields'] as $fieldinfo) {
				$fieldmodel = new CTBrowserExt_UI_FieldModel();
				$fieldmodel->initData($fieldinfo);
				
				if (!$fieldmodel->isReferenceType()) {
					$fieldinfos[$fieldinfo['name']] = $fieldmodel;
				}
			}
			
		} else {
			foreach($describeInfo['fields'] as $fieldinfo) {
				if(in_array($fieldinfo['name'], $fieldnames)) {
					$fieldmodel = new CTBrowserExt_UI_FieldModel();
					$fieldmodel->initData($fieldinfo);
				
					if (!$fieldmodel->isReferenceType()) {
						$fieldinfos[$fieldinfo['name']] = $fieldmodel;
					}
				}
			}
		}
		
		if(isset($fieldinfos['id'])) unset($fieldinfos['id']);
		if(!empty($fieldinfos)) {
			$fieldinfos['_'] = ''; // Hack to build the where clause at once
			$whereClause = sprintf("WHERE %s", implode(" LIKE '%{$searchString}%' OR ", array_keys($fieldinfos)));
			$whereClause = rtrim($whereClause, 'OR _');
		}
		
		return $whereClause;
	}
	
	function execute($fieldnames, $pagingModel = false) {
		$selectClause = sprintf("SELECT %s", implode(',', $fieldnames));
		$fromClause = sprintf("FROM %s", $this->moduleName);
		$whereClause = $this->prepareWhereClause(false);
		$orderClause = "";
		$groupClause = "";
		$limitClause = $pagingModel? " LIMIT {$pagingModel->currentCount()},{$pagingModel->limit()}" : "" ;
				
		$query = sprintf("%s %s %s %s %s %s;", $selectClause, $fromClause, $whereClause, $orderClause, $groupClause, $limitClause);
		return vtws_query($query, $this->getUser()); 
	}

	static function modelWithCriterias($moduleName, $criterias = false) {
		$model = new CTBrowserExt_UI_SearchFilterModel($moduleName);
		$model->setCriterias($criterias);
		return $model;
	}
}
