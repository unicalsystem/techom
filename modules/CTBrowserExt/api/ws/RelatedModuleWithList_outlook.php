<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
//include_once dirname(__FILE__) . '/models/Alert.php';

//include_once 'include/data/CRMEntity.php';

class CTBrowserExt_WS_RelatedModuleWithList_outlook extends CTBrowserExt_WS_Controller {
	
	
	function getSearchFilterModel($module, $search) {
		return CTBrowserExt_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(CTBrowserExt_API_Request $request) {
		$page = $request->get('page', 0);
		return CTBrowserExt_WS_PagingModel::modelWithPageStart($page);
	}
	
	function process(CTBrowserExt_API_Request $request) {
		$refrenceUitypes = array(10,51,57,58,59,66,73,75,76,78,80,81,101);
		$default_charset = VTWS_PreserveGlobal::getGlobal('default_charset');
		global $adb,$site_URL,$current_user;
		$current_user = $this->getActiveUser();
		$record = trim($request->get('record'));
		$view = $request->get('view');
		$moduleName = trim($request->get('module'));
		$recordid = explode('x', $record);
		$sql1 = "select tabid,name,tablabel from vtiger_tab where name='".$moduleName."'";
		$result1 = $adb->pquery($sql1,array()); 
		$matchtabid =$adb->query_result($result1,0,'tabid');
	
		$sql = "select related_tabid,tabid,name,label, actions from vtiger_relatedlists where tabid ='".$matchtabid."' and presence = 0 ";
		$result = $adb->pquery($sql,array());
		$numofrows = $adb->num_rows($result);
		$relatedid = array();
		$userPrivModel = Users_Privileges_Model::getInstanceById($current_user->id);
		for($i = 0; $i < $numofrows; $i++) {
			$tabid = $adb->query_result($result,$i,'tabid');
			$related_tabid = $adb->query_result($result,$i,'related_tabid');
			$relatedModuleName = getTabid($related_tabid);
			$relatedmodulelabel = $adb->query_result($result,$i,'label');
			$actions = $adb->query_result($result,$i,'actions');	
			$sql2 = "select name from  vtiger_tab where tabid ='".$related_tabid."'"; 
			$result2 = $adb->pquery($sql2,array()); 
			$relatedmoduleName =$adb->query_result($result2,0,'name');
			$getfunctionsql = "SELECT relation_id,name,label,relationfieldid FROM vtiger_relatedlists where tabid = '$matchtabid' AND related_tabid = '$related_tabid' AND name != 'get_history'";
			$getfunctionres = $adb->query($getfunctionsql);
			$relatedfunctionname = '';
			foreach($getfunctionres as $gval){
				$relatedfunctionname = $gval['name'];
				$relation_id = $gval['relation_id'];
				$relation_label =  $gval['label'];
				$relationfieldid = $gval['relationfieldid'];
			}
			$relatedFieldname = "";
			if($relationfieldid != 0){
				$relatedFieldQuery = $adb->pquery('SELECT fieldname FROM vtiger_field WHERE fieldid = ?',array($relationfieldid));
				$relatedFieldname = $adb->query_result($relatedFieldQuery,0,'fieldname');
			}
			$PresenseQuery = "SELECT * FROM  `vtiger_tab`  WHERE `tabid`='".$related_tabid."'";
			$PresenseResult = $adb->pquery($PresenseQuery,array());
			$visible = $adb->query_result($PresenseResult,0,'presence');
			if($visible != 0){
				continue;
			}
			if($relatedmoduleName && $relatedmoduleName != 'ModComments' && $relatedmodulelabel != 'Activities'){
				$moduleModel = Vtiger_Module_Model::getInstance($relatedmoduleName);
				$createAction = $userPrivModel->hasModuleActionPermission($moduleModel->getId(), 'EditView');
			}else{
				continue;
			}
			$QuickCreateAction = $moduleModel->isQuickCreateSupported();
			
			$sqltabname = "select tablename,fieldname from vtiger_entityname where tabid = '".$related_tabid."'";
			$resulttabname = $adb->pquery($sqltabname,array());
			$entityField = $adb->query_result($resulttabname,0,'fieldname');
			$tablename = $adb->query_result($resulttabname,0,'tablename');
			$tablexplode = explode("_",$tablename);	 
		
			$entityField_array = explode(',',$entityField);
			$entityField = $entityField_array[0];
			
			$entityQuery11 = $adb->pquery("SELECT * FROM vtiger_field WHERE columnname = ? and tabid= ?",array($entityField,$related_tabid));
			$fieldlabel = $adb->query_result($entityQuery11,0,'fieldlabel');
			$fieldlabel = vtranslate($fieldlabel,$relatedModuleName);
		
			//get fieldname
			$sql4 = "select fieldlabel, columnname,fieldname,tablename, uitype from vtiger_field where tabid='".$related_tabid."' AND presence IN (0,2)";
			$result4 = $adb->pquery($sql4,array());
			$numofrows1 = $adb->num_rows($result4);
			
			$fieldtabmerge2 = '';
			$relatedfield = '';
			for ($j=0; $j < $numofrows1; $j++){
				$relatedfieldarray12 = array();
				$relatedfieldname =$adb->query_result($result4,$j,'columnname');
				if($relatedmoduleName == 'Emails'){
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


			if(($userPrivModel->isAdminUser() ||
						$userPrivModel->hasGlobalReadPermission() ||
						$userPrivModel->hasModulePermission($moduleModel->getId()))){
				global $currentModule;
				$currentModule = $moduleName;
				$parentRecordModel = Vtiger_Record_Model::getInstanceById($recordid[1], $moduleName);
				$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relatedmoduleName, $relatedmodulelabel);
				$query = $relationListView->getRelationQuery();
				
				$query2 = $relationListView->getRelationQuery();
				$query2.= ' ORDER BY vtiger_crmentity.modifiedtime DESC LIMIT 0,3 ';
				
				$relatedmodulelabel = vtranslate($relatedmodulelabel, $relatedModuleName, $current_user->language);
				$moduleModel = Vtiger_Module_Model::getInstance($relatedmoduleName);
				$fieldModels = $moduleModel->getFields();
				$getSummaryViewFieldsList = $moduleModel->getSummaryViewFieldsList();
				$summaryfields = array_keys($getSummaryViewFieldsList);
				
				$basetableid = $moduleModel->get('basetableid');
				$getfunctionres = $adb->pquery($query,array());
				$numofrows2 = $adb->num_rows($getfunctionres);
				$recordArray = array();
				for($j=0;$j<$numofrows2;$j++){
					$crmid = $adb->query_result($getfunctionres,$j,$basetableid);
					if(Users_Privileges_Model::isPermitted($relatedmoduleName, 'DetailView', $crmid)){
							$recordArray[] = $crmid;
					}
				}
				if($relatedmoduleName == 'Emails'){
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

				$getfunctionres2 = $adb->pquery($query2,array());
				$numofrows3 = $adb->num_rows($getfunctionres2);
				for ($k=0; $k < $numofrows3; $k++) { 
					$count = 0;
					foreach($relatedfieldarray12 as $fieldnamekey => $fieldValue) {
						if($fieldnamekey == 'assigned_user_id') continue;

						$crmid =$adb->query_result($getfunctionres2,$k,'crmid');
						if($fieldnamekey == 'crmid'){
							continue;
						}
						$relatedfetchrecord =$adb->query_result($getfunctionres2,$k,$fieldnamekey);
						$fetchrecord[$k]['list'][$count]['fieldname'] = $fieldnamekey;
						$fetchrecord[$k]['list'][$count]['fieldlabel'] = vtranslate($relatedfieldarray12[$fieldnamekey]['label'], $relatedmoduleName, $current_user->language);
						$uitype = $relatedfieldarray12[$fieldnamekey]['uitype'];

						if($fieldnamekey == 'smownerid'){
							$fetchrecord[$k]['list'][$count]['fieldlabel'] = vtranslate($relatedfieldarray12[$fieldnamekey]['label'], $relatedmoduleName, $current_user->language);
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
							
							if($fieldnamekey == 'contact_relation' && $relatedmoduleName == 'CaseRelation') {
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
							if($relatedmoduleName != 'PBXManager'){
								$recordModel = Vtiger_Record_Model::getInstanceById($crmid,$relatedmoduleName);
								
								if($uitype != 53 && $uitype != 13 && $uitype != 17 && !in_array($uitype,$refrenceUitypes)){
									$fieldModel = $fieldModels[$fieldnamekey];
									if(!empty($fieldModel)){
										$relatedfetchrecord = $fieldModel->getDisplayValue($relatedfetchrecord, $crmid, $recordModel);
									}
								}
								
								$fetchrecord[$k]['list'][$count]['value'] = $relatedfetchrecord;
								if($crmid != '' && $relatedmoduleName == 'Documents' && $fieldnamekey == 'filename') {
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
						if($relatedmoduleName == 'Emails'){
							$recordModel = Vtiger_Record_Model::getInstanceById($crmid,$relatedmoduleName);
							if($fieldnamekey == 'email_flag' || $fieldnamekey == 'saved_toid'){
								$fetchrecord[$k]['list'][$count]['value'] = decode_html($recordModel->get($fieldnamekey));
							}
						}
						$count++;
						//unset($fetchrecord[$k]['list']['crmid']);
					}
					$fetchrecord[$k]['detailViewUrl'] = $site_URL.$moduleModel->getDetailViewUrl($crmid);
				}
				$parentModuleModel = $parentRecordModel->getModule();
				$relationModels = $parentModuleModel->getRelations();
				foreach($relationModels as $relation){
					if($relation->get('relatedModuleName') == $relatedmoduleName){
						$detailViewLink = $site_URL."index.php?".$relation->getListUrl($parentRecordModel);
						$tab_label = $relation->get('label');
						$detailViewLink.='&tab_label='.$tab_label;
					}
				}
				$numofrows2 = count($recordArray);
				$createRecordUrl = $site_URL.$moduleModel->getCreateRecordUrl();
				if($relatedFieldname != ''){
					$createRecordUrl = $createRecordUrl.'&'.$relatedFieldname.'='.$recordid[1];
				}
				
				$relatedid[] =  array('moduleName' => ($moduleName)?$moduleName:'','record' => $recordid[1],'related_tabid' => ($related_tabid)?$related_tabid:'','relatedmoduleName' => ($relatedmoduleName)?$relatedmoduleName:'','tabid' => ($tabid)?$tabid:'','tablabel'=>($relatedmodulelabel)?$relatedmodulelabel:'','numofrows'=>$numofrows2, 'actions'=>$actions,'createAction'=>$createAction,'isQuickCreated'=>$QuickCreateAction,'relatedfieldname'=>$relatedFieldname,'createRecordUrl'=>$createRecordUrl,'detailViewLink'=>$detailViewLink,'fetchrecord'=>$fetchrecord);
			}

		}
	   	$moduleModel = Vtiger_Module_Model::getInstance($moduleName); 
		$recordModel = Vtiger_Record_Model::getInstanceById($recordid[1],$moduleName);
		$editAction = Users_Privileges_Model::isPermitted($moduleName, 'EditView', $recordid[1]);
		if($moduleModel->isSummaryViewSupported()) {
			$isSummarySupported = true;
			$summaryLinkurl = $recordModel->getDetailViewUrl().'&mode=showDetailViewByMode&requestMode=summary';
		}else{
			$isSummarySupported = false;
			$summaryLinkurl = $recordModel->getDetailViewUrl();
		}
		$modCommentsModel = Vtiger_Module_Model::getInstance('ModComments');
		if($moduleModel->isCommentEnabled() && $modCommentsModel->isPermitted('DetailView')){
			$CommentAction = true;
		}else{
			$CommentAction = false;
		}
	   	$recordlist = array('module'=>$moduleName,'id'=>$recordid[0].'x'.$recordid[1],'isSummarySupported'=>$isSummarySupported,'summaryLinkurl'=>$summaryLinkurl,'isEditSupported'=>$editAction,'isCommentSupported'=>$CommentAction);
   		$response = new CTBrowserExt_API_Response();
		$response->setResult(array("moduleDetail"=>$recordlist,"relatedmodule"=>$relatedid));
		return $response;
   		
	}		
}
