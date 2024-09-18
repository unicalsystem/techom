<?php
 /*+*******************************************************************************
 * The content of this file is subject to the CRMTiger Pro license.
 * ("License"); You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is vTiger
 * The Modified Code of the Original Code owned by https://crmtiger.com/
 * Portions created by CRMTiger.com are Copyright(C) CRMTiger.com
 * All Rights Reserved.
  ***************************************************************************** */
include_once dirname(__FILE__) . '/models/Alert.php';
include_once dirname(__FILE__) . '/models/SearchFilter.php';
include_once dirname(__FILE__) . '/models/Paging.php';
include_once('vtlib/Vtiger/Unzip.php');
class CTBrowserExt_WS_Upgrade extends CTBrowserExt_WS_Controller {
	
	function process(CTBrowserExt_API_Request $request) {
		$doc_root = $_SERVER['DOCUMENT_ROOT'];
        $url = CTBrowserExtSettings_Module_Model::$CTBrowserExt_VERSION_URL;
        $ch = curl_init($url);
		$data = array( "vt_version"=>'7.x');
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
		$jason_result = json_decode($result);
		$zip_url = $jason_result->ext_path;
		$ext_version = $jason_result->ext_version;
		mkdir($root_directory."/test/".$ext_version, 0777);
		$destination_path = $root_directory."/test/".$ext_version."/CTBrowserExtupgrade.zip";
		file_put_contents($destination_path, fopen($zip_url, 'r'));
		chmod($root_directory."/test/".$ext_version."/CTBrowserExtupgrade.zip",0755);
		
		chmod($root_directory."/test/".$ext_version."/",0777);
		$unzip = new Vtiger_Unzip($root_directory."/test/".$ext_version."/CTBrowserExtupgrade.zip");
		$unzip->unzipAllEx($root_directory."/test/".$ext_version."/");
		
		$package = new Vtiger_Package();
		$package->update(Vtiger_Module::getInstance('CTBrowserExt'),$root_directory."/test/".$ext_version.'/CTBrowserExt.zip');
		$package->update(Vtiger_Module::getInstance('CTBrowserExtSettings'),$root_directory."/test/".$ext_version.'/CTBrowserExtSettings.zip');
		$package->update(Vtiger_Module::getInstance('CTUserFilterView'),$root_directory."/test/".$ext_version.'/CTUserFilterView.zip');
		
		$response = new CTBrowserExt_API_Response();
		$message = vtranslate('Your Version updated successfully'=>'CTBrowserExt');
		$response->setResult(array('code'=>1,'message'=>$message));
		return $response;				
	}
}

?>
