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

class CTBrowserExt_WS_MarkAsUnreadEmail extends CTBrowserExt_WS_FetchRecord {
	
	protected $mConnector = false;

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
	
	function process(CTBrowserExt_API_Request $request) {
			$db = PearDatabase::getInstance();
			global $current_user,$adb, $site_URL;
			$current_user = $this->getActiveUser();
			$currentUserModel = Users_Record_Model::getCurrentUserModel();
			
			$_msgno = trim($request->get('mailid'));
			$foldername = trim($request->get('foldername'));
			if(!empty($_msgno) && !empty($foldername)){
				$connector = $this->getConnector($foldername);
				$folder = $connector->folderInstance($foldername);
				$connector->updateFolder($folder, SA_UNSEEN);
				$msgNos = explode(',', $_msgno);
				foreach($msgNos as $msgNo) {
					$connector->markMailUnread($msgNo);
				}
				$response = new CTBrowserExt_API_Response();
				$response->setResult(array('status' => true, 'msgno' => $_msgno));
				return $response;
			}else{
				$message = vtranslate('Required fields not found','CTBrowserExt');
				throw new WebServiceException(404,$message);
			}
	}
	

	public function getConnector($folder='') {
		if (!$this->mConnector || ($this->mFolder != $folder)) {
			if($folder == "__vt_drafts") {
				$draftController = new MailManager_Draft_View();
				$this->mConnector = $draftController->connectorWithModel();
			} else {
				if ($this->mConnector) $this->mConnector->close();

				$model = $this->getMailboxModel();
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
