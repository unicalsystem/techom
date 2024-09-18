<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */

class CTBrowserExt_WS_RelatedModuleList extends CTBrowserExt_WS_Controller {
	
	function getSearchFilterModel($module, $search) {
		return CTBrowserExt_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(CTBrowserExt_API_Request $request) {
		$page = $request->get('page', 0);
		return CTBrowserExt_WS_PagingModel::modelWithPageStart($page);
	}
	
	function process(CTBrowserExt_API_Request $request) {
		$default_charset = VTWS_PreserveGlobal::getGlobal('default_charset');
		global $adb,$site_URL,$current_user;
		$current_user = $this->getActiveUser();
		$sourcemoduleName = trim($request->get('module'));
		$recordid = trim($request->get('record'));
		$tablabel = trim($request->get('tablabel'));
		$index = trim($request->get('index'));
		$size = trim($request->get('size'));
		if($index == '' && $size == ''){
			$index = 1;
			$size = 3;
		}
		$limit = ($index*$size) - $size;
		$record = explode('x', $recordid); 
		$relatedModuleName = trim($request->get('relatedmodule'));
		
		if(!getTabid($sourcemoduleName)){
			throw new WebServiceException(404,'"'.$sourcemoduleName.'" Module does not exists');
		}
		if(!getTabid($relatedModuleName)){
			throw new WebServiceException(404,'"'.$relatedModuleName.'" Module does not exists');
		}
		
		//get source module tabid
		$sql1 = "select tabid,name,tablabel from vtiger_tab where name='".$sourcemoduleName."'";
		$result1 = $adb->pquery($sql1,array()); 
		$sourcemoduletabid =$adb->query_result($result1,0,'tabid');

		//get Related Module tabid
		$sql3 = "select tabid,name from vtiger_tab where name='".$relatedModuleName."'";
		$result3 = $adb->pquery($sql3,array());
		$relatedmoduletabid =$adb->query_result($result3,0,'tabid');

		//get entity table id
		$sql4 = "select id,name from vtiger_ws_entity where name='".$relatedModuleName."'";
		$result4 = $adb->pquery($sql4,array());
		$relatedmoduleentitytabid =$adb->query_result($result4,0,'id');


		$sqltabname = "select tablename,fieldname from vtiger_entityname where tabid = '".$relatedmoduletabid."'";
		$resulttabname = $adb->pquery($sqltabname,array());
		$entityField = $adb->query_result($resulttabname,0,'fieldname');
		$tablename = $adb->query_result($resulttabname,0,'tablename');
		$tablexplode = explode("_",$tablename);	 
		
		$entityField_array = explode(',',$entityField);
		$entityField = $entityField_array[0];
		
		
		$entityQuery11 = $adb->pquery("SELECT * FROM vtiger_field WHERE columnname = ? and tabid= ?",array($entityField,$relatedmoduletabid));
		$fieldlabel = $adb->query_result($entityQuery11,0,'fieldlabel');
		$fieldlabel = vtranslate($fieldlabel,$relatedModuleName); 
		
		//get fieldname
		$sql4 = "select fieldlabel, columnname,fieldname,tablename, uitype from vtiger_field where tabid='".$relatedmoduletabid."' AND presence IN (0,2)";
		$result4 = $adb->pquery($sql4,array());
		$numofrows1 = $adb->num_rows($result4);
		
		
		
		$fieldtabmerge2 = '';
		$relatedfield = '';
		for ($j=0; $j < $numofrows1; $j++){
			$relatedfieldarray12 = array();
			$relatedfieldname =$adb->query_result($result4,$j,'columnname');
			if($relatedModuleName == 'Emails'){
				$relatedfieldname =$adb->query_result($result4,$j,'fieldname');	
			}
			$relatedfieldlabel = $adb->query_result($result4, $j,'fieldlabel');
			$relatedfieldtabname =$adb->query_result($result4,$j,'tablename');
			$relatedfielduitype =$adb->query_result($result4,$j,'uitype');
			$relatedfieldarray1[$relatedfieldname]['label'] =  strip_tags($relatedfieldlabel);
			$relatedfieldarray1[$relatedfieldname]['uitype'] =  $relatedfielduitype;
			$relatedfieldarray12 = $relatedfieldarray1;
			$relatedfieldnamelist[$j] = $relatedfieldname;
			//array_push($relatedfieldarray12['crmid'], "crmid");
			array_push($relatedfieldnamelist, "crmid");
			
			$relatedfieldarray =  $relatedfieldname;
			$fieldtabmerge = $relatedfieldtabname.'.'.$relatedfieldarray; 
			if ($fieldtabmerge2 == '') {
				$fieldtabmerge2 .= $fieldtabmerge.',vtiger_crmentity.crmid';	
			}else{
				$fieldtabmerge2 .= ','.$fieldtabmerge;	
			}
			$fieldtabmerge1 = $fieldtabmerge2;	
		}

		$innerjoin .= $tablename.' INNER JOIN vtiger_crmentity on vtiger_crmentity.crmid='.$tablename.".".$tablexplode[1].id. " where ".$tablename.'.'.$tablexplode[1].id ;
		 
		//Campare to sourcemodule and relatedmodule
		$comparetabidsql = "SELECT relation_id,name,label FROM vtiger_relatedlists where tabid = '".$sourcemoduletabid."' AND related_tabid = '".$relatedmoduletabid."' AND name != 'get_history'";
		$getfunctionres = $adb->pquery($comparetabidsql,array());
		$relatedfunctionname = array();
		foreach($getfunctionres as $gval){
			$relatedfunctionname = $gval['name'];
			$relation_id = $gval['relation_id'];
			$relation_label = $gval['label'];
		}
		global $currentModule;
		$currentModule = $sourcemoduleName;
		if($tablabel){
			$relation_label = $tablabel;
		}
		$parentRecordModel = Vtiger_Record_Model::getInstanceById($record[1], $sourcemoduleName);
		$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relatedModuleName, $relation_label);
		$query = $relationListView->getRelationQuery();
		if($relatedModuleName == 'Emails'){
			$query.=" ORDER BY str_to_date(concat(vtiger_activity.date_start,vtiger_activity.time_start),'%Y-%m-%d %H:%i:%s') DESC ";
		}
		if(!empty($index) && !empty($size)){
			$query .= sprintf(" LIMIT %s, %s", $limit, $size);
		}
		
		$getfunctionres = $adb->pquery($query,array());
		$numofrows2 = $adb->num_rows($getfunctionres);

		$moduleModel = Vtiger_Module_Model::getInstance($relatedModuleName);
		$fieldModels = $moduleModel->getFields();
		if($relatedModuleName == 'Calendar'){
			$getSummaryViewFieldsList = $moduleModel->getRelatedListFields();
		}else{
			$getSummaryViewFieldsList = $moduleModel->getSummaryViewFieldsList();
		}
		$summaryfields = array_keys($getSummaryViewFieldsList);
		
		if($relatedModuleName == 'Emails'){
			$newArrayFieldsEmails = array();
			$headerFieldNames = $moduleModel->getRelatedListFields();
			$summaryfields = array_keys($headerFieldNames);
			foreach ($summaryfields as $key => $fieldname) {
				if($fieldname == 'email_track' || $fieldname == 'crmentity'){
					continue;
				}
				$newArrayFieldsEmails[$fieldname] = $relatedfieldarray12[$fieldname];
			}
			$relatedfieldarray12 = $newArrayFieldsEmails;
		}
		$fetchrecord = array();

		for ($k=0; $k < $numofrows2; $k++) { 
			$count = 0;
			foreach($relatedfieldarray12 as $fieldnamekey => $fieldValue) {
				if($fieldnamekey == 'assigned_user_id') continue;

				$crmid =$adb->query_result($getfunctionres,$k,'crmid');
				if($fieldnamekey == 'crmid'){
					continue;
				}
				$relatedfetchrecord =$adb->query_result($getfunctionres,$k,$fieldnamekey);
				$fetchrecord[$k]['list'][$count]['fieldname'] = $fieldnamekey;
				$fetchrecord[$k]['list'][$count]['fieldlabel'] = vtranslate($relatedfieldarray12[$fieldnamekey]['label'], $relatedModuleName, $current_user->language);
				$uitype = $relatedfieldarray12[$fieldnamekey]['uitype'];

				if($fieldnamekey == 'smownerid'){
					$fetchrecord[$k]['list'][$count]['fieldlabel'] = vtranslate($relatedfieldarray12[$fieldnamekey]['label'], $relatedModuleName, $current_user->language);
					$fetchrecord[$k]['list'][$count]['value'] = "";
					$fieldnamekey = 'assigned_user_id';
				}
				if(!in_array($fieldnamekey,$summaryfields) && $fieldnamekey != 'crmid'){
					unset($fetchrecord[$k]['list'][$count]);
					continue;
				}
				
				if($uitype == 10) {
					$getRelatedFieldValueQuery = $adb->pquery("SELECT label from vtiger_crmentity where crmid = ? and deleted = 0", array($relatedfetchrecord));
					$relatedFieldValue = $adb->query_result($getRelatedFieldValueQuery, 0, 'label');
					$relatedFieldValue = html_entity_decode($relatedFieldValue, ENT_QUOTES, $default_charset); 
					$fetchrecord[$k]['list'][$count]['value'] = $relatedFieldValue;
					
					if($fieldnamekey == 'contact_relation' && $relatedModuleName == 'CaseRelation') {
						$AttachmentQuery =$adb->pquery("select vtiger_attachments.attachmentsid, vtiger_attachments.name, vtiger_attachments.subject, vtiger_attachments.path FROM vtiger_seattachmentsrel
											INNER JOIN vtiger_attachments ON vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid  
											WHERE vtiger_seattachmentsrel.crmid = ?", array($relatedfetchrecord));
											
						$AttachmentQueryCount = $adb->num_rows($AttachmentQuery);
						$document_path = array();
						
						if($AttachmentQueryCount > 0) {
							$name = $adb->query_result($AttachmentQuery, 0, 'name');
							$Path = $adb->query_result($AttachmentQuery, 0, 'path');
							$attachmentsId = $adb->query_result($AttachmentQuery, 0, 'attachmentsid');
							if($name != ''){
								$imagepath = $site_URL.$Path.$attachmentsId."_".$name;
							}else{
								$imagepath = '';
							}
							$fetchrecord[$k]['list'][$count]['url'] = $imagepath;
						} else {
							$fetchrecord[$k]['list'][$count]['url'] = '';
						}
						
					}
				} else if($uitype == 53) {
					$getAssignedUserNameQuery = $adb->pquery("SELECT first_name, last_name from vtiger_users where id = ?", array($relatedfetchrecord));
					$first_name = $adb->query_result($getAssignedUserNameQuery, 0, 'first_name');
					$last_name = $adb->query_result($getAssignedUserNameQuery, 0, 'last_name');
					$assigned_user_name = $first_name." ".$last_name;
					$assigned_user_name = html_entity_decode($assigned_user_name, ENT_QUOTES, $default_charset);
					$fetchrecord[$k]['list'][$count]['value'] = $assigned_user_name; 
				}else {
					if($relatedModuleName != 'PBXManager'){
						$recordModel = Vtiger_Record_Model::getInstanceById($crmid,$relatedModuleName);
						
						if($uitype != 53 && $uitype != 13 && $uitype != 17 && !in_array($uitype,$refrenceUitypes)){
							$fieldModel = $fieldModels[$fieldnamekey];
							if(!empty($fieldModel)){
								$relatedfetchrecord = $fieldModel->getDisplayValue($relatedfetchrecord, $crmid, $recordModel);
							}
						}
						
						$fetchrecord[$k]['list'][$count]['value'] = $relatedfetchrecord;
						if($crmid != '' && $relatedModuleName == 'Documents' && $fieldnamekey == 'filename') {
							$AttachmentQuery =$adb->pquery("select vtiger_attachments.attachmentsid, vtiger_attachments.name, vtiger_attachments.subject, vtiger_attachments.path FROM vtiger_seattachmentsrel
												INNER JOIN vtiger_attachments ON vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid 
												LEFT JOIN vtiger_notes ON vtiger_notes.notesid = vtiger_seattachmentsrel.crmid 
												WHERE vtiger_seattachmentsrel.crmid = ?", array($crmid));
												
							$AttachmentQueryCount = $adb->num_rows($AttachmentQuery);
							$document_path = array();
							
							if($AttachmentQueryCount > 0) {
								for($l=0;$l<$AttachmentQueryCount;$l++) {
									$name = $adb->query_result($AttachmentQuery, $l, 'name');
									$Path = $adb->query_result($AttachmentQuery, $l, 'path');
									$attachmentsId = $adb->query_result($AttachmentQuery, $l, 'attachmentsid');
									if($name != ''){
										$imagepath = $site_URL.$Path.$attachmentsId."_".$name;
									}else{
										$imagepath = '';
									}
									$document_path[] = array('doc_url'.$l=>$imagepath, 'file_name'.$l=>$name);
								} 
							} 
							$fetchrecord[$k]['list'][$count]['value'] = $name;
							$fetchrecord[$k]['list'][$count]['url'] = $document_path;
						}
					}else{
						$fetchrecord[$k]['list'][$count]['value'] = $relatedfetchrecord;
					}
					
				}

				if($relatedModuleName == 'Emails'){
					$recordModel = Vtiger_Record_Model::getInstanceById($crmid,$relatedModuleName);
					if($fieldnamekey == 'email_flag' || $fieldnamekey == 'saved_toid'){
						$fetchrecord[$k]['list'][$count]['value'] = decode_html($recordModel->get($fieldnamekey));
					}
				}
				$count++;
				//unset($fetchrecord[$k]['list']['crmid']);
			}

			$fetchrecord[$k]['detailViewUrl'] = $site_URL.$moduleModel->getDetailViewUrl($crmid);
		}

		if ($fetchrecord == '') {
			$allrelatedid =  array('relatedtabid' => $relatedmoduleentitytabid,'relatedModuleName'=>$relatedModuleName,'relatedfieldnameList'=>$relatedfieldnamelist,'fetchrecord'=>array(),'message'=>vtranslate('LBL_NO_RECORDS_FOUND','Vtiger'));
		}else{

			$allrelatedid =  array('relatedtabid' => $relatedmoduleentitytabid,'relatedModuleName'=>$relatedModuleName,'relatedfieldnameList'=>$relatedfieldnamelist,'fetchrecord'=>$fetchrecord);
		}
	
		$response = new CTBrowserExt_API_Response();
		$response->setResult($allrelatedid);
		return $response;
	}		
}
