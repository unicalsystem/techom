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

class CTBrowserExt_WS_DependencyAddress extends CTBrowserExt_WS_FetchRecord{
	
	function process(CTBrowserExt_API_Request $request) {
		global $current_user;
		$current_user = $this->getActiveUser();
		$sourceModule = trim($request->get('module'));
		$relatedModule = trim($request->get('relatedModule'));
		$recordId = trim($request->get('record'));
		if($sourceModule && $recordId && $relatedModule){
		   	$response = new CTBrowserExt_API_Response();
			if($sourceModule == 'Contacts' && $relatedModule == 'Accounts'){
				$recordModel = Vtiger_Record_Model::getInstanceById($recordId,$relatedModule);
				$data = $recordModel->getData();
				$result=array(array('name' =>'mailingstreet',
							  'value'=>$data['bill_street']),
							  array('name' =>'otherstreet',
							  'value'=>$data['ship_street']),
							  array('name' =>'mailingcity',
							  'value'=>$data['bill_city']),
							  array('name' =>'othercity',
							  'value'=>$data['ship_city']),
							  array('name' =>'mailingstate',
							  'value'=>$data['bill_state']),
							  array('name' =>'otherstate',
							  'value'=>$data['ship_state']),
							  array('name' =>'mailingzip',
							  'value'=>$data['bill_code']),
							  array('name' =>'otherzip',
							  'value'=>$data['ship_code']),
							  array('name' =>'mailingcountry',
							  'value'=>$data['bill_country']),
							  array('name' =>'othercountry',
							  'value'=>$data['ship_country']),
							  array('name' =>'mailingpobox',
							  'value'=>$data['bill_pobox']),
							  array('name' =>'otherpobox',
							  'value'=>$data['ship_pobox']));
				$response->setResult(array('success'=>true, 'data'=>$result));
				return $response;
			}else if(($sourceModule == 'Sales Order' || $sourceModule == 'Quotes' || $sourceModule == 'Purchase Order' || $sourceModule == 'Invoice') && $relatedModule == 'Accounts' ){
				$recordModel = Vtiger_Record_Model::getInstanceById($recordId,$relatedModule);
				$data = $recordModel->getData();
				$result=array(array('name' =>'bill_street',
							  'value'=>$data['bill_street']),
							  array('name' =>'ship_street',
							  'value'=>$data['ship_street']),
							  array('name' =>'bill_city',
							  'value'=>$data['bill_city']),
							  array('name' =>'ship_city',
							  'value'=>$data['ship_city']),
							  array('name' =>'bill_state',
							  'value'=>$data['bill_state']),
							  array('name' =>'ship_state',
							  'value'=>$data['ship_state']),
							  array('name' =>'bill_code',
							  'value'=>$data['bill_code']),
							  array('name' =>'ship_code',
							  'value'=>$data['ship_code']),
							  array('name' =>'bill_country',
							  'value'=>$data['bill_country']),
							  array('name' =>'ship_country',
							  'value'=>$data['ship_country']),
							  array('name' =>'bill_pobox',
							  'value'=>$data['bill_pobox']),
							  array('name' =>'ship_pobox',
							  'value'=>$data['ship_pobox']));
				$response->setResult(array('success'=>true, 'data'=>$result));
				return $response;
			}else if(($sourceModule == 'Sales Order' || $sourceModule == 'Quotes' || $sourceModule == 'Purchase Order' || $sourceModule == 'Invoice') && $relatedModule == 'Contacts'){
				$recordModel = Vtiger_Record_Model::getInstanceById($recordId,$relatedModule);
				$data = $recordModel->getData();
				$result=array(array('name' =>'bill_street',
							  'value'=>$data['mailingstreet']),
							  array('name' =>'ship_street',
							  'value'=>$data['otherstreet']),
							  array('name' =>'bill_city',
							  'value'=>$data['mailingcity']),
							  array('name' =>'ship_city',
							  'value'=>$data['othercity']),
							  array('name' =>'bill_state',
							  'value'=>$data['mailingstate']),
							  array('name' =>'ship_state',
							  'value'=>$data['otherstate']),
							  array('name' =>'bill_code',
							  'value'=>$data['mailingzip']),
							  array('name' =>'ship_code',
							  'value'=>$data['otherzip']),
							  array('name' =>'bill_country',
							  'value'=>$data['mailingcountry']),
							  array('name' =>'ship_country',
							  'value'=>$data['othercountry']),
							  array('name' =>'bill_pobox',
							  'value'=>$data['mailingpobox']),
							  array('name' =>'ship_pobox',
							  'value'=>$data['otherpobox']));
				$response->setResult(array('success'=>true, 'data'=>$result));
				return $response;
			}else if($sourceModule == 'Purchase Order' && $relatedModule == 'Vendors'){
				$recordModel = Vtiger_Record_Model::getInstanceById($recordId,$relatedModule);
				$data = $recordModel->getData();
				$result=array(array('name' =>'bill_street',
							  'value'=>$data['street']),
							  array('name' =>'ship_street',
							  'value'=>$data['street']),
							  array('name' =>'bill_city',
							  'value'=>$data['city']),
							  array('name' =>'ship_city',
							  'value'=>$data['city']),
							  array('name' =>'bill_state',
							  'value'=>$data['state']),
							  array('name' =>'ship_state',
							  'value'=>$data['state']),
							  array('name' =>'bill_code',
							  'value'=>$data['postalcode']),
							  array('name' =>'ship_code',
							  'value'=>$data['postalcode']),
							  array('name' =>'bill_country',
							  'value'=>$data['country']),
							  array('name' =>'ship_country',
							  'value'=>$data['country']),
							  array('name' =>'bill_pobox',
							  'value'=>$data['pobox']),
							  array('name' =>'ship_pobox',
							  'value'=>$data['pobox']));
				$response->setResult(array('data'=>$result,'message'=>''));
				return $response;
			}else{
				$message = vtranslate('No Dependency Found For This Module','CTBrowserExt');
	   			$response->setResult(array('data'=>'','message'=>$message));
				return $response;
			}
		   
		}else{
			$message = vtranslate('Required fields not found','CTBrowserExt');
			throw new WebServiceException(404,$message);
		}
	}
	
}
