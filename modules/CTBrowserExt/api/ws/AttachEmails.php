<?php
include_once dirname(__FILE__) . '/FetchRecord.php';

class CTBrowserExt_WS_AttachEmails extends CTBrowserExt_WS_FetchRecord {
	
	function process(CTBrowserExt_API_Request $request) {
		$db = PearDatabase::getInstance();
		global $current_user,$adb, $site_URL;
		$current_user = $this->getActiveUser();
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		$moduleName = 'Emails';
		$flag = $request->get('flag');
		$recordId = $request->get('record');
		$to = $request->get('to');
		if(is_array($to)) {
			$to = implode(',',$to);
		}
		$documentIds = $request->get('documentids');
		$signature = $request->get('signature');
		$recordModel = Vtiger_Record_Model::getCleanInstance($moduleName);
		$recordModel->set('mode', '');
		$recordModel->set('subject', $request->get('subject'));
		$content = $request->getRaw('description');
		$processedContent = Emails_Mailer_Model::getProcessedContent($content); // To remove script tags
		$mailerInstance = Emails_Mailer_Model::getInstance();
		$processedContentWithURLS = decode_html($mailerInstance->convertToValidURL($processedContent));
		$recordModel->set('description', str_replace(html_entity_decode('&nbsp;'), '', $processedContentWithURLS));
		$recordModel->set('saved_toid', $to);
		$recordModel->set('ccmail', $request->get('cc'));
		$recordModel->set('bccmail', $request->get('bcc'));
		$recordModel->set('assigned_user_id', $currentUserModel->getId());
		$recordModel->set('email_flag', $flag);
		//$recordModel->set('documentids', $documentIds);
		$recordModel->set('signature',$signature);
		$parentIds = $recordId.'@1|';
		$recordModel->set('parent_id', $parentIds);
		
		$recordModel->save();
		$emailRecordId = $recordModel->getId();
		foreach ($toMailInfo as $recordId => $emailValueList) {
			$relatedModule = $recordModel->getEntityType($recordId);
			if (!empty($relatedModule) && $relatedModule != 'Users') {
				$relatedModuleModel = Vtiger_Module_Model::getInstance($relatedModule);
				$relationModel = Vtiger_Relation_Model::getInstance($relatedModuleModel, $recordModel->getModule());
				if ($relationModel) {
					$relationModel->addRelation($recordId, $emailRecordId);
				}
			}
		}
		
		if(!empty($_FILES['files'])){
			foreach($_FILES['files'] as $fileindex => $files){
				global $adb,$site_URL,$root_directory;
				$storagePath = 'storage/';
				$year  = date('Y');
				$month = date('F');
				$day   = date('j');
				$week  = '';
				
				$date_var = date("Y-m-d H:i:s");
				
				if (!is_dir($root_directory.$storagePath . $year)) {
					mkdir($root_directory.$storagePath . $year);
					chmod($root_directory.$storagePath . $year, 0777);
				}

				if (!is_dir($root_directory.$storagePath . $year . "/" . $month)) {
					mkdir($root_directory.$storagePath . "$year/$month");
					chmod($root_directory.$storagePath . "$year/$month", 0777);
				}

				if ($day > 0 && $day <= 7){
					$week = 'week1';
				}elseif ($day > 7 && $day <= 14){
					$week = 'week2';
				}elseif ($day > 14 && $day <= 21){
					$week = 'week3';
				}elseif ($day > 21 && $day <= 28){
					$week = 'week4';
				}else{
					$week = 'week5'; 
				}
				
				if (!is_dir($root_directory.$storagePath . $year . "/" . $month . "/" . $week)) {
					mkdir($root_directory.$storagePath . "$year/$month/$week");
					chmod($root_directory.$storagePath . "$year/$month/$week", 0777);
				}
				$interior = $storagePath . $year . "/" . $month . "/" . $week . "/";
				$crm_id = $adb->getUniqueID("vtiger_crmentity");
				$upload_status = move_uploaded_file($files['tmp_name'],$interior.$crm_id.'_'. $files['name']);
				if($upload_status){
					$sql1 = "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) VALUES (?, ?, ?, ?, ?, ?, ?)";
					$params1 = array($crm_id, $current_user->id, $current_user->id, $moduleName." Attachment",'', $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
					$adb->pquery($sql1, $params1);
					//Add entry to attachments
					$sql2 = "INSERT INTO vtiger_attachments(attachmentsid, name, description, type, path) values(?, ?, ?, ?, ?)";
					$params2 = array($crm_id, $files['name'],'', $files['type'], $interior);
					$adb->pquery($sql2, $params2);
					//Add relation
					$sql3 = 'INSERT INTO vtiger_seattachmentsrel VALUES(?,?)';
					$params3 = array($emailRecordId,$crm_id);
					$adb->pquery($sql3, $params3);	
				}
			}
		}
		$success = true;
		$response = new CTBrowserExt_API_Response();
		if($flag == 'SENT') {
			$status = $recordModel->send();
			if ($status === true) {
				// This is needed to set vtiger_email_track table as it is used in email reporting
				$recordModel->setAccessCountValue();
				$response->setResult(array('module'=>'Emails', 'message'=>'Email Sent Successfully','linkedto' => $recordId));
			} else {
				$success = false;
				$message = $status;
				$response->setError(304,$message);
			}
		}else{
			$response->setResult(array('module'=>'Emails', 'message'=>'Email Saved Successfully','linkedto' => $recordId));
		}
		
		return $response;
	}
	
}
