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

class CTBrowserExt_WS_GetFolderList extends CTBrowserExt_WS_FetchRecord {
	
	protected $mConnector = false;
	
	public $mUsername;
	
	/**
	 * MailBox folder name
	 * @var string
	 */
	protected $mFolder = false;

	/**
	 * Connector to the IMAP server
	 * @var MailManager_Mailbox_Model
	 */
	protected $mMailboxModel = false;
	
	public $mBox;

	function process(CTBrowserExt_API_Request $request) {

		global $current_user,$adb, $site_URL;
		$current_user = $this->getActiveUser();
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
		 
		$response = new CTBrowserExt_API_Response();
		$result = $adb->pquery("SELECT * FROM vtiger_mail_accounts WHERE user_id=? AND status=1 AND set_default=0", array($currentUserModel->getId()));
		if ($adb->num_rows($result)) {
			
			$connector = $this->getConnector();
			
			$folderList = $connector->folders();
			$connector->updateFolders();
			$folderListWithCount = array();
			
			foreach($folderList as $folder){
				if($folder->unreadCount() == ''){
					$unreadCount = 0;
				}else{
					$unreadCount =$folder->unreadCount();
				}
				$folderListWithCount[] = array('foldename'=> $folder->name(),'unreadcount' => $unreadCount);
			}
			
			$response->setResult(array('folderList'=>$folderListWithCount, 'module'=>'MailManager', 'mUsername'=>$this->mUsername, 'message'=>''));
		}else{
			$message = vtranslate('No MailBox found. Please Create Mailbox','CTBrowserExt');
			throw new WebServiceException(404,$message);
		}	
		
		return $response;
	}

	public function getConnector($folder='') {
		if (!$this->mConnector || ($this->mFolder != $folder)) {
			
			if($folder == "__vt_drafts") {
				$draftController = new MailManager_Draft_View();
				$this->mConnector = $draftController->connectorWithModel();
			} else {
				if ($this->mConnector) $this->mConnector->close();

				$model = $this->getMailboxModel();
				$this->mUsername =  $model->mUsername;
				$this->mConnector = MailManager_Connector_Connector::connectorWithModel($model, $folder);
			}
			$this->mFolder = $folder;
		}
		return $this->mConnector;
	}
	
	public function getMailboxModel() {
		if ($this->mMailboxModel === false) {
			$this->mMailboxModel = MailManager_Mailbox_Model::activeInstance();
		}
		return $this->mMailboxModel;
	}
	
}
